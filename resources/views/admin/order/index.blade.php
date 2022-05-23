@extends('admin.layout.master')
@section('title')
Admin Category
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
@endsection
@section('content')


@endsection
@section('js')
<script src="{{asset('public/assets/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/js/datatables/custom-basic.js')}}"></script>
@endsection