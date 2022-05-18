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
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(auth()->check())
                        @foreach($wishlists as $key=>$wish_list)
                        <tr>
                            <td>
                                <a href="#"><img src="{{asset($wish_list->product->productAttachment()->first()->product_image_server_url)}}" alt=""></a>
                            </td>
                            <td><a href="#">{{$wish_list->product->title}}</a>

                            </td>
                            <td>
                                <h5>{{number_format((float)$wish_list->product->market_price, 2, '.', '')}}</h5>
                            </td>
                            <td>
                              <a href="" style="color: white;" class="btn btn-danger">Buy Now</a>
                              &nbsp;<a href="{{route('user.wishlist.delete',Crypt::encrypt($wish_list->id))}}"><i class="ti-close" onclick="" title="remove from wishlist"></i></a>

                            </td>

                        </tr>
                        @endforeach
                        @else
                        @foreach($wishlists as $key=>$wish_list)
                        <tr>
                            <td>
                                <a href="#"><img src="{{asset($wish_list->options->image)}}" alt=""></a>
                            </td>
                            <td><a href="#">{{$wish_list->name}}</a>

                            </td>
                            <td>
                                <h5>{{number_format((float)$wish_list->price, 2, '.', '')}}</h5>
                            </td>
                            <td>
                              <a href="" style="color: white;" class="btn btn-danger">Buy Now</a>
                              &nbsp;<a href="{{route('user.wishlist.delete',$wish_list->rowId)}}"><i class="ti-close" onclick="" title="remove from wishlist"></i></a>

                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    @endif
</section>
<!--section end-->
@endsection
@section('js')
<script type="text/javascript" src="{{asset('public/user/assets/js/functions/cart-function.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
