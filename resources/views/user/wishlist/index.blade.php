@extends('user.layout.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Wishlist</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!--section start-->
<section class="cart-section section-b-space">
    @if($wishlists!=null)
    <div class="container">
        <div class="row">
            @if(auth()->check())
            @foreach($wishlists as $key=>$wish_list)
            <div class="col-md-3 col-6 mt-2">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="#"><img src="{{asset($wish_list->product->productAttachment()->first()->product_image_server_url)}}" class="img-fluid border rounded" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <a href="#" title="Add to Cart">
                                <i class="ti-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('user.wishlist.delete',Crypt::encrypt($wish_list->id))}}" title="Delete from Wishlist">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <a href="#">
                            <h6>{{$wish_list->product->title}}</h6>
                        </a>
                        <h4 class="mt-2">₹ {{number_format((float)$wish_list->product->market_price, 2, '.', '')}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @foreach($wishlists as $key=>$wish_list)
            <div class="col-md-3 col-6 mt-2">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="#"><img src="{{asset($wish_list->options->image)}}" class="img-fluid border rounded" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <a href="{{route('user.wishlist.delete',$wish_list->rowId)}}" title="Delete from Wishlist">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <a href="#">
                            <h6>{{$wish_list->name}}</h6>
                        </a>
                        <h4 class="mt-2">₹ {{number_format((float)$wish_list->price, 2, '.', '')}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @else
    <div class="container">
        <p>You have no items in your wishlist. Please, click here to <a href=""><u>continue shopping</u></a>.</p>
    </div>
    @endif
</section>
<!--section end-->
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection