<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\User\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function store($product_id){
        try {
            $product_id=Crypt::decrypt($product_id);
            $user_id=auth()->user()->id;
            $product=Product::find($product_id);

            $cart=Cart::where('user_id',$user_id)->where('product_id',$product_id)->first();

            if($cart){
                $data=[
                    'qty'=>$cart->qty +1,
                    'total_price' => $cart->total_price+$cart->price,
                ];
                $cart->update($data);
                Toastr::success('Cart Update successfully', '', ["positionClass" => "toast-top-right"]);
                 return redirect()->back();
            }else{
                $data=[

                    'product_id'=>$product_id,
                    'user_id'=>auth()->user()->id,
                    'qty'=>1,
                    'price'=>$product->market_price,
                    'total_price' => $product->market_price,
                ];
               Cart::create($data);
               Toastr::success('Product added in cart successfully', '', ["positionClass" => "toast-top-right"]);
               return redirect()->back();
            }
        } catch (\Throwable $th) {

            Toastr::warning('Something want wrong', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
        }
    }
    public function view(){
        return view('user.cart.view');
    }
    public function updateCartProduct(Request $request){

       try {
           $cart=Cart::where('product_id',$request->product_id)->where('user_id',auth()->user()->id)->first();
           $qty=$request->qty;
           $data=[

            'product_id'=>$request->product_id,
            'qty'=>$request->qty,
            'total_price' =>$request->qty * $cart->price,
           ];
           $cart->update($data);
           Toastr::success('Cart data updated successfully', '', ["positionClass" => "toast-top-right"]);
           return redirect()->back();

       } catch (\Throwable $th) {
        Toastr::warning('Something want wrong', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
       }
    }
    public function AllCart(){
        if (auth()->check()) {
            $carts=Cart::with('product')->where('user_id', auth()->user()->id)->get();
            if($carts==null){
                $countCartTotalPrice= 0.00;
            }else{
                $countCartTotalPrice= $carts->sum('total_price');
            }
            if ($carts==null) {
              $data=[
                  'code'=>400,
                  'msg'=>'Product not added to cart yet!'
              ];
              return $data;
            } else {
                $data=[
                    'code'=>200,
                    'data'=>$carts,
                    'countCartTotalPrice'=> $countCartTotalPrice
                ];
                return $data;
            }
        }
    }
}
