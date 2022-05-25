@extends('admin.layout.master')
@section('title')
    Admin Slider Image
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/vendors/datatables.css') }}">
@endsection
@section('content')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Slider Image</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Slider Image</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Slider Images</h5>
                            <a style ="float:right; padding-bottom:10px;" href="{{route('admin.create.slider')}}" class="btn btn-primary btn-xs">Add New</i></a>
                        </div>
                        <div class="card-body">
                            <table class="table" id= "slider">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Slider Name</th>
                                        <th>Slider Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $get_slider as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->button_text}}</td>
                                        <td><img src="{{ asset($item->button_url)}}" alt="{{$item->button_url}}" class="img-fluid img-100 me-5 blur-up lazyloaded"></td>                                       
                                        <td>
                                            <a href="{{ route('admin.edit.slider', $item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.delete.slider', $item->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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
<script>
$(document).ready(function() {
    $('#slider').DataTable();

});

</script>
@endsection
