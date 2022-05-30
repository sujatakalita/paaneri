@extends('admin.layout.master')
@section('title')
Reviews
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
                    <h3>Reviews
                        <small>Multikart Admin panel</small>
                    </h3>
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
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Review</th>
                                    <th>Is Approved</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($reviews->count()>0)
                                @foreach($reviews as $key=>$review)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{$review->product->title}}</td>
                                    <td>{{ ucwords($review->name) }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>{!! $review->review !!}</td>
                                    <td>
                                    	@if($review->is_approved == 0)
                                    	<span class="label label-danger">Not Approved Yet</span>
                                    	@elseif($review->is_approved == 1)
                                    	<span class="label label-success">Approved</span>
                                    	@endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        	<a class="btn btn-sm btn-info" href="{{ route('admin.approve',Crypt::encrypt($review->id)) }}"><i class="fa fa-star" title="Approve review" onclick="confirm('Are You Sure');"></i></a>

                                            <a class="btn btn-sm btn-success" href=""><i class="fa fa-edit me-2"></i></a>

                                            <a class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
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