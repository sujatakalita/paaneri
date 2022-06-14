@extends('admin.layout.master')
@section('title')
Admin Add Product
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/date-picker.css')}}">
@endsection
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>Paaneri Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row product-adding">
                            <div class="col-xl-7">
                                <form action="{{route('admin.create.product')}}" class="needs-validation add-product-form" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form">
                                        @include('admin.product.form')
                                    </div>
                                </form>
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
<script src="{{asset('public/assets/js/touchspin/vendors.min.js')}}"></script>
<script src="{{asset('public/assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('public/assets/js/touchspin/input-groups.min.js')}}"></script>
<script>
    function categoryFilter() {
        var markedCheckbox = document.getElementsByName('megamenu[]');
        var array = [];
        for (var checkbox of markedCheckbox) {
            if (checkbox.checked)
                array.push(checkbox.value);
        }
        if (array.length > 0) {
            url = 'category/filter/' + array,
            $.ajax({
                url: url,
                method: 'get',
                success: function(result) {
                    if (result != null) {
                        var category = result.category;
                        var filter_param = ``;
                        category.forEach(function(param) {
                            filter_param += ` <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="categories[]" value="${param.id}" id="category" onchange=SubcategoryFilter();>
                                                <label class="form-check-label" for="category">&nbsp;${param.name}</label>
                                              </div><br>`;
                        });
                    }
                    $('.all-category').html(filter_param);
                }
            });
        } else {
            var filter_param = ``;
            $('.all-category').html(filter_param);
        }
    }

    function SubcategoryFilter() {
        var markedCheckbox = document.getElementsByName('categories[]');
        var array = [];
        for (var checkbox of markedCheckbox) {
            if (checkbox.checked)
                array.push(checkbox.value);
        }
        if (array.length > 0) {
            url = 'category/subfilter/' + array,
            $.ajax({
                url: url,
                method: 'get',
                success: function(result) {
                    if (result != null) {
                        var sub_categories = result.sub_categories;
                        var filter_param = ``;
                        sub_categories.forEach(function(param) {
                            filter_param += ` <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="subCategories[]" value="${param.id}" id="subcategory">
                                                <label class="form-check-label" for="subcategory">&nbsp;${param.name}</label>
                                              </div><br>`;
                        });
                    }
                    $('.all-subcategory').html(filter_param);
                }
            });
        } else {
            var filter_param = ``;
            $('.all-subcategory').html(filter_param);
        }
    }
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 200,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
    });
</script>
<script>
    $(document).ready(function(){
      $('#discount_rate').hide();
    });
    $('#isDiscount').change(function(){
        const id = $(this).val();
        if(id == 1){
            $('#discount_rate').show();  
        } else {
            $('#discount_rate').hide(); 
            $('#discount_price').val(''); 
        }
    });
</script>
@endsection