@extends('admin.layout.master')
@section('title')
Hero Banner
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
<style type="text/css">
	.hero {
		height: 100px;
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
                    <h3>Hero Banner
                        <small>Multikart Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="btn-popup pull-right">
                    <a href="{{ route('admin.home-page-banner.create') }}" class="btn btn-primary">Add Hero Image</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hero Img</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($heros->count()>0)
                            @foreach($heros as $key=>$hero)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                	<img src="{{ url('public/admin/hero/'.$hero->hero_img) }}" class="hero">
                                </td>
                                <td>{!! $hero->remarks !!}</td>
                                <td>
                                    <div class="btn-group">
                                    	<a class="btn btn-sm btn-info" href="{{ route('admin.home-page-banner.show',Crypt::encrypt($hero->id)) }}"><i class="fa fa-eye" title="Show Hero Image"></i></a>

                                    	<a class="btn btn-sm btn-warning" href="{{ route('admin.home-page-banner.edit',Crypt::encrypt($hero->id)) }}"><i class="fa fa-edit" title="Edit Hero Image"></i></a>

                                    	<a onclick="return confirm('Are You Sure');" class="btn btn-sm btn-danger" href="{{ route('admin.home-page-banner.delete',Crypt::encrypt($hero->id)) }}"><i class="fa fa-trash" title="Delete Hero Image"></i></a>
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

@endsection
@section('js')
<script src="{{asset('public/assets/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/datatables/custom-basic.js')}}"></script>
@endsection