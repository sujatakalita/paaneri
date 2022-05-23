$(document).ready(function() {
	getSavedAddressRecord();
	$("#save_address_form").hide();
});

function cancelAddressData(){
	$("#save_address_form").hide();
}

function showSaveAddressForm(){
	$("#save_address_form").show();
}

function getSavedAddressRecord(){
	const url = 'address/get';
	$.ajax({
		url: url,
		method: 'get',
		dataType: 'json',
		success: function(response) {
			var address_data = ``;
			var datas = response.data;
			datas.forEach(function(data, index) {
				var index_value = index + 1;
				address_data += `
				<li class="list-group-item p-3">
                    <span class="badge bg-light text-dark mb-2">${data.home_office == 1 ? 'Home' : 'Office'}</span><br>
                    <span>${data.address}</span><br>
                    <span><b>${data.city}</b></span>, <span>${data.state}</span>, <span>${data.country}</span>, <span><b>${data.pincode}</b></span><br>
                    <span class="badge bg-primary" onclick="editAddress(${data.id})" style='cursor: pointer;'>EDIT</span>&nbsp;<span class="badge bg-danger" onclick="deleteAddress(${data.id})" style='cursor: pointer;'>DELETE</span>
                </li>`;
                $('#address_list').html(address_data);
			});
		}
	});
}

function saveAddressData() {
	const pincode = $("#save_pincode").val();
	const city = $("#save_city").val();
	const address = $("#save_address").val();
	const country = $("#save_country").val();
	const state = $("#save_state").val();
	const landmark = $("#save_landmark").val();
	const alternate_mobile = $("#save_alternate_mobile").val();
	const address_type = $('input[name="save_address_type"]:checked').val();
	const url = 'address/store';
	if(pincode == ''){
		toastr.warning("Pincode required !");
	} else if(city == ''){
		toastr.warning("City required !");
	} else if(address == ''){
		toastr.warning("Address required !");
	} else if(country == ''){
		toastr.warning("Country required !");
	} else if(state == ''){
		toastr.warning("State required !");
	} else if(address_type == ''){
		toastr.warning("Address type required !");
	} else {
		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        },
			url: url,
			method: 'post',
			data: { pincode: pincode, city: city, address: address, country: country, state: state, landmark:landmark, alternate_mobile:alternate_mobile, address_type:address_type},
			success: function(response) {
				if(response == "1"){
					toastr.success("Address store successfully !");
					$("#save_address_form")[0].reset();
					// $("#save_address_form").hide();
					getSavedAddressRecord();
				} else if(response == '2'){
					toastr.warning("Some errors occured ! Try again");
				} else {
					toastr.error("Invalid request ! Try again");
				}
			}
		});
	}
}

function editAddress(id) {
	const url = 'address/getOne/'+id;
	$.ajax({
		url: url,
		method: 'get',
		dataType: 'json',
		success: function(response) {
			var update_button_data = ``;
			$('#edit_address').modal('toggle');
			$('#pincode').val(response.data.pincode);
			$('#city').val(response.data.city);
			$('#address').val(response.data.address);
			$('#country').val(response.data.country);
			$('#state').val(response.data.state);
			$('#landmark').val(response.data.landmark);
			$('#alternate_mobile').val(response.data.alternateMobile);
			update_button_data += `
				<button type="button" onclick="updateAddressData(${response.data.id});" class="btn btn-primary">SAVE</button>
			`;
			$('.update_button').html(update_button_data);
		}
	});
}

function deleteAddress(id) {
	const url = 'address/delete';
    swal({
      title: "Delete address",
      text: "Are you sure you want to remove this address?",
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
                    toastr.success("Address successfully removed !");
                    getSavedAddressRecord();
                } else {
                    toastr.danger("Some error occured ! Try again");
                }
            }
        });
      }
    })
}

function updateAddressData(id) {
	const pincode = $("#pincode").val();
	const city = $("#city").val();
	const address = $("#address").val();
	const country = $("#country").val();
	const state = $("#state").val();
	const landmark = $("#landmark").val();
	const alternate_mobile = $("#alternate_mobile").val();
	const address_type = $('input[name="address_type"]:checked').val();
	const url = 'address/update';
	if(pincode == '' || city == '' || address == '' || country == '' || state == ''|| address_type == ''){
		toastr.warning("Menditory fields are required !");
	} else {
		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        },
			url: url,
			method: 'post',
			data: { pincode: pincode, city: city, address: address, country: country, state: state, landmark:landmark, alternate_mobile:alternate_mobile, address_type:address_type, id: id},
			success: function(response) {
				if(response == "1"){
					toastr.success("Address updated successfully !");
					$("#update_address_form")[0].reset();
					$('#edit_address').modal('hide');
					getSavedAddressRecord();
				} else if(response == '2'){
					toastr.warning("Invalid request ! Try again");
				} else if(response == '3') {
					toastr.error("Data mismatched error! Try again");
				} else {
					toastr.error("Some errors occured ! Try again");
				}
			}
		});
	}
}