@extends('admin.layout.master')
@section('title')
Admin SubCategory
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
<style>
    .card .page-header {
        background-color: #ffffff;
        border-bottom: none;
        padding: 1px;
        border-bottom: 1px solid #f8f8f9;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
</style>
@endsection
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Sub Category
                            <small>Paaneri Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">SubCategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sub Category</h5>
                        <div class="btn-popup pull-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Sub Category</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Category</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form action="{{route('admin.create.subcategory')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            @include('admin.subcategory.form')
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($sub_categories->count()>0)
                                @foreach($sub_categories as $key=>$sub_category)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{asset($sub_category->category_image)}}" alt="" class="img-fluid img-30 me-2 blur-up lazyloaded">
                                        </div>
                                    </td>
                                    <td>{{$sub_category->parentCategory->name??''}}</td>
                                    <td>{{$sub_category->name??'NA'}}</td>
                                    <td>@if($sub_category->status==1)<span class="badge badge-primary">Active</span> @else<span class="badge badge-danger">InActive</span> @endif</td>
                                    <td>
                                        <div>
                                            <i class="fa fa-edit me-2 font-success"></i>
                                            <i class="fa fa-trash font-danger"></i>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                No data found
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection
@section('js')
<script src="{{asset('public/assets/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/datatables/custom-basic.js')}}"></script>
@endsection