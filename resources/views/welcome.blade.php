@extends('user.layout.master')
<script type="text/javascript">
    window.jssor_1_slider_init = function() {

        var jssor_1_SlideoTransitions = [
            [{b:-1,d:1,ls:0.5},{b:0,d:1000,y:5,e:{y:6}}],
            [{b:-1,d:1,ls:0.5},{b:200,d:1000,y:25,e:{y:6}}],
            [{b:-1,d:1,ls:0.5},{b:400,d:1000,y:45,e:{y:6}}],
            [{b:-1,d:1,ls:0.5},{b:600,d:1000,y:65,e:{y:6}}],
            [{b:-1,d:1,ls:0.5},{b:800,d:1000,y:85,e:{y:6}}],
            [{b:-1,d:1,ls:0.5},{b:500,d:1000,y:195,e:{y:6}}],
            [{b:0,d:2000,y:30,e:{y:3}}],
            [{b:-1,d:1,rY:-15,tZ:100},{b:0,d:1500,y:30,o:1,e:{y:3}}],
            [{b:-1,d:1,rY:-15,tZ:-100},{b:0,d:1500,y:100,o:0.8,e:{y:3}}],
            [{b:500,d:1500,o:1}],
            [{b:0,d:1000,y:380,e:{y:6}}],
            [{b:300,d:1000,x:80,e:{x:6}}],
            [{b:300,d:1000,x:330,e:{x:6}}],
            [{b:-1,d:1,r:-110,sX:5,sY:5},{b:0,d:2000,o:1,r:-20,sX:1,sY:1,e:{o:6,r:6,sX:6,sY:6}}],
            [{b:0,d:600,x:150,o:0.5,e:{x:6}}],
            [{b:0,d:600,x:1140,o:0.6,e:{x:6}}],
            [{b:-1,d:1,sX:5,sY:5},{b:600,d:600,o:1,sX:1,sY:1,e:{sX:3,sY:3}}]
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $LazyLoading: 1,
            $CaptionSliderOptions: {
            $Class: $JssorCaptionSlideo$,
            $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$,
            $SpacingX: 20,
            $SpacingY: 20
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 1510;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<style>
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }
    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    /*jssor slider bullet skin 132 css*/
    .jssorb132 {
        position: absolute;
    }
    .jssorb132 .i {
        position: absolute;
        cursor: pointer;
    }
    .jssorb132 .i .b {
        fill: #fff;
        fill-opacity: 0.8;
        stroke: #000;
        stroke-width: 1600;
        stroke-miterlimit: 10;
        stroke-opacity: 0.7;
    }
    .jssorb132 .i:hover .b {
        fill: #000;
        fill-opacity: .7;
        stroke: #fff;
        stroke-width: 2000;
        stroke-opacity: 0.8;
    }
    .jssorb132 .iav .b {
        fill: #000;
        stroke: #fff;
        stroke-width: 2400;
        fill-opacity: 0.8;
        stroke-opacity: 1;
    }
    .jssorb132 .i.idn {
        opacity: 0.3;
    }
    .jssora051 {
        display: block;
        position: absolute;
        cursor: pointer;
    }
    .jssora051 .a {
        fill: none;
        stroke: #fff;
        stroke-width: 360;
        stroke-miterlimit: 10;
    }
    .jssora051:hover {
        opacity: .8;
    }
    .jssora051.jssora051dn {
        opacity: .5;
    }
    .jssora051.jssora051ds {
        opacity: .3;
        pointer-events: none;
    }
</style>
@section('content')
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;visibility:hidden;">
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1600px;height:480px;overflow:hidden;">
        @foreach(homePageSlider() as $key=>$home_page_slider)
        <div>
            <img data-u="image" data-src="{{$home_page_slider->slider_images}}" alt=""/>
        </div>
        @endforeach
    </div>
    <div data-u="navigator" class="jssorb132" style="position:absolute;bottom:24px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:12px;height:12px;">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
        </div>
    </div>
    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>
</div>
<!-- blog section -->
<section class="blog pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-6 p-2 text-center">
                <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/1-best-seller-7-5-2022.jpg?imgeng=/w_264/h_311" class="img-fluid border rounded" alt="">
            </div>
            <div class="col-md-3 col-6 p-2 text-center">
                <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/3-kalki-men-9-5-2022.jpg?imgeng=/w_264/h_311" class="img-fluid border rounded" alt="">
            </div>
            <div class="col-md-3 col-6 p-2 text-center">
                <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/2-just-in-style-9-5-2022.jpg?imgeng=/w_264/h_311" class="img-fluid border rounded" alt="">
            </div>
            <div class="col-md-3 col-6 p-2 text-center">
                <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/4-vedio-shoping-15-1-2022.webp?imgeng=/w_264/h_311" class="img-fluid border rounded" alt="">
            </div>
        </div>
    </div>
</section><br>
<div class="breadcrumb-section pt-3">
    <div class="title1 section-t-space">
        <h3 class="title-inner1">PAANERI INDIA'S MOST FAMOUS SHOWROOM</h3>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-6 mt-4 service-block">
                <div class="media">
                    <img src="{{asset('public/user/assets/images/famous-icons/free-shipping.png')}}" style="max-width: 23%;">
                    <div class="media-body">
                        <h4>free shipping</h4>
                        <p>free shipping world wide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4 service-block">
                <div class="media">
                    <img src="{{asset('public/user/assets/images/famous-icons/24-7-service.png')}}" style="max-width: 23%;">
                    <div class="media-body">
                        <h4>24 X 7 service</h4>
                        <p>online service for new customer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4 service-block">
                <div class="media">
                    <img src="{{asset('public/user/assets/images/famous-icons/offers.png')}}" style="max-width: 23%;">
                    <div class="media-body">
                        <h4>festival offer</h4>
                        <p>new online special festival offer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4 service-block">
                <div class="media">
                    <img src="{{asset('public/user/assets/images/famous-icons/satisfaid-customers.png')}}" style="max-width: 23%;">
                    <div class="media-body">
                        <h4>Satisfied Customer</h4>
                        <p>100000+ happy customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="title1 section-t-space">
    <h3 class="title-inner1">BESTSELLERS</h3>
</div>
<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach(latestDrops() as $key=>$product)
                    <div class="product-box">
                        <div class="img-wrapper">
                            @foreach($product->productAttachment as $key=>$attachement)
                            @if($key==0)
                            <div class="front">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @if($key==1)
                            <div class="back">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @endforeach
                            <div class="cart-info cart-wrap">
                                <a href="{{route('user.wishlist.store',$product->id)}}" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a href="{{route('user.product.details',$product->slug)}}">
                                <h6>{{$product->title??'NA'}}</h6>
                            </a>
                            <h4>₹ {{$product->market_price??'NA'}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="title1 section-t-space">
                <h3 class="title-inner1">SHOP BY CATEGORIES</h3>
            </div>
        </div>
    </div>
</div>
<section class="blog pt-0 ratio2_3">
    <div class="container-fluid">
        <div class="row">
            @foreach(MegaMenuAllDisplay() as $key=>$mega_menu)
            <div class="col-md-2 col-6 p-2 text-center">
                <img src="{{$mega_menu->image}}" class="img-fluid rounded" alt="">
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="title1 section-t-space mt-5">
    <h3 class="title-inner1">SAREE COLLECTION</h3>
</div>
<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    @foreach(sareeSubCategories() as $key=>$sareeSubCategories)
                    <div class="col-md-2 col-6 mt-2">
                        <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/me-1-13-4-2022.jpg?imgeng=/w_352/h_178" class="img-fluid rounded" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach(latestDrops() as $key=>$product)
                    <div class="product-box">
                        <div class="img-wrapper">
                            @foreach($product->productAttachment as $key=>$attachement)
                            @if($key==0)
                            <div class="front">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @if($key==1)
                            <div class="back">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @endforeach
                            <div class="cart-info cart-wrap">
                                <a href="{{route('user.wishlist.store',$product->id)}}" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a href="{{route('user.product.details',$product->slug)}}">
                                <h6>{{$product->title??'NA'}}</h6>
                            </a>
                            <h4>₹ {{$product->market_price??'NA'}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="title1 section-t-space">
    <h3 class="title-inner1">BEST FOR MEN</h3>
</div>
<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    @foreach(bestForManCategories() as $key=>$ForManCategories)
                    <div class="col-md-3 col-6 mt-2">
                        <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/me-1-13-4-2022.jpg?imgeng=/w_352/h_178" class="img-fluid rounded" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="product-5 product-m no-arrow">
                    @foreach(latestDrops() as $key=>$product)
                    <div class="product-box">
                        <div class="img-wrapper">
                            @foreach($product->productAttachment as $key=>$attachement)
                            @if($key==0)
                            <div class="front">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @if($key==1)
                            <div class="back">
                                <a href="{{route('user.product.details',$product->slug)}}"><img src="{{ asset($attachement->product_image_server_url)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            @endif
                            @endforeach
                            <div class="cart-info cart-wrap">
                                <a href="{{route('user.wishlist.store',$product->id)}}" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a href="{{route('user.product.details',$product->slug)}}">
                                <h6>{{$product->title??'NA'}}</h6>
                            </a>
                            <h4>₹ {{$product->market_price??'NA'}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="title1 section-t-space">
    <h3 class="title-inner1">BEST OF LEHENGAS</h3>
</div>
<section class="section-b-space pt-0 ratio_asos">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    @foreach(bestForLehengaCategories() as $key=>$LehengaCategories)
                    <div class="col-md-2 col-6 mt-2">
                        <img src="https://kalkifashion.com.imgeng.in/media/wysiwyg/me-1-13-4-2022.jpg?imgeng=/w_352/h_178" class="img-fluid rounded" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
