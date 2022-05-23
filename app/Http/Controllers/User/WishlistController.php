<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\User\Wishlist;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WishlistController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $wishlists = Wishlist::with('product')->where('user_id', auth()->user()->id)->get();
        } else {
            $wishlists =null;
            $wishlists = Cart::instance('wishlist')->content();
        }
        return view('user.wishlist.index',compact('wishlists'));
    }
    public function store($product_id)
    {
        try {
            $product = Product::find($product_id);
            if (auth()->user()) {
                $data = [
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                ];
                Wishlist::create($data);
                Toastr::success('Item added to wishlist ', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            } else {
                Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->market_price, 550, ['slug' => $product->slug,'image'=>$product->productAttachment->first()->product_image_server_url]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
    public function destroy($id){
        try {
            if(auth()->check()){
                $id=Crypt::decrypt($id);
                Wishlist::find($id)->delete();
                Toastr::success('Item Removed form wishlist successfully', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }else{
                Cart::instance('wishlist')->remove($id);
                Toastr::success('Item Removed form wishlist successfully', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Toastr::warning('Something want wrong', '', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
