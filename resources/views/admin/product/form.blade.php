<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3 row">
                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="title" required>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="code" required>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Video URL :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="video_url">
                    <small>Add embaded youtube video link only.</small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-sm-4">Product Description :</label>
                <div class="col-xl-8 col-sm-7 description-sm">
                    <textarea class="tinymce-editor" name="description"></textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Weight :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="weight" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    <small>Insert product weight kilogram unit only.</small>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Market Price :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="market_price" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Selling Price :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="selling_price" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                    <div class="input-group">
                        <input class="touchspin" type="text" name="total_product" value="1" required>
                    </div>
                </fieldset>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Is Available :</label>
                <div class="col-xl-8 col-sm-7">
                    <select name="is_available" class="form-control" required>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Is there a discount ?</label>
                <div class="col-xl-8 col-sm-7">
                    <select name="discount" class="form-control" id="isDiscount" required>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3 row" id="discount_rate">
                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Discount Rate :</label>
                <div class="col-xl-8 col-sm-7">
                    <input class="form-control" type="text" name="discount_rate" id="discount_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                                <b>Select Mega menu items:</b>
                                            </div>
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
                                                @foreach($megamenus as $key=>$megamenu)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="megamenu[]" value="{{$megamenu->id}}" id="categoryChecked" onchange=categoryFilter();>
                                                    <label class="form-check-label" for="categoryChecked">
                                                        &nbsp;{{$megamenu->name}}
                                                    </label>
                                                </div><br>
                                                @endforeach
                                            </div>
                                            <div class="col">
                                                <div class="all-category"></div>
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
            <div class="offset-xl-3 offset-sm-4">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-light">Discard</button>
            </div>
        </div>
    </div>
</div>