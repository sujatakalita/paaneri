<form id="add-measurment-form" class="border p-2 rounded">
  <h5>Add new measurments</h5>
  <div class="row">
    <div class="col">
      <select class="form-control" id="filed_type" name="filed_type">
        <option value="">Select box type</option>
        <option value="1">Text</option>
        <option value="2">Select</option>
      </select>
    </div>
    <div class="col">
      <select class="form-control" id="is_required" name="is_required">
        <option value="">Is it a required field</option>
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col">
      <input type="text" class="form-control" placeholder="Measurments name" id="measurment_name" name="measurment_name">
      <input type="hidden" name="measurment_product_id" id="measurment_product_id">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col">
      <input type="text" class="form-control" placeholder="Amount" id="measurment_amount" name="measurment_amount">
    </div>
    <div class="col">
      <select class="form-control" id="measurment_status" name="measurment_status">
        <option value="">Status</option>
        <option value="1">Active</option>
        <option value="2">Not active</option>
      </select>
    </div>
  </div>
  <div class="mt-3">
    <button class="btn btn-success btn-sm" type="button" onclick="saveMeasurment();"><i class="fa fa-save"></i></button>
    <button class="btn btn-danger btn-sm" type="button" onclick="refreshMeasurments();"><i class="fa fa-refresh"></i></button>
  </div>
</form>