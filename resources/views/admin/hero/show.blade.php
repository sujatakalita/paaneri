@extends('admin.layout.master')
@section('title')
Hero Banner Details
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
<style type="text/css">
	.hero_img {
		height: 200px;
	}
</style>
@endsection
@section('content')

<div class="page-body">
	<div class="container-fluid">
		<div class="page-header">
	        <div class="row">
	            <div class="col-lg-6">
	                <div class="page-header-left">
	                    <h3>Hero Banner Details
	                        <small>Multikart Admin panel</small>
	                    </h3>
	                </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="btn-popup pull-right">
	                    <a href="{{ route('admin.home-page-banner') }}" class="btn btn-primary">View all hero</a>
	                </div>
	            </div>
	        </div>
	    </div>
		<div class="row">
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <div class="card">
		            <div class="card-body">
		                <div class="body table-responsive">
		                    <table class="table table-bordered">
		                        <tbody>
		                            
		                            <tr>
		                                <th scope="row" style="width: 18%;">Hero Description </th>
		                                <td>{!! $hero->remarks !!}</td>
		                            </tr>

		                            <tr>
		                                <th scope="row" style="width: 18%;">Hero Image </th>
		                                <td>
		                                    <img src="{{ url('public/admin/hero/'.$hero->hero_img) }}" alt="hero image" class="img-responsive hero_img">
		                                </td>
		                            </tr>

		                        </tbody>
		                    </table>
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
@endsection