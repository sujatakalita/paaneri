<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\User\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store($product_id){
        try {
            $product=Product::find($product_id);
            if(auth()->user()){
                  $data=[
                      'user_id'=>auth()->user()->id,
                      'product_id'=>$product->id,
                      'qty'=>1,
                  ];
                  Wishlist::create($data);
                  return redirect()->back();
            }else{
                Cart::add($product->id,$product->title, 1, $product->market_price, 550, [ 'slug' => $product->slug]);
                 return redirect()->back();
            }

        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
}
