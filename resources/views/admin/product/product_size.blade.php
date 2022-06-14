<div>
    <h5>Add New Size</h5>
    <form id="product_size_insert_form">
        <div class="form-group mt-3">
            <label for="validationCustom01" >Select Image :</label>
            <div class="col-xl-12 col-sm-12">
                <input type="hidden" name="save_product_size_id" id="save_product_size_id" required>
                <input type="text" id="unit_name" name="unit_name" class="form-control" required>
            </div>
            <label for="validationCustom01" class="mt-2">Status :</label>
            <div class="col-xl-12 col-sm-12">
                <select class="form-control" name="status" id="status" required>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
            <div class="modal-footer text-left">
                <button class="btn btn-primary" type="button" onclick="storeProductSize()">Save</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
</div>