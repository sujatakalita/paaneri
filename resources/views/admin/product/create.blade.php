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
                            <small>Multikart Admin panel</small>
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
                    <div class="card-header">
                        <h5>Add Product</h5>
                    </div>
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
    var remove_customiation_button = '<button type="button" class="btn btn-primary" onclick="removeCustomization(this)"><i class="fa fa-minus" aria-hidden="true"></i> Remove Customization </button>';

    addCustomization = function() {
        $(".remove_customization").html('');
        var clone_data = $(".product_customization:last").clone();
        $(clone_data).find("input, select, textarea").val("");
        $(clone_data).find(".remove_customization").html(remove_customiation_button);
        $(clone_data).hide();
        var clone_data = $(".product_customization:last").after(clone_data);
        $(".product_customization:last").show("slow");

    }
    removeCustomization = function(obj) {
        console.log("remove button clicked");
        if ($(".product_customization").length == 1) {
            return false;
        }
        $(obj).parents(".product_customization").hide("slow", function() {
            $(this).remove();
        });
    }
    var remove_customization_option_button = '<button type="button" class="btn btn-primary" onclick="removeCustomizationOption(this)"><i class="fa fa-minus" aria-hidden="true"></i></button>';
    addCustomizationOption = function() {
        $(".remove_customization").html('');
        var clone_data = $(".customization_option:last").clone();
        $(clone_data).find("input, select, textarea").val("");
        $(clone_data).find(".remove_customization_option").html(remove_customization_option_button);
        $(clone_data).hide();
        var clone_data = $(".customization_option:last").after(clone_data);
        $(".customization_option:last").show("slow");
    }
    removeCustomizationOption = function(obj) {
        console.log("remove button clicked");
        if ($(".customization_option").length == 1) {

            return false;
        }
        $(obj).parents(".customization_option").hide("slow", function() {
            $(this).remove();
        });
    }

    function categoryFilter() {
        var markedCheckbox = document.getElementsByName('categories[]');

        var array = [];
        for (var checkbox of markedCheckbox) {
            if (checkbox.checked)
                array.push(checkbox.value);
        }

        if (array.length > 0) {
            url = 'http://localhost/paaneri/admin/category/filter/' + array,

                $.ajax({
                    url: url,
                    method: 'get',
                    success: function(result) {

                        if (result != null) {
                            var sub_category = result.sub_categories;
                            var filter_param = ``;
                            sub_category.forEach(function(param) {
                                filter_param += ` <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="subcategories[]" value="${param.id}" id="subcategory">
                                             <label class="form-check-label" for="subcategory">
                                                 &nbsp;${param.name}
                                             </label>
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

    function customization() {
        var is_available = $('#is_available').val();

        if (is_available == 1) {
            $('.customization').show();
        } else {
            $('.customization').hide();
        }
    }

    function addMoreColor() {
        var clone_data = $(".colorpicker:last").clone();
        $(clone_data).find("input, select, textarea").val("");
        $(clone_data).hide();
        var clone_data = $(".colorpicker:last").after(clone_data);
        $(".colorpicker:last").show("slow");

    }

    function removeColor() {
        if ($(".colorpicker").length == 1) {

            return false;
        }
        $(".colorpicker:last").remove();
        
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


@endsection