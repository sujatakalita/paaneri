<form id="add-measurment-option-form" class="border p-2 rounded">
  <h5 class="measurment_name"></h5>
  <div class="row">
    <div class="col">
      <input type="hidden" id="product_measurment_options_product_id" name="product_measurment_options_product_id">
      <input type="text" class="form-control" placeholder="Measurments name" id="product_measurment_options_name" name="product_measurment_options_name">
    </div>
    <div class="col">
      <input type="hidden" id="product_measurment_options_product_measurment_id" name="product_measurment_options_product_measurment_id">
      <input type="text" class="form-control" placeholder="Amount" id="product_measurment_options_amount" name="product_measurment_options_amount">
    </div>
  </div>
  <div class="mt-3">
    <button class="btn btn-success btn-sm" type="button" onclick="saveMeasurmentOption();"><i class="fa fa-save"></i></button>
    <button class="btn btn-danger btn-sm" type="button" onclick="refreshMeasurmentsOption();"><i class="fa fa-refresh"></i></button>
  </div>
</form>