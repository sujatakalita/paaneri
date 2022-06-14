<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form id="save_color_form">
                <div class="form-group mb-3 row">
                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Colour picker :</label>
                    <div class="col-xl-8 col-sm-7">
                        <input type="hidden" name="product_color_id" id="save_product_color_id">
                        <input type="color" id="color_code" name="color">
                    </div>
                    <div class="col-xl-8 col-sm-7 mt-5">
                        <button type="button" class="btn btn-success" onclick="saveColor();">SAVE COLOR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>