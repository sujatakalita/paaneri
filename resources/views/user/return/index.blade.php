@extends('user.layout.master')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Returns</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Returns</li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-5">
                    <img src="{{asset('public/user/assets/images/return-refund.png')}}" class="img-fluid blur-up lazyload">
                </div><hr>
                <div class="text mt-5">
                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What can I give back ?
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Any unused, new, or damaged item acquired from Paaneri India may be returned.</span></li>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Non-returnable items include customized styles, children's clothing, jutties, blouses, and accessories.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What are the shipping costs and return fees ?
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Within India and outside of India, shipping is free.</span></li><br>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Returns are free for orders delivered inside India.</span></li><br>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Reverse pick up costs of $ per item for purchases delivered in the United States</span></li>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Customers in the rest of the world will be responsible for returning the merchandise to us with tracking information at info@paaneriindia.com. The customer is responsible for the non-refundable refund shipping and customs fees.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you have any taxes or duties ?
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">All prices shown on the site are supportive of GST for clients in India.</span></li><br>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Duties aren't included in the pricing for consumers outside of India. Import tariffs, customs fees, and local/VAT taxes are the responsibility of the customer. These costs will not be reimbursed by Paaneriindia Fashion. These must be paid in order for your order to be released from customs.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How long will it be until I receive my refund ?
                          </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Once the merchandise is returned to our warehouse, we will process a refund.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            What is the best way for me to get my refund ?
                          </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">We accept returns within 15 days after purchase.</span></li>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Please login to your profile, click "My Returns/ Exchanges," choose the order number, and submit a return/exchange request. Our Customer Service Manager will contact you within 24 hours.</span></li>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Returns and exchanges are also accepted in our Paaneri locations in Mumbai, India.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How long does it take to get a refund ?
                          </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Once the goods have been returned to our warehouses and a quality check has been completed, the refund will be executed.</span></li>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">It normally takes 8-10 days for a refund to be processed.</span></li><br>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">On-Demand refunds are also possible.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Is it possible to swap it at the store ?
                          </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Yes, you may swap it at the store. On the website, you must submit a return/exchange request. Simply state which retailer you will return it to in the comments area.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            Is it possible to pick up an item ordered online ?
                          </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Yes, you may pick up your online purchases at any Paaneriindia Fashion store in Mumbai. Please notify us (info@paaneriindia.com) of the precise day you need to pick up your order so that we can prepare it properly in-store.</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            Is it possible to modify my delivery address after I've placed an order? Is it possible to pick up an item ordered online ?
                          </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <ul>
                                <li><i class="ti-angle-double-right"></i><span class="return-5">Please note that after an order is placed and an acknowledgment has been issued, your delivery address cannot be changed.</span></li>
                            </ul>
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
@endsection
