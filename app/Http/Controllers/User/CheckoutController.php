<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Address;
use App\Models\User\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $countCartTotalPrice=0.00;
        $carts=Cart::with('product')->where('user_id', auth()->user()->id)->get();
        if ($carts) {
            $countCartTotalPrice= $carts->sum('total_price');
        }
         return view('user.checkout.index',compact('carts','countCartTotalPrice'));
    }
    public function store(Request $request){
        try {

            if (!(Auth::check())) {
                Toastr::warning('Please Login', 'Title', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }

            $address=[
              'user_id'=>auth()->user()->id,
              'country'=>$request->country,
              'address'=>$request->address,
              'city'=>$request->city,
              'state'=>$request->state,
              'pincode'=>$request->pincode,
              'is_active'=>1,
            ];
            $store_address=Address::create($address);

            $temp_payment = TempPayment($amount);

            $data = [
                "key"         => config("razorpay.KEY_ID"),
                "amount"      => $temp_payment->total_price_with_tax,
                "name"        => "Toys on rent",
                "description" => "Membership payment",
                "image"       => url("images/logo.jpg"),

                "notes"       => [
                    "merchant_order_id" => $temp_payment->id,
                ],
                "theme"       => [
                    "color" => "#373d54",
                ],
                "order_id"    => $temp_payment->razorpay_order_id,
            ];
            return view('user.plan.checkout', compact('plan', 'temp_payment', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
