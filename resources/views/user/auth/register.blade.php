@extends('user.layout.master')
@section('css')
@endsection
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>create account</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i>create account</i></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="theme-card">
                    <form class="theme-form" action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-row row">
                            <input type="hidden" class="form-control" id="user_type" name="user_type" value="2" required>
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-4 col-8">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" required>
                            </div>
                            <div class="col-md-2 col-4"><br><br>
                                <button class="btn btn-primary" onclick="sendOTP()">send OTP</button>
                            </div>
                            <div class="col-md-6">
                                <label for="otp">OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="OTP" required="">
                            </div>
                        </div>
                        <button type="submit" href="#" class="btn btn-solid w-auto">create Account</button>
                    </form>
                    <h5 class="mt-3">Already have an account? <a href="{{route('user.login')}}">Sign in</a></h5>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function sendOTP() {
        if ($('#mobile').val() == '') {
            toastr.warning('Mobile number required.');
        } else {
            var mobile = $('#mobile').val();
            var url = '{{route("user.sendotp")}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: url,
                method: 'post',
                data: {
                    mobile: mobile
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                }
            });
        }
    }
</script>
@endsection