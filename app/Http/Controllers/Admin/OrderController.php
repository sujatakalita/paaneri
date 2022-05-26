<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CartProductMeasurmentOptionDetail;
use App\Models\Admin\Product;
use App\Models\Admin\ProductMeasurmentOptions;
use App\Models\User\Cart;
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
            $product = Product::get();
            if ($request->input('productsubmit') == 'buynow') {
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
                'price' => $request->market_price,
                'total_price' => $request->market_price,
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
                return redirect()->route('checkout', ['status' => 2]);
            } else {
                Toastr::success('Product add to Cart Successfully', 'success', ["positionClass" => "toast-top-right"]);
                return redirect()->route('user.cart.view');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
