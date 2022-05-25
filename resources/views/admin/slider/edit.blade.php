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
                            <h5>Edit Slider Image</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.update.slider',$get_slider->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf()

                                <div class="form">
                                    <div class="form-group">
                                        <label for="">Image name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="button_text" id="photo_name"
                                                placeholder="Photo name" value="{{$get_slider->button_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Add Image</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="slider_images" id="photo_name"
                                                placeholder="Photo name">
                                                <img style="padding-top:10px;" src="{{ asset($get_slider->button_url)}}" alt="{{$get_slider->button_url}}" class="img-fluid img-100 me-5 blur-up lazyloaded">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="padding-top: 20px;">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
