@extends('user.layout.master')
@section('css')
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<style type="text/css">
    .clear-rating {
        display: none !important;
    }
    .rating-container {
        margin-top: -15px !important;
    }
</style>
@endsection
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>product Details</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home/Product</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<form id="orderOrAddToCart" action="{{route('admin.order.buyorcart',Crypt::encrypt($product->id))}}" method="post">
    @csrf
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            @foreach($product->productAttachment as $key=>$product_attachment)
                            <div><img src="{{ url('public/admin/images/product/'.$product_attachment->product_image_server_url) }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-{{$key}}"></div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @foreach($product->productAttachment as $key=>$product_attachment)
                                    <div><img src="{{ url('public/admin/images/product/'.$product_attachment->product_image_server_url) }}" alt="" class="img-fluid blur-up lazyload"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{$product->title}}</h2>
                            <div class="rating-section">
                            <div class="rating">
                                {{-- @for ($i = 0; $i < 5; $i++) <i class="fa fa-star" @if($i> $product->rating ) style="color: #ffa200!important;" @endif></i> @endfor</div> --}}
                                <span style="padding: 3px; border: 1px solid #FF6102; border-radius: 3px; color: #FF6102; margin-right: 5px;">
                                {{ number_format((float)$product->ratingPercent(100), 1, '.', '') }} <i class="fa fa-star" style="color: #FF6102;"></i>
                                </span> 
                            </div>
                            </div>
                            <h3 class="price-detail">{{$product->selling_price}}</h3>
                            <ul class="color-variant">
                                @foreach($product->productColor as $key=>$product_color)
                                <li class="bg-light0  @if($product_color->is_default==1) active @endif" id="{{$product_color->id}}" style="background-color:{{$product_color->colour}};" onclick="productColor({{$product->id}},{{$product_color->id}})"></li>
                                @endforeach
                            </ul>
                            <h3 class="price-detail">Rs.<span id="productPrice" style="font-size:28px!important;"></span>
                            </h3>
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title size-text">select size
                                    <span><small><a href="#" data-bs-toggle="modal" data-bs-target="#sizemodal">Size Chart</a></small></span>
                                    <span><small><a href="#" data-bs-toggle="modal" data-bs-target="#blousemodal">Blouse Style</a>&nbsp;&nbsp;&nbsp;&nbsp;</small></span>
                                </h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Size Chart</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="btn-group btn-block" role="group" aria-label="Basic mixed styles example">
                                          <button type="button" onclick="womenInches();" class="btn btn-danger">Women Inches</button>
                                          <button type="button" onclick="womenCM();" class="btn btn-warning">Women CM's</button>
                                          <button type="button" onclick="men();" class="btn btn-success">Men</button>
                                          <button type="button" onclick="kidsGirl();" class="btn btn-primary">Kids - Girl</button>
                                          <button type="button" onclick="kidsBoy();" class="btn btn-secondary">Kids - Boy</button>
                                          <button type="button" onclick="footware();" class="btn btn-info">Footwear</button>
                                        </div>
                                        <div class="mt-3">
                                            <img src="{{asset('public/user/assets/images/size-chart/womens-size-chart-inches.webp')}}" alt="" class="img-fluid women-inches-images">
                                            <img src="{{asset('public/user/assets/images/size-chart/womens-size-chart-cms.webp')}}" alt="" class="img-fluid women-cms-images">
                                            <img src="{{asset('public/user/assets/images/size-chart/mens-size-chart.webp')}}" alt="" class="img-fluid men-image">
                                            <img src="{{asset('public/user/assets/images/size-chart/kids-girl-sizechart.webp')}}" alt="" class="img-fluid kids-girl-image">
                                            <img src="{{asset('public/user/assets/images/size-chart/kids-boy-sizechart.webp')}}" alt="" class="img-fluid kids-boy-image">
                                            <img src="{{asset('public/user/assets/images/size-chart/jutti-size-chart.webp')}}" alt="" class="img-fluid footware-image">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="blousemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Blouse Design</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="mt-3">
                                            <img src="{{asset('public/user/assets/images/size-chart/blouse-styles.jpg')}}" alt="" class="img-fluid">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @if($product->productSize!=null)
                                <h6 class="error-message">please select size</h6>
                                <input type="hidden" name="product_size" id="prodictSize" value="">
                                <div class="size-box">
                                    <ul>
                                        @foreach($product->productSize as $key=>$product_size)
                                        <li onclick="productSize(this.id)" id="{{$product_size->id}}"><a href="javascript:void(0)">{{$product_size->unit_name??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-count">
                                @foreach($product->productMeasurment as $key=>$product_measurment)
                                <div class="row p-1">
                                    <div class="col-sm">
                                        {{$product_measurment->name}}<i class="fa fa-asterisk" aria-hidden="true" style="font-size:6px;color:red"></i>
                                    </div>
                                    <div class="col-sm">
                                        <select class="form-control digits productmesurment" id="productMesurmantSelect" name="product_measurment_options[]" onchange="productMesurmentChange()">
                                            <option value="0" price="0">Select</option>
                                            @foreach($product_measurment->productMeasurmentOptions as $key=>$product_measurmentoption)
                                            <option value="{{$product_measurmentoption->id}}" price="{{$product_measurmentoption->amount}}">{{$product_measurmentoption->name}}&nbsp;--Rs.{{$product_measurmentoption->amount??'0.00'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-buttons">
                                <button type="submit" id="productByNowSubmitButton" class="btn btn-solid" name="productsubmit" value="buynow">
                                    <i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>BUY NOW
                                </button>
                                <button type="submit" class="btn btn-solid" name="productsubmit" value="addtocart">
                                    <i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>ADD TO CART
                                </button>
                                <a href="#" class="btn btn-solid" style="background: white; color: black; border-color: #f8f8f8;"><i class="fa fa-heart-o fz-16 me-2" aria-hidden="true"></i>WISHLIST</a>
                            </div>
                        </form>
                        <div class="border-product">
                            <h6 class="product-title">shipping info</h6>
                            <ul class="shipping-info">
                                <li class="text-dark">✔ 100% Original Products</li>
                                <li class="text-dark">✔ Custom fitting</li>
                                <li class="text-dark">✔ 100% purchase protection</li>
                                <li class="text-dark">✔ Easy 15 days returns and exchanges</li>
                                <li class="text-dark">✔ Free shipping in India</li>
                                <li class="text-dark">✔ Exclusive collection</li>
                            </ul>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">100% secure payment</h6>
                            <img style="max-width: 70%;" src="{{asset('public/user/assets/images/cards.webp')}}" class="img-fluid mt-1" alt="">
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">share it</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">100% secure payment</h6>
                            <img src="{{asset('user/assets/images/payment.png')}}" class="img-fluid mt-1" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-selected="true"><i class="icofont icofont-ui-home"></i>Details</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Specification</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-selected="false"><i class="icofont icofont-contacts"></i>Review</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab" aria-selected="false"><i class="icofont icofont-contacts"></i>Write Review</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="product-tab-discription">
                            <div class="part">
                                <p>The Model is wearing a white blouse from our stylist's collection, see the image for a mock-up of what the actual blouse would look like.it has text written on it in a black cursive language which looks great on a white color.</p>
                            </div>
                            <div class="part">
                                <h5 class="inner-title">fabric:</h5>
                                <p>Art silk is manufactured by synthetic fibres like rayon. It's light in weight and is soft on the skin for comfort in summers.Art silk is manufactured by synthetic fibres like rayon. It's light in weight and is soft on the skin for comfort in summers.</p>
                            </div>
                            <div class="part">
                                <h5 class="inner-title">size & fit:</h5>
                                <p>The model (height 5'8") is wearing a size S</p>
                            </div>
                            <div class="part">
                                <h5 class="inner-title">Material & Care:</h5>
                                <p>Top fabric: pure cotton</p>
                                <p>Bottom fabric: pure cotton</p>
                                <p>Hand-wash</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <p>The Model is wearing a white blouse from our stylist's collection, see the image for a
                            mock-up of what the actual blouse would look like.it has text written on it in a black
                            cursive language which looks great on a white color.</p>
                        <div class="single-product-tables">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Sleeve Length</td>
                                        <td>Sleevless</td>
                                    </tr>
                                    <tr>
                                        <td>Neck</td>
                                        <td>Round Neck</td>
                                    </tr>
                                    <tr>
                                        <td>Occasion</td>
                                        <td>Sports</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Fabric</td>
                                        <td>Polyester</td>
                                    </tr>
                                    <tr>
                                        <td>Fit</td>
                                        <td>Regular Fit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="comment-section">
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    @foreach($reviews as $review)
                                                    <h6>{{ucwords($review->name)}}<span> ( {{ date('d  M,Y at h:i A', strtotime($review->created_at)) }} )</span></h6>
                                                    <p>{!! $review->review !!}</p>
                                                    <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <br>
                        <form action="{{ route('product-review.store') }}" method="post">
                            @csrf
                            <div class="rating">
                                <input id="" name="rate" class="rating rating-loading input-1" data-min="0" data-max="5" data-step="1" value="{{ $product->userAverageRating }}" data-size="xs">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @if($tot_review > 1)
                                <span class="review-no">{{ $tot_review }} reviews</span>
                                @else
                                <span class="review-no">{{ $tot_review }} review</span>
                                @endif
                                <br>
                                <button class="btn btn-success btn-xs" type="submit">Submit Rating</button>
                            </div>
                            {{-- <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <label>Rating</label>
                                        <div class="media-body ms-3">
                                            <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                        <br>
                        <form class="theme-form" action="{{route('review.store')}}" method="post">
                            @csrf
                            <div class="form-row row">
                                <input type="hidden" name="product_id" value={{ $product->id }}>
                                @if(Auth::check())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endif
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Your name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review</label>
                                    <textarea class="form-control" placeholder="Wrire Your Testimonial Here" name="review" id="exampleFormControlTextarea1" rows="6">{{ old('review') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid" type="submit">Submit YOur
                                        Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('public/user/assets/js/functions/product-detail-function.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<script src="https://cdn.jsdelivr.net/mojs/latest/mo.min.js"></script>
<script>
    $(document).ready(function() {
        var product = @json($product);
        var productPrice = product['market_price'];
        $("#productPrice").html(productPrice.toFixed(2));
    });
    $(".input-1").rating();
    function productColor(product_id, colour_id) {
        $.ajax({
            url: "{{route('user.product.bycolour')}}",
            dataType: 'json',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                val: product_id,
                colour_id: colour_id
            },
            success: function(result) {
                if (result.code == 200) {
                    var product_images = ``;
                    var datas = result.attachements;
                    datas.forEach(function(data, index) {
                        product_images += `<div> <img src="http://159.65.147.244/paaneri/${data.product_image_server_url}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-${index}"></div>`;
                    });
                    $('.product_images').html(product_images);
                    datas.forEach(function(data, index) {
                        var index_value = index + 1;
                        product_images += `<img src="http://159.65.147.244/paaneri/${data.product_image_server_url}" alt="" class="img-fluid blur-up lazyload">`;
                    });
                    $('.product_images_show').html(product_images);
                }
            },
        });
    }
    function productSize(size_id) {
        $("#prodictSize").val(size_id);
    }
    function productMesurmentChange() {
        var totalAmount = 0.00;
        $("#productMesurmantSelect option").each(function(index) {
            if ($(this).is(':selected')) {
                totalAmount = parseFloat(totalAmount) + parseFloat($(this).attr('price'));
            }
        });
        var product = @json($product);
        var productPrice = product['market_price'];
        var totalDisplayPrice = parseFloat(totalAmount) + parseFloat(productPrice);
        $("#productPrice").html(totalDisplayPrice.toFixed(2));
    }
</script>
@endsection