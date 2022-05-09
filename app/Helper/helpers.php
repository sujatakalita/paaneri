<?php

use App\Models\Admin\Category;
use App\Models\Admin\HomePageSlider;
use App\Models\Admin\MegaMenu;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAttachment;
use App\Models\Admin\ProductColour;
use App\Models\Admin\ProductSize;
use App\Models\User\Cart;

function latestDrops()
{

        return $products = Product::where('is_available', 1)->where('status', 1)->orderBy('id', 'DESC')->with('productAttachment')->latest()->take(20)->get();

}
function allCategory(){
    return $categories=Category::with('subCategory')->where('parent_id',null)->where('status',1)->get();
}
function userCartItems(){
    if (auth()->check()) {
        $carts=Cart::where('user_id', auth()->user()->id)->get();
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
function MegaMenuAll(){
    return MegaMenu::with('megaMenuCategory')->where('status',1)->get();
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

