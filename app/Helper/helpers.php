<?php

use App\Models\Admin\Category;
use App\Models\Admin\HomePageSlider;
use App\Models\Admin\MegaMenu;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAttachment;
use App\Models\Admin\ProductColour;
use App\Models\Admin\ProductSize;
use App\Models\User\Cart;
use App\Models\User\Order;
use App\Models\User\Wishlist;
use App\Models\Admin\Hero;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

function latestDrops()
{
    return $products = Product::where('is_available', 1)->where('status', 1)->orderBy('id', 'DESC')->with('productAttachment')->latest()->take(20)->get();
}

function allCategory(){
    return $categories=Category::with('subCategory')->where('parent_id',null)->where('status',1)->get();
}

function allSubCategory(){
    return $sub_categories=Category::with('subCategory')->where('parent_id','!=',null)->where('status',1)->get();
}

function userCartItems($type){
    // dd($type);
    if (auth()->check()) {
        $carts=Cart::where('user_id', auth()->user()->id)->where('status',$type)->get();
        if ($carts==null) {
            return false;
        } else {
            return $carts;
        }
    }
}

function countCartTotalPrice(){
    if(auth()->check()){
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        if($carts==null){
            return 0.00;
        }else{
            return $carts->sum('total_price');
        }
    }
}

function ammountWithgst(){
    $totalPrice=countCartTotalPrice();
    $totalpricewithgst=$totalPrice+($totalPrice*18/100);
    return $totalpricewithgst;
}

// mega menu for header
function MegaMenuAll(){
    return MegaMenu::with('megaMenuCategory')->where('status',1)->get();
}

// mega menu for display category with images
function MegaMenuAllDisplay(){
    return MegaMenu::with('megaMenuCategory')->where('status',1)->take(6)->get();
}

// display saree categories with images
function sareeSubCategories(){
    // with('subCategory')
    return Category::where('parent_id',32)->where('status',1)->take(6)->get();
}

// display man categories with images
function bestForManCategories(){
    return Category::where('parent_id',143)->where('status',1)->take(4)->get();
}

// display man categories with images
function bestForLehengaCategories(){
    return Category::where('parent_id', 77)->orWhere('parent_id', 78)->orWhere('parent_id', 79)->orWhere('parent_id', 80)->where('parent_id',78)->where('status',1)->take(12)->get();
}

function megaMenuCategory($category_id){
    if($category_id==null){
        return null;
    }else{
        return $categories=Category::where('parent_id',$category_id)->get();
    }
}
function homePageSlider(){
    return HomePageSlider::where('status',1)->get();
}

function allCategories(){
    return Category::where('status',1)->get();
}

function allColors(){
    return ProductColour::orderBy('created_at')->get()->groupBy('colour');
}

function allProductDeliveryStatus(){
    return Product::orderBy('created_at')->get()->groupBy('product_delivery_status');
}

function maxProductPrice(){
    return Product::max('market_price');
}

function TempPayment($amount){
    $razor_pay = new Api('rzp_test_QbHF85egOjkBCV', 'z4XghJPXqpqpOZgJwqp0qRUq');
    $razorpayOrder = $razor_pay->order->create([
        "amount"          => $amount * 100,
        "receipt"         => $plan_id,
        "currency"        => "INR",
        'payment_capture' => 1,
    ]);
    $Order = [
        "user_id" => auth()->user()->id,
        "total_price_with_tax"          => $amount * 100,
        "plan_id"         => $plan_id,
        "razorpay_order_id"          => $razorpayOrder["id"],
        //  "currency"        => "INR",
    ];
    $temp_payment = TempPayment::create($Order);
    return $temp_payment;
}
function addToWishlistAfterLogin(){
    $wishlists = FacadesCart::instance('wishlist')->content();

    foreach($wishlists as $key=>$wish_list){
        if(!alreadyInWislist($wish_list->id)){
            $data=[
                'product_id'=>$wish_list->id,
                'user_id'=>auth()->user()->id,
            ];
            $wish_list=Wishlist::create($data);
        }

    }

}
function alreadyInWislist($product_id){
    $is_available=Wishlist::where('product_id',$product_id)->where('user_id',auth()->user()->id)->exists();
     if($is_available){
         return true;
     }else{
         return false;
     }
     
}
function transactionID(){

    $transaction_id = Order::whereYear('created_at', date('Y'))->withTrashed()->count() + 1;
    $transaction_no    = 'Paaneri/' . $transaction_id . '/' . date('dmY');
    return $transaction_no;

}

function hero(){
    return Hero::where('status',1)->get();
}
