@extends('user.layout.master')
@section('content')
<!--section start-->
<section class="cart-section section-b-space" style="background-color: #F1F3F6;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 collection-filter">
                <div class="collection-filter-block bg-white">
                    <div class="collection-collapse-block open" style="margin-bottom: 0px;">
                        <h3 class="collapse-block-title">ORDERS</h3>
                        <div class="collection-collapse-block-content">
                            <div class="collection-brand-filter">
                                <div class="collection-filter-checkbox">
                                    <a href="" class="text-dark">MY ORDERS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collection-collapse-block open">
                        <h3 class="collapse-block-title" style="margin: 0px;">ACCOUNT SETTINGS</h3>
                        <div class="collection-collapse-block-content">
                            <div class="collection-brand-filter">
                                <div class="collection-filter-checkbox">
                                    <a href="{{route('user.profile.view')}}" class="text-dark">Personal Information</a>
                                </div>
                                <div class="collection-filter-checkbox">
                                    <a href="{{route('user.profile.address.view')}}" class="text-dark">Manage Addresses</a>
                                </div>
                                <div class="collection-filter-checkbox">
                                    <a href="" class="text-dark">PAN Card Information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white p-4">
                    <h3 class="text-dark">Profile Information</h3><span class="badge bg-primary" id="information_edit" onclick="controlToEdit();" style="cursor: pointer;">Edit</span> <span class="badge bg-primary" id="information_edit_cancel" onclick="controlToCancel();" style="cursor: pointer;">Cancel</span>
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6 mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="username"  name="username" placeholder="Enter Your name" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" id="useremail"  name="useremail" placeholder="Enter Your mail" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <button type="button" onclick="updateProfileData();" class="btn btn-primary profile_save_btn">SAVE</button>
                            </div>
                        </div>
                    </form>
                    <h3 class="text-dark mt-5">Mobile Number</h3><span class="badge bg-primary" id="mobileNumber_edit" onclick="mobileToEdit();" style="cursor: pointer;">Edit</span> <span class="badge bg-primary" id="mobile_edit_cancel" onclick="mobileToCancel();" style="cursor: pointer;">Cancel</span>
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-4 mt-2">
                                <input type="text" class="form-control" id="mobile"  name="mobile" placeholder="Enter Your mobile number" required>
                            </div>
                            <div class="col-md-4 mt-2">
                                <button type="button" onclick="updateMobile();" class="btn btn-primary mobile_save_btn">SAVE</button>
                            </div>
                        </div>
                    </form>
                    <h3 class="text-dark mt-5">FAQs</h3><hr>
                    <h5 class="text-dark">What happens when I update my email address (or mobile number)?</h5>
                    <small>Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).</small>
                    <h5 class="text-dark mt-4">When will my Flipkart account be updated with the new email address (or mobile number)?</h5>
                    <small>It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.</small>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('js')
<script type="text/javascript" src="{{asset('public/user/assets/js/functions/profile-function.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
