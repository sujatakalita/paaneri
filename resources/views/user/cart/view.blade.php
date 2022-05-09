@extends('user.layout.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>cart</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cart_counter">
                    <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">check out</a>
                </div>
            </div>
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(userCartItems() as $key=>$user_cart_item)
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset($user_cart_item->product->productAttachment->first()->product_image_server_url)}}" alt=""></a>
                            </td>
                            <td><a href="#">{{$user_cart_item->product->title}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number" value="{{$user_cart_item->qty}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">{{$user_cart_item->qty}} x {{number_format((float)$user_cart_item->price, 2, '.', '')}}</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>{{$user_cart_item->qty}} x {{number_format((float)$user_cart_item->price, 2, '.', '')}}</h2>
                            </td>
                            <td>
                                <form action="{{route('user.cart.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$user_cart_item->product_id}}">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="qty" class="form-control input-number" value="{{$user_cart_item->qty}}" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">update</button>
                                </form>
                            </td>
                            <td><a href="#" class="icon"><i class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color">Rs.{{number_format((float)$user_cart_item->total_price, 2, '.', '')}}</h2>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>Rs.{{number_format((float)countCartTotalPrice(), 2, '.', '')}}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="#" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{route('checkout')}}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('js')

@endsection
