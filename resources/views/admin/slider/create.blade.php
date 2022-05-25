@extends('admin.layout.master')
@section('title')
    Admin Slider Image
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/vendors/date-picker.css') }}">
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Add Products
                                <small>Multikart Admin panel</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Physical</li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Slider Image</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider_image.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf()

                                <div class="form">
                                    <div class="form-group">
                                        <label for="">Image name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="button_text" id="photo_name"
                                                placeholder="Photo name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Add Image</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="slider_images" id="photo_name"
                                                placeholder="Photo name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding-top: 20px;">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
