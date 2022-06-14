@extends('admin.layout.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Admin Category
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
                        <h3>Category
                            <small>Paaneri Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Product</li>
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
                        <h5>All Product</h5>
                    </div>
                    <div class="card-body">
                        <table class="display" id="basic-1" style="display: block; overflow-x: auto; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Total Product</th>
                                    <th>Available</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($products->count()>0)
                                @foreach($products as $key=>$product)
                               <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$product->title??'NA'}}</td>
                                    <td>{{$product->code??'NA'}}</td>
                                    <td>
                                        @if($product->status==1)
                                            <span class="badge badge-success">Publish</span>
                                            @else
                                            <span class="badge badge-warning">Not Publish</span>
                                        @endif
                                    </td>
                                    <td>{{$product->total_product??'NA'}}</td>
                                    <td>{{$product->available_product??'NA'}}</td>
                                    <td>{{$product->created_at??'NA'}}</td>
                                    <td>
                                        <button type="button" class="badge badge-primary" onclick="deleteProduct({{$product->id}})" title="Delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="badge badge-success" onclick="checkProduct({{$product->id}})" title="Edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="badge badge-warning" onclick="checkAttachment({{$product->id}})" title="Picture">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="badge badge-primary" onclick="checkColors({{$product->id}})" title="Color">
                                            <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="badge badge-secondary" onclick="checkSize({{$product->id}})" title="Size">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="badge badge-info" onclick="checkSpecification({{$product->id}})" title="Specification">
                                            <i class="fa fa-leaf" aria-hidden="true"></i>
                                        </button>
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
    <div class="modal fade" id="view_color_codes" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Color associated with products</h5>
          </div>
          <div class="modal-body">
            <ul id="ul_colors"></ul>
            <hr>
            @include('admin.product.savecolor')
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="view_attachment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Check attachment with products</h5>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <h5>Add New</h5><hr>
                    <label for="validationCustom01">Select Color :</label><br>
                    <div class="color_attched"></div>
                    <form action="{{route('admin.store.attachment')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @include('admin.product.product_attachment')
                        <div class="modal-footer text-left">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h5>View Image</h5>
                    <div class="row product_attachment">
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="view_product_size" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Check size with products</h5>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    @include('admin.product.product_size')
                </div>
                <div class="col-lg-6">
                    <h5>View Available Size</h5>
                    <ul class="product_size_list"></ul>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="view_product_measurments" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Check measurment with products</h5>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-7">
                    <table class="table table-bordered" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th>Filed type</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Required ?</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="measurment-data"></tbody>
                    </table>
                    @include('admin.product.product_measurment')
                </div>
                <div class="col-lg-5">
                    <div class="specification-option-data">
                        <table class="table table-bordered" style="font-size: 11px;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="measurment-option-data"></tbody>
                        </table>
                    </div>
                    <div class="measurement-option-div">
                        @include('admin.product.product_measurment_option')
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('public/assets/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/datatables/custom-basic.js')}}"></script>
<script src="{{asset('public/user/assets/js/functions/admin/product.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection