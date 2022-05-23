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
                    <button type="button" onclick="showSaveAddressForm();" class="btn btn-primary btn-lg">+ ADD NEW ADDRESS</button>
                    <form class="theme-form" id="save_address_form">
                        <h4 class="text-dark mt-5">ADD A NEW ADDRESS</h4>
                        <div class="form-row row">
                            <div class="col-md-5 mt-2">
                                <label for="name">Pincode</label>
                                <input type="text" class="form-control" id="save_pincode"  name="save_pincode" placeholder="Enter pincode" required>
                            </div>
                            <div class="col-md-5 mt-2">
                                <label for="name">City</label>
                                <input type="text" class="form-control" id="save_city"  name="save_city" placeholder="Enter city" required>
                            </div>
                            <div class="col-md-10 mt-2">
                                <label for="name">Address</label>
                                <textarea type="text" class="form-control" id="save_address"  name="save_address" placeholder="Enter address" required></textarea>
                            </div>
                            <div class="col-md-5 mt-2">
                                <label for="name">Country</label>
                                <input type="text" class="form-control" id="save_country"  name="save_country" placeholder="Enter country" required>
                            </div>
                            <div class="col-md-5 mt-2">
                                <label for="name">State</label>
                                <input type="text" class="form-control" id="save_state"  name="save_state" placeholder="Enter state" required>
                            </div>
                            <div class="col-md-5 mt-2">
                                <label for="name">Landmark (optional)</label>
                                <input type="text" class="form-control" id="save_landmark"  name="save_landmark" placeholder="Enter landmark">
                            </div>
                            <div class="col-md-5 mt-2">
                                <label for="name">Alternate Phone (optional)</label>
                                <input type="text" maxlength="10" class="form-control" id="save_alternate_mobile"  name="save_alternate_mobile" placeholder="Enter alternate phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="name">Address Type</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                          <input class="form-check-input" value="1" type="radio" name="save_address_type" id="save_address_type" checked>
                                          <label class="form-check-label" for="save_address_type" style="margin-left: 12px;">
                                            Home
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                          <input class="form-check-input" value="2" type="radio" name="save_address_type" id="save_address_type">
                                          <label class="form-check-label" for="save_address_type" style="margin-left: 12px;">
                                            Office
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="button" onclick="saveAddressData();" class="btn btn-primary profile_save_btn">SAVE</button>
                                <button type="button" onclick="cancelAddressData();" class="btn btn-danger profile_save_btn">CANCEL</button>
                            </div>
                        </div>
                    </form>
                    <ul class="list-group mt-5" id="address_list"></ul>
                </div>
            </div>
            <div class="modal fade" id="edit_address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form class="theme-form" id="update_address_form">
                                <h4 class="text-dark">EDIT ADDRESS</h4>
                                <div class="form-row row">
                                    <div class="col-md-6 mt-2">
                                        <label for="name">Pincode *</label>
                                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name">City *</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="name">Address *</label>
                                        <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter address" required></textarea>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name">Country *</label>
                                        <input type="text" class="form-control" id="country"  name="country" placeholder="Enter country" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name">State *</label>
                                        <input type="text" class="form-control" id="state"  name="state" placeholder="Enter state" required>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name">Landmark (optional)</label>
                                        <input type="text" class="form-control" id="landmark"  name="landmark" placeholder="Enter landmark">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="name">Alternate Phone (optional)</label>
                                        <input type="text" maxlength="10" class="form-control" id="alternate_mobile"  name="alternate_mobile" placeholder="Enter alternate phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="name">Address Type *</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                  <input class="form-check-input" value="1" type="radio" name="address_type" id="address_type" checked>
                                                  <label class="form-check-label" for="address_type" style="margin-left: 12px;">
                                                    Home
                                                  </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                  <input class="form-check-input" value="2" type="radio" name="address_type" id="address_type">
                                                  <label class="form-check-label" for="address_type" style="margin-left: 12px;">
                                                    Office
                                                  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2 update_button"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
@section('js')
<script type="text/javascript" src="{{asset('public/user/assets/js/functions/address-function.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection