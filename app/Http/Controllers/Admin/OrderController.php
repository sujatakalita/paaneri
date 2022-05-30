<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CartProductMeasurmentOptionDetail;
use App\Models\Admin\Product;
use App\Models\Admin\ProductMeasurmentOptions;
use App\Models\User\Cart;
use App\Models\user\Order;
use App\Models\user\OrderProductMeasurmentOptionDetail;
use App\Models\user\OrderTransaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }
    public function buyOrCart(Request $request, $product_id)
    {
        try {

            $product_id = Crypt::decrypt($product_id);
            $product = Product::find($product_id);
            if ($request->input('productsubmit') == 'buynow') {
                $update_cart_items = Cart::where('user_id', auth()->user()->id)->where('status',2)->get();

                if ($update_cart_items != null) {
                    foreach ($update_cart_items as $key => $cart) {
                        $data = [
                            'status' => 1,
                        ];
                        $cart->update($data);
                    }
                }
                $status = 2;
            } else {
                $status = 1;
            }


            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'product_size_id' => $request->product_size,
                'product_color_id' => 1,
                'qty' => $request->quantity,
                'price' => $product->market_price,
                'total_price' => $product->market_price,
                'product_weight_price' => 0,
                'status' => $status,
            ];

            $cart = Cart::create($data);

            if ($request->has('product_measurment_options')) {
                $total_amount = 0.00;
                foreach ($request->product_measurment_options as $key => $product_measurment_option) {
                    $applyed_option = ProductMeasurmentOptions::find($product_measurment_option);
                    $cart_options_data =
                        [
                            'cart_id' => $cart->id,
                            'user_id' => auth()->user()->id,
                            'product_measurment_id' => $applyed_option->product_measurment_id,
                            'product_measurment_option_id' => $applyed_option->id,
                            'name' => $applyed_option->name,
                            'amount' => $applyed_option->amount,
                        ];
                    $total_amount = $total_amount + $applyed_option->amount;
                    $cart_options = CartProductMeasurmentOptionDetail::create($cart_options_data);
                }
                $cart = cart::find($cart->id);
                $cart_amount = $cart->price;
                $cart_total_price = $total_amount + $cart->price;
                $cart->update(['total_price' => $cart_total_price]);
            }
            if ($request->input('productsubmit') == 'buynow') {
                return redirect()->route('checkout', ['status' =>Crypt::encrypt(2)]);
            } else {
                Toastr::success('Product add to Cart Successfully', 'success', ["positionClass" => "toast-top-right"]);
                return redirect()->route('user.cart.view');
            }
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
    public function payment(Request $request, $status){
        try {
            if ($status==2) {
                $carts = Cart::with(['product' => function ($query) {
                    $query->with('productAttachment');
                }])->where('user_id', auth()->user()->id)->where('status',$status)->get();
                if ($carts) {
                    $countCartTotalPrice = $carts->sum('total_price');
                }
                foreach($carts as $key=>$cart){
                     $data=[
                        'user_id'=>auth()->user()->id,
                        'total_price_with_tax'=>$request->totlAmount,
                        'total_price'=>$countCartTotalPrice,
                        'address_id'=>1,

                        'status'=>1,
                     ];
                     $order=Order::create($data);
                     $data=[
                        'user_id'=>auth()->user()->id,
                        'order_id'=>$order->id,
                        'product_id'=>$cart->product_id,
                        'product_size_id'=>$cart->product_size_id,
                        'product_color_id'=>$cart->product_color_id,
                        'qty'=>$cart->qty,
                        'price'=>$cart->price,
                        'total_price'=>$cart->total_price,
                        'product_weight_price'=>$cart->product_weight_price,
                     ];
                     $cart_product_measurments=CartProductMeasurmentOptionDetail::where('cart_id',$cart->id)->get();
                     foreach($cart_product_measurments as $key=>$cart_product_measurment){
                              $data=
                              [
                                'user_id'=>auth()->user()->id,
                                'order_id'=>$order->id,
                                'product_id'=>$cart_product_measurment->product_id,
                                'product_measurment_id'=>$cart_product_measurment->product_measurment_id,
                                'product_measurment_option_id'=>$cart_product_measurment->product_measurment_option_id,
                                'amount'=>$cart_product_measurment->amount,
                              ];
                              $order_measurments=OrderProductMeasurmentOptionDetail::create($data);
                     }
                     $order_transactions=OrderTransaction::create($data);
                 }

                 Toastr::success('Order Place Successfully', 'Title', ["positionClass" => "toast-top-right"]);
                 return redirect()->route('user.order');
            } else {
                Toastr::error('Something want wrong!!Please Try again', 'Title', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Toastr::error('Something want wrong!!Please Try again', 'Title', ["positionClass" => "toast-top-right"]);
                return redirect()->route('member.index');
        }

    }
}
