<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Paaneri</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->


    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/slick-theme.css')}}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/user/assets/css/vendors/animate.css')}}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/themify-icons.css')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/fontawesome.css')}}">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/user/assets/css/style.css')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .cart-box {
            margin-right: 1rem !important;
            height: 50px;
            width: 50px;
        }
    </style>
    @yield('css')
</head>
