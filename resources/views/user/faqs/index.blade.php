@extends('user.layout.master')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>FAQs</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">
                    
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">Is Cash on Delivery(COD) available at PaaneriIndia.com?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>COD is only accessible in India for a limited number of locations/Pin codes. The COD limit is 9900 INR.</p>

                                <p>Please note that COD purchases will receive the style in the standard measurements listed in the size chart. COD orders are not eligible for customization.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">Although I was unavailable, delivery was tried. So, where do we go from here? </button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Don't worry; our courier will attempt delivery again in the following two days. If your shipment has not yet been delivered, you can contact us by phone or email to have your delivery request sent to the courier. </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">Will PAANERI India provide me with a high-quality product? </button></h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>We adhere to stringent quality and design standards as an international brand. To ensure you're getting the finest, every KALKI product through a 5-step Quality Control procedure.  </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">What is the refund/replacement procedure? </button></h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Please follow the steps below. </p>

                                <p>Please access your account by logging in. Go to the "My Return" section. Choose the Purchase and Product you'd want to return or replace. Share the item's condition and photo, as well as the specific reason for the refund or replacement. </p>

                                <p>Our Returns Team will confer with you, and our fitting specialist team will contact you as soon as possible.</p>

                                <p>We do a comprehensive quality inspection the day we receive the outfit back. We will gladly swap or refund the cash in the same source of payment if the outfit passes the quality inspection.</p>

                                <p>If you want more assistance, please contact claims@kalkifashion.com.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">The status of the order is 'Delivered,' although it has not been received. What am I supposed to do?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Verify with your neighbor/front desk/etc. to see whether the box was accepted. Call the courier to see whether the shipment has been signed. If no one has received your delivery, please contact us at info@kalkifashion.com. </p>

                                <p>We ask that you notify us if the product does not arrive within 10-15 days of delivery so that we can cooperate with our logistics partner.</p> 

                                <p>If there is no information on the delivery, we will assume that the item has been delivered, and you will not be eligible for a refund.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">How can I monitor my order once it's been shipped?</button></h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>You'll get an email with tracking information, and you can use the tracking number to monitor the status of your order on the courier's website.  </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSeven">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">Is it possible to return it if there are still sizing issues?</button></h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Yes, if you have a size problem, you may get it swapped or obtain a refund. </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingEight">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">Is there a fee for Reserve pick-up? </button></h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Pickup is free inside India for Indian customers. </p>

                                <p>Customers from around the world: Customers must mail the items back to us with the tracking information to info@kalkifashion.com in the United States. Refund shipping and customs fees are non-refundable and must be paid by the purchaser. </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingNine">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false"
                                    aria-controls="collapseNine">Are there any customs fees? </button></h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>For Indian customers, the advertised product prices include all taxes and levies. </p>

                                <p>VAT / Customs, Taxes, Import Duties, etc are not included in the ordering procedure, however, your government may tax you. They are completely your fault.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTen">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                    aria-controls="collapseTen">Are there any fees associated with currency conversion?</button></h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Please be aware that if you pay in INR or other foreign currency other than your original currency, your bank will charge you an extra currency rate fee on your credit/debit card. This fee is non-refundable.  </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingEleven">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false"
                                    aria-controls="collapseEleven">Is there a Paaneri shop outside of Mumbai? </button></h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>I am unable to utilize your website's filter. </p>

                                <p>We recommend that you refresh the page before applying the filters. Please contact us through WhatsApp at +919920012474 or by email at info@kalkifashion.com if the filters are not working. </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwelve">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false"
                                    aria-controls="collapseTwelve">Do you provide low-cost video calling? </button></h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Only premium styles have access to video calling/facetime. </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThirteen">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false"
                                    aria-controls="collapseThirteen">Do you provide a free trial before purchasing? </button></h5>
                        </div>
                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Only our Mumbai stores provide a trial.  </p>
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
