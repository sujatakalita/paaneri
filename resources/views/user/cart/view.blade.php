@extends('user.layout.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Cart</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product details</th>
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
                                        <form action="{{route('user.cart.update')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$user_cart_item->product_id}}">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" min="1" id="qty" onchange="checkQty()" name="qty" class="form-control input-number" value="{{$user_cart_item->qty}}" >
                                                    <button type="submit" class="btn btn-primary">update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <h5 class="td-color">{{$user_cart_item->qty}} x {{number_format((float)$user_cart_item->price, 2, '.', '')}}</h5>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><i class="ti-close" onclick="deleteItem({{$user_cart_item->id}})"></i>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{$user_cart_item->qty}} x {{number_format((float)$user_cart_item->price, 2, '.', '')}}</h5>
                            </td>
                            <td>
                                <form action="{{route('user.cart.update')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$user_cart_item->product_id}}">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" min="1" id="qty" onchange="checkQty()" name="qty" class="form-control input-number" value="{{$user_cart_item->qty}}" >
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td><i class="ti-close" onclick="deleteItem({{$user_cart_item->id}})"></i></td>
                            <td>
                                <h5 class="td-color">Rs.{{number_format((float)$user_cart_item->total_price, 2, '.', '')}}</h5>
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
            <div class="col-6"><a href="{{route('user.product')}}" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{route('checkout')}}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('js')
<script type="text/javascript" src="{{asset('public/user/assets/js/functions/cart-function.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
