@extends('user.layout.master')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Check-out</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{route('user.checkout')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Name</div>
                                    <input type="text" name="name" id="name" value="" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="mobile_no" id="mobile_no" value="{{auth()->user->mobile_no??''}}" placeholder="{{auth()->user()->mobile_no}}" disabled required>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="email" id="email" value="" placeholder="Email Address" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12" required>
                                    <div class="field-label">Country</div>
                                    <select name="country" id="country" onchange="productWeight()">
                                        <option value="">Selete</option>
                                        <option value="india">India</option>
                                        <option value="usa">USA</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <input type="text" name="address" id="address" placeholder="Street address" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Town/City</div>
                                    <input type="text" name="city" id="city" placeholder="Town/City" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">State</div>
                                    <input type="text" name="state"  placeholder="state" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Postal Code</div>
                                    <input type="text" name="pincode" placeholder="Postal Code" required>
                                </div>
                                <input type="hidden" name="totalAmount" value="" id="totalcartamount">
                                <input type="hidden" name="carttype" value="{{$type}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach($carts as $key=>$cart)
                                        <li>{{substr($cart->product->title,0,35)}} ?? {{$cart->qty}} <span>{{number_format((float)$cart->total_price, 2, '.', '')}}</span></li>
                                        @endforeach
                                    </ul>

                                    <ul class="sub-total">
                                        <li>Weight amount <span class="count" id="weightAmount">0.00</span></li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count" id="totalAmount">Rs. {{number_format((float)$countCartTotalPrice, 2, '.', '')}}</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="text-end"><button type="submit" class="btn-solid btn">Place Order</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
function totalWeight(){
           var totalWeight=0;
            var carts=@json($carts);
            carts.forEach((element,index) => {
            totalWeight=parseFloat(totalWeight)+parseFloat(element['product'].weight);
             });
           return totalWeight;
}
function productWeight(){
    var country=document.getElementById("country").value;
    var amount=0.00;
    var cartAmount=@json($countCartTotalPrice);
    if(country!='india'){
      amount=parseFloat(totalWeight())*100;
    }
   $("#weightAmount").html(amount.toFixed(2));
   var totalAmount=cartAmount+amount;
   document.getElementById("totalcartamount").value=totalAmount;
   $("#totalAmount").html(totalAmount.toFixed(2));
 }

</script>
@endsection
