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
    <div class="container">
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
        <h2 class="title-inner1">PAANERI INDIA'S MOST FAMOUS SHOWROOM.</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="product-para">
                    <p class="text-center">WE ARE THE MANUFACTURERS AND EXPORTERS OF WOMEN AND MEN FASHION WEARS THAT SPEAK OF ELEGANCE, STYLE AND UNMATCHED QUALITY OF ETHNIC AS WELL AS MODERN APPEARANCE.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="title1 section-t-space">
    <h2 class="title-inner1">Bestsellers</h2>
</div>
<!-- Product slider -->
<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
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
                                <a href="{{route('user.cart.store',Crypt::encrypt($product->id))}}" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                                <a href="javascript:void(0)" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <a href="{{route('user.product.details',$product->slug)}}">
                                <h6>{{$product->title??'NA'}}</h6>
                            </a>
                            <h4>{{$product->market_price??'NA'}}</h4>
                            <!-- <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul> -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title1 section-t-space">
                <h2 class="title-inner1">bestsellers</h2>
            </div>
        </div>
    </div>
</div>
<section class="blog pt-0 ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-3 no-arrow slick-default-margin">
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/1.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">

                            <a href="#">
                                <p>Top 10 January Best-Sellers Products – All Under $50!</p>
                            </a>
                            <hr class="style1">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/2.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">

                            <a href="#">
                                <p>Quarantine Birthday Celebration | In The Times of COVID-19</p>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/3.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">

                            <a href="#">
                                <p>London fashion & Hair Trends From Fashion Week</p>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/4.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">

                            <a href="#">
                                <p>Fun Fashion Clothing and Ideas for Valentine’s Day</p>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/5.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">

                            <a href="#">
                                <p>Lorem ipsum dolor sit consectetur adipiscing elit,</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service layout -->
<div class="container">
    <section class="service border-section small-section">
        <div class="row">
            <div class="col-md-4 service-block">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -117 679.99892 679">
                        <path d="m12.347656 378.382812h37.390625c4.371094 37.714844 36.316407 66.164063 74.277344 66.164063 37.96875 0 69.90625-28.449219 74.28125-66.164063h241.789063c4.382812 37.714844 36.316406 66.164063 74.277343 66.164063 37.96875 0 69.902344-28.449219 74.285157-66.164063h78.890624c6.882813 0 12.460938-5.578124 12.460938-12.460937v-352.957031c0-6.882813-5.578125-12.464844-12.460938-12.464844h-432.476562c-6.875 0-12.457031 5.582031-12.457031 12.464844v69.914062h-105.570313c-4.074218.011719-7.890625 2.007813-10.21875 5.363282l-68.171875 97.582031-26.667969 37.390625-9.722656 13.835937c-1.457031 2.082031-2.2421872 4.558594-2.24999975 7.101563v121.398437c-.09765625 3.34375 1.15624975 6.589844 3.47656275 9.003907 2.320312 2.417968 5.519531 3.796874 8.867187 3.828124zm111.417969 37.386719c-27.527344 0-49.851563-22.320312-49.851563-49.847656 0-27.535156 22.324219-49.855469 49.851563-49.855469 27.535156 0 49.855469 22.320313 49.855469 49.855469 0 27.632813-22.21875 50.132813-49.855469 50.472656zm390.347656 0c-27.53125 0-49.855469-22.320312-49.855469-49.847656 0-27.535156 22.324219-49.855469 49.855469-49.855469 27.539063 0 49.855469 22.320313 49.855469 49.855469.003906 27.632813-22.21875 50.132813-49.855469 50.472656zm140.710938-390.34375v223.34375h-338.375c-6.882813 0-12.464844 5.578125-12.464844 12.460938 0 6.882812 5.582031 12.464843 12.464844 12.464843h338.375v79.761719h-66.421875c-4.382813-37.710937-36.320313-66.15625-74.289063-66.15625-37.960937 0-69.898437 28.445313-74.277343 66.15625h-192.308594v-271.324219h89.980468c6.882813 0 12.464844-5.582031 12.464844-12.464843 0-6.882813-5.582031-12.464844-12.464844-12.464844h-89.980468v-31.777344zm-531.304688 82.382813h99.703125v245.648437h-24.925781c-4.375-37.710937-36.3125-66.15625-74.28125-66.15625-37.960937 0-69.90625 28.445313-74.277344 66.15625h-24.929687v-105.316406l3.738281-5.359375h152.054687c6.882813 0 12.460938-5.574219 12.460938-12.457031v-92.226563c0-6.882812-5.578125-12.464844-12.460938-12.464844h-69.796874zm-30.160156 43h74.777344v67.296875h-122.265625zm0 0" fill="#ff4c3b" />
                    </svg>
                    <div class="media-body">
                        <h4>free shipping</h4>
                        <p>free shipping world wide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-block">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve" width="512px" height="512px">
                        <g>
                            <g>
                                <g>
                                    <path d="M472,432h-24V280c-0.003-4.418-3.588-7.997-8.006-7.994c-2.607,0.002-5.05,1.274-6.546,3.41l-112,160 c-2.532,3.621-1.649,8.609,1.972,11.14c1.343,0.939,2.941,1.443,4.58,1.444h104v24c0,4.418,3.582,8,8,8s8-3.582,8-8v-24h24 c4.418,0,8-3.582,8-8S476.418,432,472,432z M432,432h-88.64L432,305.376V432z" fill="#ff4c3b" />
                                    <path d="M328,464h-94.712l88.056-103.688c0.2-0.238,0.387-0.486,0.56-0.744c16.566-24.518,11.048-57.713-12.56-75.552 c-28.705-20.625-68.695-14.074-89.319,14.631C212.204,309.532,207.998,322.597,208,336c0,4.418,3.582,8,8,8s8-3.582,8-8 c-0.003-26.51,21.486-48.002,47.995-48.005c10.048-0.001,19.843,3.151,28.005,9.013c16.537,12.671,20.388,36.007,8.8,53.32 l-98.896,116.496c-2.859,3.369-2.445,8.417,0.924,11.276c1.445,1.226,3.277,1.899,5.172,1.9h112c4.418,0,8-3.582,8-8 S332.418,464,328,464z" fill="#ff4c3b" />
                                    <path d="M216.176,424.152c0.167-4.415-3.278-8.129-7.693-8.296c-0.001,0-0.002,0-0.003,0 C104.11,411.982,20.341,328.363,16.28,224H48c4.418,0,8-3.582,8-8s-3.582-8-8-8H16.28C20.283,103.821,103.82,20.287,208,16.288 V40c0,4.418,3.582,8,8,8s8-3.582,8-8V16.288c102.754,3.974,185.686,85.34,191.616,188l-31.2-31.2 c-3.178-3.07-8.242-2.982-11.312,0.196c-2.994,3.1-2.994,8.015,0,11.116l44.656,44.656c0.841,1.018,1.925,1.807,3.152,2.296 c0.313,0.094,0.631,0.172,0.952,0.232c0.549,0.198,1.117,0.335,1.696,0.408c0.08,0,0.152,0,0.232,0c0.08,0,0.152,0,0.224,0 c0.609-0.046,1.211-0.164,1.792-0.352c0.329-0.04,0.655-0.101,0.976-0.184c1.083-0.385,2.069-1.002,2.888-1.808l45.264-45.248 c3.069-3.178,2.982-8.242-0.196-11.312c-3.1-2.994-8.015-2.994-11.116,0l-31.976,31.952 C425.933,90.37,331.38,0.281,216.568,0.112C216.368,0.104,216.2,0,216,0s-0.368,0.104-0.568,0.112 C96.582,0.275,0.275,96.582,0.112,215.432C0.112,215.632,0,215.8,0,216s0.104,0.368,0.112,0.568 c0.199,115.917,91.939,210.97,207.776,215.28h0.296C212.483,431.847,216.013,428.448,216.176,424.152z" fill="#ff4c3b" />
                                    <path d="M323.48,108.52c-3.124-3.123-8.188-3.123-11.312,0L226.2,194.48c-6.495-2.896-13.914-2.896-20.408,0l-40.704-40.704 c-3.178-3.069-8.243-2.981-11.312,0.197c-2.994,3.1-2.994,8.015,0,11.115l40.624,40.624c-5.704,11.94-0.648,26.244,11.293,31.947 c9.165,4.378,20.095,2.501,27.275-4.683c7.219-7.158,9.078-18.118,4.624-27.256l85.888-85.888 C326.603,116.708,326.603,111.644,323.48,108.52z M221.658,221.654c-0.001,0.001-0.001,0.001-0.002,0.002 c-3.164,3.025-8.148,3.025-11.312,0c-3.125-3.124-3.125-8.189-0.002-11.314c3.124-3.125,8.189-3.125,11.314-0.002 C224.781,213.464,224.781,218.53,221.658,221.654z" fill="#ff4c3b" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <div class="media-body">
                        <h4>24 X 7 service</h4>
                        <p>online service for new customer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-block">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -14 512.00001 512">
                        <path d="m136.964844 308.234375c4.78125-2.757813 6.417968-8.878906 3.660156-13.660156-2.761719-4.777344-8.878906-6.417969-13.660156-3.660157-4.78125 2.761719-6.421875 8.882813-3.660156 13.660157 2.757812 4.78125 8.878906 6.421875 13.660156 3.660156zm0 0" fill="#ff4c3b" />
                        <path d="m95.984375 377.253906 50.359375 87.230469c10.867188 18.84375 35.3125 25.820313 54.644531 14.644531 19.128907-11.054687 25.703125-35.496094 14.636719-54.640625l-30-51.96875 25.980469-15c4.78125-2.765625 6.421875-8.878906 3.660156-13.660156l-13.003906-22.523437c1.550781-.300782 11.746093-2.300782 191.539062-37.570313 22.226563-1.207031 35.542969-25.515625 24.316407-44.949219l-33.234376-57.5625 21.238282-32.167968c2.085937-3.164063 2.210937-7.230469.316406-10.511719l-20-34.640625c-1.894531-3.28125-5.492188-5.203125-9.261719-4.980469l-38.472656 2.308594-36.894531-63.90625c-5.34375-9.257813-14.917969-14.863281-25.605469-14.996094-.128906-.003906-.253906-.003906-.382813-.003906-10.328124 0-19.703124 5.140625-25.257812 13.832031l-130.632812 166.414062-84.925782 49.03125c-33.402344 19.277344-44.972656 62.128907-25.621094 95.621094 17.679688 30.625 54.953126 42.671875 86.601563 30zm102.324219 57.238282c5.523437 9.554687 2.253906 21.78125-7.328125 27.316406-9.613281 5.558594-21.855469 2.144531-27.316407-7.320313l-50-86.613281 34.640626-20c57.867187 100.242188 49.074218 85.011719 50.003906 86.617188zm-22.683594-79.296876-10-17.320312 17.320312-10 10 17.320312zm196.582031-235.910156 13.820313 23.9375-12.324219 18.664063-23.820313-41.261719zm-104.917969-72.132812c2.683594-4.390625 6.941407-4.84375 8.667969-4.796875 1.707031.019531 5.960938.550781 8.527344 4.996093l116.3125 201.464844c3.789063 6.558594-.816406 14.804688-8.414063 14.992188-1.363281.03125-1.992187.277344-5.484374.929687l-123.035157-213.105469c2.582031-3.320312 2.914063-3.640624 3.425781-4.480468zm-16.734374 21.433594 115.597656 200.222656-174.460938 34.21875-53.046875-91.878906zm-223.851563 268.667968c-4.390625-7.597656-6.710937-16.222656-6.710937-24.949218 0-17.835938 9.585937-34.445313 25.011718-43.351563l77.941406-45 50 86.601563-77.941406 45.003906c-23.878906 13.78125-54.515625 5.570312-68.300781-18.304688zm0 0" fill="#ff4c3b" />
                        <path d="m105.984375 314.574219c-2.761719-4.78125-8.878906-6.421875-13.660156-3.660157l-17.320313 10c-4.773437 2.757813-10.902344 1.113282-13.660156-3.660156-2.761719-4.78125-8.878906-6.421875-13.660156-3.660156s-6.421875 8.878906-3.660156 13.660156c8.230468 14.257813 26.589843 19.285156 40.980468 10.980469l17.320313-10c4.78125-2.761719 6.421875-8.875 3.660156-13.660156zm0 0" fill="#ff4c3b" />
                        <path d="m497.136719 43.746094-55.722657 31.007812c-4.824218 2.6875-6.5625 8.777344-3.875 13.601563 2.679688 4.820312 8.765626 6.566406 13.601563 3.875l55.71875-31.007813c4.828125-2.6875 6.5625-8.777344 3.875-13.601562-2.683594-4.828125-8.773437-6.5625-13.597656-3.875zm0 0" fill="#ff4c3b" />
                        <path d="m491.292969 147.316406-38.636719-10.351562c-5.335938-1.429688-10.820312 1.734375-12.25 7.070312-1.429688 5.335938 1.738281 10.816406 7.074219 12.246094l38.640625 10.351562c5.367187 1.441407 10.824218-1.773437 12.246094-7.070312 1.429687-5.335938-1.738282-10.820312-7.074219-12.246094zm0 0" fill="#ff4c3b" />
                        <path d="m394.199219 7.414062-10.363281 38.640626c-1.429688 5.335937 1.734374 10.816406 7.070312 12.25 5.332031 1.425781 10.816406-1.730469 12.25-7.070313l10.359375-38.640625c1.429687-5.335938-1.734375-10.820312-7.070313-12.25-5.332031-1.429688-10.816406 1.734375-12.246093 7.070312zm0 0" fill="#ff4c3b" />
                    </svg>
                    <div class="media-body">
                        <h4>festival offer</h4>
                        <p>new online special festival offer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- service layout  end -->


<!-- blog section -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title1 section-t-space">
                <h4>From the Blog</h4>
                <h2 class="title-inner1">Fashion for you</h2>
            </div>
        </div>
    </div>
</div>
<section class="blog pt-0 ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-3 no-arrow slick-default-margin">
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/1.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2021</h4>
                            <a href="#">
                                <p>Top 10 January Best-Sellers Products – All Under $50!</p>
                            </a>
                            <hr class="style1">
                            <h6>by: John Dio , 2 Comment</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/2.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2018</h4>
                            <a href="#">
                                <p>Quarantine Birthday Celebration | In The Times of COVID-19</p>
                            </a>
                            <hr class="style1">
                            <h6>by: John Dio , 2 Comment</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/3.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2018</h4>
                            <a href="#">
                                <p>London fashion & Hair Trends From Fashion Week</p>
                            </a>
                            <hr class="style1">
                            <h6>by: John Dio , 2 Comment</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/4.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2018</h4>
                            <a href="#">
                                <p>Fun Fashion Clothing and Ideas for Valentine’s Day</p>
                            </a>
                            <hr class="style1">
                            <h6>by: John Dio , 2 Comment</h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#">
                            <div class="classic-effect">
                                <div>
                                    <img src="{{asset('public/user/assets/images/blog/5.jpg')}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4>25 January 2018</h4>
                            <a href="#">
                                <p>Lorem ipsum dolor sit consectetur adipiscing elit,</p>
                            </a>
                            <hr class="style1">
                            <h6>by: John Dio , 2 Comment</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-6 no-arrow">
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/1.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/2.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/3.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/4.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/5.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/6.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/7.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="logo-block">
                            <a href="#"><img src="../assets/images/logos/8.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
