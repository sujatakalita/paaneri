@extends('user.layout.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/user/assets/css/vendors/price-range.css')}}">
<style type="text/css">
    .scroll {
        height: 800px!important;
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>
@endsection
@section('content')
<section class="section-b-space ratio_asos" style="padding-top: 30px!important">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <form method="get">
                        <button type="submit" class="btn btn-solid" id="mc-submit" style="height:50px;width:260px">Filter</button>&nbsp;

                        <a href="{{request()->url()}}" type="submit" class="btn btn-success" id="mc-submit" style="height:34px;width:260px">Clear Filter</a>
                        
                        <div class="collection-filter-block scroll">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>

                            {{-- ********************************************** --}}

                            @foreach($mega_menus as $mega_menu)

                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">{{$mega_menu->name??''}}</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @if($mega_menu->megaMenuCategory->count()>0)
                                        @foreach($mega_menu->megaMenuCategory as $key=>$mega_menu_category)
                                        @foreach(megaMenuCategory($mega_menu_category->category->id??'null') as $key=>$sub_category)
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" name="categories[]" value="{{$sub_category->id}}" id="{{$sub_category->name}}" {{ (is_array(request()->categories) && in_array($sub_category->id, request()->categories)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="{{$sub_category->name}}">{{$sub_category->name}}</label>
                                        </div>
                                        @endforeach
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            
                            @endforeach

                            {{-- ********************************************** --}}

                        </div>
                    </form>
                </div>

                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="../assets/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="../assets/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="../assets/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="../assets/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid">
                                        <div class="row margin-res">
                                            @foreach($products as $key=>$product)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        @foreach($product->product->productAttachment as $key=>$product_attachment)
                                                        @if($key==0)
                                                        <div class="front">
                                                            <a href="{{route('user.product.details',$product->product->slug)}}"><img src="{{ url('public/admin/images/product/'.$product_attachment->product_image_server_url) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                        </div>
                                                        @endif
                                                        @if($key==1)
                                                        <div class="back">
                                                            <a href="{{route('user.product.details',$product->product->slug)}}"><img src="{{ url('public/admin/images/product/'.$product_attachment->product_image_server_url) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        <div class="cart-info cart-wrap">
                                                            <a href="{{route('user.wishlist.store',$product->id)}}" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>
                                                            <div class="rating">
                                                                {{-- @for ($i = 0; $i < 5; $i++) <i class="fa fa-star" @if($i> $product->rating ) style="color: #ffa200!important;" @endif></i> @endfor --}}
                                                                <span style="padding: 3px; border: 1px solid #FF6102; border-radius: 3px; color: #FF6102; margin-right: 5px;">
                                                                    {{ number_format((float)$product->product->ratingPercent(100), 1, '.', '') }} <i class="fa fa-star" style="color: #FF6102;"></i>
                                                                </span>

                                                                @if($product->product->discount == 0)
                                                                 <span style="padding: 3px; border: 1px solid #FF6102; border-radius: 3px; color: #FF6102; margin-right: 5px;"> <i class="fa fa-rupee" style="color: #FF6102;"></i> 
                                                                    {{ $product->product->market_price }} 
                                                                </span>
                                                                @elseif($product->product->discount == 1)
                                                                <span style="padding: 3px; border: 1px solid #FF6102; border-radius: 3px; color: #FF6102; margin-right: 5px;"> <i class="fa fa-rupee" style="color: #FF6102;"></i> 
                                                                    {{ $product->product->discount_rate }} 
                                                                </span>
                                                                @endif

                                                            </div>
                                                            <a href="product-page(no-sidebar).html">
                                                                <h6>{{ (\Illuminate\Support\Str::limit($product->product->title, $limit = 100, $end = '...')) }}</h6>
                                                            </a>
                                                            <p>{{$product->product->description}}
                                                            </p>
                                                            <h4>{{$product->product->selling_price}}</h4>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    {!! $products->links() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{asset('public/user/assets/js/price-range.js')}}"></script>
<script>
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>
@endsection
