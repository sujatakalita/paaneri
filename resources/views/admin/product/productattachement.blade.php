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
                        <h3>Add Products Attachement
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
                                        <div class="container-fluid">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Image :</label>
                                                        <div class="col-xl-6 col-sm-7">
                                                            <input class="form-control" type="file" id="formFile" name="product_images[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                                                        <div class="col-xl-6 col-sm-7">
                                                            <input class="form-control" type="file" id="formFile" name="product_images[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                                                        <div class="col-xl-6 col-sm-7">
                                                            <input class="form-control" type="file" id="formFile" name="product_images[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                                                        <div class="col-xl-6 col-sm-7">
                                                            <input class="form-control" type="file" id="formFile" name="product_images[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                                                        <div class="col-xl-6 col-sm-7">
                                                            <input class="form-control" type="file" id="formFile" name="product_images[]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01" type="text" name="title" required>
                                                        </div>

                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Market Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom02" type="text" name="market_price" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername" type="text" name="code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                        <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input class="touchspin" type="text" name="total_product" value="1">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Select color :</label>

                                                        <div class="colorpicker col-1">
                                                            <input type="color" name="colors[]" class="form-control form-control-color" id="exampleColorInput" title="Choose your color" required>
                                                        </div>
                                                        <div class="col-1">
                                                            <button class="btn" type="button" onclick="removeColor()"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                        <div class="col-1">
                                                            <button class="btn" type="button" onclick="addMoreColor()"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                        <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input class="touchspin" type="text" name="total_product" value="1">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4">Product Description :</label>
                                                        <div class="col-xl-8 col-sm-7 description-sm">
                                                            <textarea class="tinymce-editor" name="body"></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Status:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <select class="custom-select w-100 form-control" name="status">
                                                                <option value="">--Select--</option>
                                                                <option value="1">Active</option>
                                                                <option value="2">In Active</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <span class="product_customization">
                                                            <div class="card bg-danger">
                                                                <div class="card-body">
                                                                    <div class="form-group mb-3 row">
                                                                        <div class="customization_option">

                                                                            <div class="form-group mb-3 row">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <b>Select Category:</b>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <b>Sub Category</b>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mb-3 row">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        @foreach($categories as $key=>$category)
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{$category->id}}" id="categoryChecked" onchange=categoryFilter();>
                                                                                            <label class="form-check-label" for="categoryChecked">
                                                                                                &nbsp;{{$category->name}}
                                                                                            </label>
                                                                                        </div><br>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <div class="all-subcategory"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Is customized option available?:</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <select class="custom-select w-100 form-control" name="is_available" id="is_available" onchange="customization()">

                                                                <option value="">--Select--</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <!-- <div class="customization" style="display: none;">
            <hr>
            <div class="row">
                <span class="product_customization">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <br>
                            <div class="form-group mb-3 row">
                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Customization Name :</label>
                                <div class="col-xl-8 col-sm-7">
                                    <input class="form-control" id="validationCustomUsername" type="text" name="customization_names[]">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Is compulsory:</label>
                                <div class="col-xl-8 col-sm-7">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_customization_compulsory[]" id="is_customization_compulsory" value="1">
                                        <label class="form-check-label" for="inlineRadio1">&nbsp; Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_customization_compulsory[]" id="is_customization_compulsory" value="2">
                                        <label class="form-check-label" for="inlineRadio2">&nbsp; No</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mb-3 row">
                                <div class="customization_option">

                                    <div class="form-group mb-3 row">
                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Customization Option :</label>
                                        <div class="col-xl-4 col-sm-7">
                                            <input class="form-control" id="validationCustomUsername" type="text" name="customization_options_names[][]" placeholder="Product Customization Option">
                                        </div>
                                        <div class="col-xl-2 col-sm-7">
                                            <input class="form-control" id="validationCustomUsername" type="text" name="customization_prices[][]" placeholder="Price">
                                        </div>
                                        <div class="col-xl-2 col-sm-7">
                                               <div class="remove_customization_option"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-sm-4">
                                    <button type="button" class="btn btn-primary" onclick="addCustomizationOption(this)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mb-3 row">
                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                                <div class="col-xl-4 col-sm-5">
                                </div>
                                <div class="col-xl-4 col-sm-5">
                                    <div class="remove_customization"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </span>
            </div>
            <hr>
            <div class="form-group mb-3 row">
                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"></label>
                <div class="col-xl-4 col-sm-5">
                </div>
                <div class="col-xl-4 col-sm-5">
                    <button type="button" class="btn btn-primary" onclick="addCustomization(this)"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add More Customization</button>
                </div>
            </div>
        </div><br> -->
                                                    <div class="offset-xl-3 offset-sm-4">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                        <button type="button" class="btn btn-light">Discard</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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