@extends('admin.layout.master')
@section('title')
Hero Banner Create
@endsection
@section('css')
<link href="{!!asset('public/assets/plugins/dropify/css/dropify.min.css')!!}" rel="stylesheet" />
<style type="text/css">
	
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
	                    <h3>Hero Banner Create
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
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-body">
						  <form action="{{ route('admin.home-page-banner.post') }}" method="post" enctype="multipart/form-data">
						  	@csrf
						  	<div class="row">
						  		<div class="col-md-12">
						  			<label for="">Remarks</label>
						  			<textarea class="form-control" name="remarks"></textarea>
						  		</div>
						  	</div>
						  	<div class="row">
		                        <div class="col-md-12">
		                            <div class="form-group">
		                                <label for="">Heo image</label> <small style="color: red;">Dimension: 1920 x 500 px</small>
		                                <input type="file" name="hero_img" class="dropify" data-height="100" {{ old('hero_img') }} data-allowed-file-extensions="jpeg jpg png svg" required="required" data-errors-position="outside" data-min-width="1919" data-max-width="1921" data-min-height="499" data-max-height="501">
		                            </div>
		                        </div>
		                    </div>
						    
						    <button type="submit" class="btn btn-info">Submit</button>
						  </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection
@section('js')
<script src="{!! asset('public/assets/plugins/dropify/js/dropify.min.js') !!}" charset="utf-8"></script>
<script>
	$('.dropify').dropify({
        error: {
        'fileSize': 'The file size is too big ({{ '210kb' }} max).',
        'minWidth': 'The image width is too small ({{ '1919' }}px min).',
        'maxWidth': 'The image width is too big ({{ '1921' }}px max).',
        'minHeight': 'The image height is too small ({{ '499' }}px min).',
        'maxHeight': 'The image height is too big ({{ '501' }}px max).',
        'imageFormat': 'The image format is not allowed ({{ 'jpeg, jpg, png' }} only).'
    },
      messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
</script>
@endsection