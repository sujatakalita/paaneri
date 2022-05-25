<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
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
            <div class="form-group row">
                <label class="col-xl-3 col-sm-4">Product Description :</label>
                <div class="col-xl-8 col-sm-7 description-sm">
                    <textarea class="tinymce-editor" name="body"></textarea>

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