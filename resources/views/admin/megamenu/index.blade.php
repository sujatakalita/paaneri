@extends('admin.layout.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Admin Mega Menu
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
                        <h3>Mega Menu
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
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Mega Item</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.create.megamenu')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            @include('admin.megamenu.form')
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit_mega_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Menu Item</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.update.megamenu')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="needs-validation">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Mega Menu Name:</label>
                                                        <input class="form-control" name="name" id="mega_menu_name" type="text" required>
                                                        <input type="hidden" name="id" id="id" required>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="validationCustom02" class="mb-1"> Mega Menu Type :</label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" required type="radio" name="mega_menu_type" id="mega_menu_type" value="3">
                                                            <label class="form-check-label" for="inlineRadio1">&nbsp; Mark as new</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" required type="radio" name="mega_menu_type" id="mega_menu_type" value="2">
                                                            <label class="form-check-label" for="inlineRadio2">&nbsp; Only Mark</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" required type="radio" name="mega_menu_type" id="mega_menu_type" value="1">
                                                            <label class="form-check-label" for="inlineRadio3">&nbsp; Default</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="validationCustom02" class="mb-1">Status:</label>
                                                        <select class="custom-select w-100 form-control" required name="status" id="status">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">InActive</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-0 mt-2">
                                                        <label for="validationCustom02" class="mb-1">Image:</label>
                                                        <input type="file" name="image" accept="image/png, image/gif, image/jpeg, image/svg, image/webp" id="image" required>
                                                    </div>
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
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mega Menu</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($mega_menus->count()>0)
                                @foreach($mega_menus as $key=>$mega_menu)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$mega_menu->name??'NA'}}</td>
                                    <td>{{$mega_menu->slug??'NA'}}</td>
                                    <td><a href="{{ url('public/admin/category/'.$mega_menu->image) }}">Image</a></td>
                                    <td>@if($mega_menu->mega_menu_type==1)
                                            <span class="badge badge-primary">Defult</span>
                                            @elseif($mega_menu->mega_menu_type==2)
                                            <span class="badge badge-primary">Only Mark</span>
                                            @else<span class="badge badge-danger">Mark As New</span>
                                        @endif
                                    </td>
                                    <td>@if($mega_menu->status==1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fa fa-edit me-2 font-success" onclick="editMegaCategory({{$mega_menu->id}});"></i>
                                            <i class="fa fa-trash font-danger" onclick="deleteMegaCategory({{$mega_menu->id}});"></i>
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
<script src="{{asset('public/user/assets/js/functions/admin/megamenu.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection