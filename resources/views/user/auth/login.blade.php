@extends('user.layout.master')
@section('css')
@endsection
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>customer's login</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Login</h3>
                <div class="theme-card">
                    <form class="theme-form" action="{{route('login')}}"  method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="2">
                        <div class="form-group">
                            <label for="mobile_no">Phone</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div><button type="submit" class="btn btn-solid">Login</button>
                    </form>
                    <h5 class="mt-3">Forgot <a href="{{route('user.login')}}">password</a> ?</h5>
                </div>
            </div>
            <div class="col-lg-6 right-login">
                <h3>New Customer</h3>
                <div class="theme-card authentication-right">
                    <h6 class="title-font">Create A Account</h6>
                    <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                        able to order from our shop. To start shopping click register.</p><a href="{{route('user.register')}}" class="btn btn-solid">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
@section('js')

@endsection