@extends('admin.layout.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Admin SubCategory
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
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
                        <div class="btn-popup pull-left">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
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

                        <div class="modal fade" id="sub_category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Update Sub Category</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <form action="{{route('admin.update.subcategory')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="needs-validation">
                                                <div class="form-group">
                                                    <label for="validationCustom02">Select Mega Menu:</label>
                                                    <select class="custom-select w-100 form-control" name="edit_mega_menu_id" id="edit_mega_menu_id" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($mega_menu as $key=>$mega_menus)
                                                        <option value="{{$mega_menus->id}}">{{$mega_menus->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="edit_id" id="edit_id" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02">Select Category:</label>
                                                    <select class="custom-select w-100 form-control" name="edit_parent_id" id="edit_parent_id" required>
                                                        <option value="">--Select--</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01">Sub Category Name:</label>
                                                    <input class="form-control" name="name" id="name" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02">Category Image :</label>
                                                    <input class="form-control" name="category_image" type="file" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02" class="mb-1">SEO Title :</label>
                                                    <input class="form-control" name="seoTitle" id="seoTitle" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02" class="mb-1">SEO Description :</label>
                                                    <textarea class="form-control" name="seoDescription" id="seoDescription"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02" class="mb-1">SEO Keywords :</label>
                                                    <textarea class="form-control" name="seoKeywords" id="seoKeywords"></textarea>
                                                    <small>Using cooma, separate each keyword phase.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02" class="mb-1">Canonical URLs :</label>
                                                    <textarea class="form-control" name="canonicalUrl" id="canonicalUrl"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02">Status:</label>
                                                    <select class="custom-select w-100 form-control" required name="status" id="status">
                                                        <option value="">--Select--</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">InActive</option>
                                                    </select>
                                                </div>
                                            </div>
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
                        <table class="display" id="basic-1" style="display: block; overflow-x: auto; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Seo Title</th>
                                    <th>Seo Description</th>
                                    <th>Seo Keywords</th>
                                    <th>Canonical Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($sub_categories->count()>0)
                                @foreach($sub_categories as $key=>$sub_category)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$sub_category->parentCategory->name??''}}</td>
                                    <td>{{$sub_category->name??'NA'}}</td>
                                    <td>{{$sub_category->slug??'NA'}}</td>
                                    <td><a href="{{ url('public/admin/category/'.$sub_category->category_image) }}">Image</a></td>
                                    <td>{{$sub_category->seoTitle??'NA'}}</td>
                                    <td>{{$sub_category->seoDescription??'NA'}}</td>
                                    <td>{{$sub_category->seoKeywords??'NA'}}</td>
                                    <td>{{$sub_category->canonicalUrl??'NA'}}</td>
                                    <td>@if($sub_category->status==1)<span class="badge badge-primary">Active</span> @else<span class="badge badge-danger">InActive</span> @endif</td>
                                    <td>
                                        <div>
                                            <i class="fa fa-edit me-2 font-success" onclick="editSubCategory({{$sub_category->id}})"></i>
                                            <i class="fa fa-trash font-danger" onclick="deleteSubCategory({{$sub_category->id}})"></i>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('public/user/assets/js/functions/admin/sub-category.js')}}"></script>
@endsection