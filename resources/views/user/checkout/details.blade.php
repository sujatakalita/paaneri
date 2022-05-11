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
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    @foreach(userCartItems() as $key=>$user_cart_item)
                    <div class="row product-order-detail">
                        <div class="col-3"><img src="{{ asset($user_cart_item->product->productAttachment->first()->product_image_server_url)}}" alt="" class="img-fluid blur-up lazyload"></div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>product name</h4>
                                <h5>{{ substr(strip_tags($user_cart_item->product->title), 0, 50) }}....</h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>quantity</h4>
                                <h5>{{$user_cart_item->qty}} X {{number_format((float)$user_cart_item->price, 2, '.', '')}}</h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>price</h4>
                                <h5>Rs.{{number_format((float)$user_cart_item->total_price, 2, '.', '')}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="total-sec">
                        <ul>
                            <li>subtotal <span>Rs.{{number_format((float)ammountWithgst(), 2, '.', '')}}</span></li>

                            <li>tax(GST) <span>18%</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>Rs.{{number_format((float)countCartTotalPrice(), 2, '.', '')}}</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="order-success-sec">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-detail">
                                <li>Number: {{auth()->user()->mobile_no}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>shipping address</h4>
                            <ul class="order-detail">
                                <li>{{$store_address->address}}</li>
                                <li>{{$store_address->country}}</li>
                                <li>{{$store_address->state}}/{{$store_address->city}}/{{$store_address->pincode}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 payment-mode">

                                <button class="btn btn-solid" id="rzp-button1">Proceed To Pay</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form name='razorpayform' action="" method="POST">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="response" id="response">
</form>



@endsection
@section('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Checkout details as a json
    var options = @json($data);
    options.handler = function(response) {
        document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.getElementById('response').value = JSON.stringify(response);
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
</script>
@endsection
