function checkColors(id) {
	var product_id = id;
	const url = 'getColors/'+id;
	$("#ul_colors").empty();
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
        	$('#view_color_codes').modal('show');
        	$('#save_product_color_id').val(id);
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
            	$('#ul_colors').find('li').remove();
                for(var i=0; i<len; i++){
                	const ids = response['data'][i].id;
                    const color = response['data'][i].colour;
                    const li = "<li style='background:"+color+";width: 91%;text-align: center;padding: 5px;margin-bottom: 5px;color: white;'>"+color+"</li><span class='badge badge-primary' style='border-radius: 0px;' onclick='deleteColor("+ids+","+product_id+")'><i class='fa fa-trash' style='font-size: 11px;padding: 6px;border-right: 0px;'></i></span><br>";
                    $("#ul_colors").append(li);
                }
            }
        }
    });
}

function saveColor() {
	const save_product_color_id = $('#save_product_color_id').val();
	const color = $("#color_code").val();
	const url = 'saveColors';
    if(save_product_color_id == '' || color == ''){
        toastr.warning("Missing field ! Try again");
    }
    else
    {
    	$.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            type: 'post',
            data: { product_id: save_product_color_id, colour: color},
            success: function(response){
            	if(response == "1"){
    				toastr.success("Color store successfully !");
    				$("#save_color_form")[0].reset();
    				checkColors(save_product_color_id);
    			} else if(response == '2'){
    				toastr.warning("Some errors occured ! Try again");
    			} else {
    				toastr.error("Invalid request ! Try again");
    			}
            }
        });
    }
}


function deleteColor(ids, product_id)
{
	const url = 'deleteColorCode';
    swal({
      title: "Delete color",
      text: "Are you sure you want to remove this color ?",
      icon: "warning",
      buttons: [
        'CANCEL',
        'REMOVE'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            method: 'post',
            data: {
                id: ids
            },
            dataType: 'json',
            success: function(result) {
                if(result == "1"){
                    toastr.success("color successfully removed !");
                    checkColors(product_id);
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}

function checkAttachment(id) {
	var product_id = id;
	const url = 'getAttachment/'+id;
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            viewColorForImage(product_id);
        	$('#view_attachment').modal('show');
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
            	$('.product_attachment').find('div').remove();
                for(var i=0; i<len; i++){
                	const ids = response['data'][i].id;
                    const image = response['data'][i].product_image_server_url;
                    const col = "<div class='col-md-3 mt-2'><img src='http://159.65.147.244/paaneri/public/admin/images/product/"+image+"' class='img-fluid'></div>";
                    $(".product_attachment").append(col);
                }
            }
        }
    });
}


function viewColorForImage(id) {
    var product_id = id;
    const url = 'getColors/'+id;
    $(".color_attched").empty();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            $('#save_product_color_id').val(id);
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                $('.color_attched').find('button').remove();
                for(var i=0; i<len; i++){
                    const ids = response['data'][i].id;
                    const color = response['data'][i].colour;
                    const button = "<button onclick='getProductIdColorCodeId("+product_id+","+ids+")' style='background:"+color+";text-align: center;color: white;'>"+color+"</button> ";
                    $(".color_attched").append(button);
                }
            }
        }
    });
}

function getProductIdColorCodeId(product_id, ids)
{
    $('#image_product_id').val(product_id);
    $('#image_color_id').val(ids);
}

function checkSize(id) {
    var product_id = id;
    const url = 'getProductSize/'+id;
    $(".product_size_list").empty();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            $('#view_product_size').modal('show');
            $('#save_product_size_id').val(id);
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                $('.product_size_list').find('li').remove();
                for(var i=0; i<len; i++){
                    const ids = response['data'][i].id;
                    const unit_name = response['data'][i].unit_name;
                    const li = "<li style='border:1px solid #ff8084;width: 80%;font-family: system-ui;text-align: center;padding: 5px;margin-bottom: 5px;color: black;'>"+unit_name+"</li><span class='badge badge-primary' style='border-radius: 0px;' onclick='deleteColor("+ids+","+product_id+")'><i class='fa fa-trash' style='font-size: 15px;padding: 5px;border-right: 0px;'></i></span><br>";
                    $(".product_size_list").append(li);
                }
            }
        }
    });
}

function storeProductSize()
{
    const save_product_size_id = $('#save_product_size_id').val();
    const unit_name = $("#unit_name").val();
    const status = $("#status").val();
    const url = 'saveProductSize';
    if(save_product_size_id == '' || unit_name == '' || status == ''){
        toastr.warning("Missing field ! Try again");
    }
    else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            type: 'post',
            data: { product_id: save_product_size_id, unit_name: unit_name, status: status},
            success: function(response){
                if(response == "1"){
                    toastr.success("size store successfully !");
                    $("#product_size_insert_form")[0].reset();
                    checkSize(save_product_size_id);
                } else if(response == '2'){
                    toastr.warning("Already available ! Try again");
                } else if(response == '3') {
                    toastr.error("Some errors occured ! Try again");
                } else {
                    toastr.error("Invalid request ! Try again");
                }
            }
        });
    }
}

function checkSpecification(id) {
    const url = 'getSpecification/'+id;
    $(".measurment-data").empty();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            $('#view_product_measurments').modal('show');
            $('#measurment_product_id').val(id);
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                $('.measurment-data').find('tr').remove();
                for(var i=0; i<len; i++){
                    let ids = response['data'][i].id;
                    let filed_type = response['data'][i].filed_type;
                    let amount = response['data'][i].amount;
                    let name = response['data'][i].name;
                    let is_required = response['data'][i].is_required;
                    let status = response['data'][i].status;
                    let product_id = response['data'][i].product_id;
                    let row = `
                        <tr><td>${filed_type}</td><td>${name}</td><td>${amount}</td><td>${is_required}</td><td>${status}</td><td><i class="fa fa-plus" onclick="addMeasurmentsOptions(${ids}, ${product_id});" aria-hidden="true"></i>  <i class="fa fa-eye" onclick="viewMeasurmentsOptions(${ids}, ${product_id});" aria-hidden="true"></i></td></tr>  
                    `
                    $(".measurment-data").append(row);
                }
            }
        }
    });
}

function saveMeasurment() {
    const measurment_product_id = $('#measurment_product_id').val();
    const filed_type = $("#filed_type").val();
    const is_required = $("#is_required").val();
    const measurment_name = $("#measurment_name").val();
    var measurment_amount = $("#measurment_amount").val();
    var measurment_status = $("#measurment_status").val();
    const url = 'saveProductSpecification';
    if(measurment_product_id == '' || filed_type == '' || is_required == '' || measurment_name == '' || measurment_amount == '' || measurment_status == ''){
        toastr.warning("Missing field ! Try again");
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            type: 'post',
            data: { product_id: measurment_product_id, filed_type: filed_type, is_required: is_required, name: measurment_name, status: measurment_status, amount:measurment_amount},
            success: function(response){
                if(response == "1"){
                    toastr.success("measurment store successfully !");
                    $("#product_size_insert_form")[0].reset();
                    checkSpecification(measurment_product_id);
                } else if(response == '2'){
                    toastr.warning("Already available ! Try again");
                } else if(response == '3') {
                    toastr.error("Some errors occured ! Try again");
                } else {
                    toastr.error("Invalid request ! Try again");
                }
            }
        });
    }
}


function viewMeasurmentsOptions(ids, product_id) {
    const url = 'getSpecificationOption/'+ids+'/'+product_id;
    $(".measurment-option-data").empty();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(response){
            $('.specification-option-data').show();
            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }
            if(len > 0){
                $('.measurment-option-data').find('tr').remove();
                for(var i=0; i<len; i++){
                    let id = response['data'][i].id;
                    let product_id = response['data'][i].product_id;
                    let product_measurment_id = response['data'][i].product_measurment_id;
                    let name = response['data'][i].name;
                    let amount = response['data'][i].amount;
                    let row = `
                            <tr><td>${name}</td><td>${amount}</td><td><i class="fa fa-trash" onclick="deleteMeasurmentOption(${id}, ${product_id}, ${ids})" aria-hidden="true"></i></td></tr>
                                `
                    $(".measurment-option-data").append(row);
                }
            }
        }
    });
}


$(document).ready(function(){
    $(".specification-option-data").hide();
    $(".measurement-option-div").hide();
});

function deleteMeasurmentOption(id, product_id, ids) {
    const url = 'deleteMeasurmentOption';
    swal({
      title: "Delete option",
      text: "Are you sure you want to remove this option ?",
      icon: "warning",
      buttons: [
        'CANCEL',
        'REMOVE'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            method: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(result) {
                if(result == "1"){
                    toastr.success("option successfully removed !");
                    viewMeasurmentsOptions(ids, product_id);
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}

function refreshMeasurments() {
    $('#add-measurment-form').trigger("reset");
}

function addMeasurmentsOptions(ids, product_id) {
    $(".measurement-option-div").show();
    $("#product_measurment_options_product_id").val(product_id);
    $("#product_measurment_options_product_measurment_id").val(ids);
}

function saveMeasurmentOption() {
    const product_measurment_options_product_id = $('#product_measurment_options_product_id').val();
    const product_measurment_options_name = $("#product_measurment_options_name").val();
    const product_measurment_options_product_measurment_id = $("#product_measurment_options_product_measurment_id").val();
    const product_measurment_options_amount = $("#product_measurment_options_amount").val();
    const url = 'saveProductSpecificationOption';
    if(product_measurment_options_product_id == '' || product_measurment_options_name == '' || product_measurment_options_product_measurment_id == '' || product_measurment_options_amount == ''){
        toastr.warning("Missing field ! Try again");
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            type: 'post',
            data: { product_id: product_measurment_options_product_id, product_measurment_id: product_measurment_options_product_measurment_id, name: product_measurment_options_name, amount: product_measurment_options_amount},
            success: function(response){
                if(response == "1"){
                    toastr.success("option store successfully !");
                    $("#add-measurment-option-form")[0].reset();
                    viewMeasurmentsOptions(product_measurment_options_product_measurment_id, product_measurment_options_product_id);
                } else if(response == '2'){
                    toastr.warning("Already available ! Try again");
                } else if(response == '3') {
                    toastr.error("Some errors occured ! Try again");
                } else {
                    toastr.error("Invalid request ! Try again");
                }
            }
        });
    }
}