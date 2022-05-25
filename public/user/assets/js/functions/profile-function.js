$(document).ready(function() {
	get_profile_record();
	$(".profile_save_btn").hide();
	$(".mobile_save_btn").hide();
	$("#information_edit_cancel").hide();
	$("#mobile_edit_cancel").hide();
	$("#username").prop("readonly", true);
	$("#useremail").prop("readonly", true);
	$("#mobile").prop("readonly", true);
});

function get_profile_record() {
	const url = 'profile/getProfileInformation';
	$.ajax({
		url: url,
		method: 'get',
		dataType: 'json',
		success: function(response) {
			$("#username").val(response['data'][0].name);
			$("#useremail").val(response['data'][0].email);
			$("#mobile").val(response['data'][0].mobile_no);
		}
	}); 
}

function controlToEdit() {
	$("#username").prop("readonly", false);
	$("#useremail").prop("readonly", false);
	$(".profile_save_btn").show();
	$("#information_edit").hide();
	$("#information_edit_cancel").show();
}

function controlToCancel() {
	$("#username").prop("readonly", true);
	$("#useremail").prop("readonly", true);
	$(".profile_save_btn").hide();
	$("#information_edit").show();
	$("#information_edit_cancel").hide();
}

function updateProfileData() {
	const name = $("#username").val();
	const email = $("#useremail").val();
	const url = 'profile/updateProfileInformation';
	$.ajax({
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
		url: url,
		method: 'post',
		data: {
            name: name,
            email: email
        },
		success: function(response) {
			if(response == "1"){
				toastr.success("Your information successfully updated !");
				get_profile_record();
				$(".profile_save_btn").hide();
				$("#information_edit_cancel").hide();
				$("#username").prop("readonly", true);
				$("#useremail").prop("readonly", true);
				$("#information_edit").show();
			} else if(response == "2") {
				toastr.error("Some error occured try again !");
			} else {
				toastr.error("Unknown error!");
			}
		}
	});
}

function mobileToEdit() {
	$("#mobile").prop("readonly", false);
	$(".mobile_save_btn").show();
	$("#mobile_edit_cancel").show();
	$("#mobileNumber_edit").hide();
}

function mobileToCancel() {
	$("#mobile").prop("readonly", true);
	$(".mobile_save_btn").hide();
	$("#mobile_edit_cancel").hide();
	$("#mobileNumber_edit").show();
}

function updateMobile(){
	const mobile = $("#mobile").val();
	const url = 'profile/updateProfileMobile';
	$.ajax({
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
		url: url,
		method: 'post',
		data: {
            mobile: mobile
        },
		success: function(response) {
			if(response == "1"){
				toastr.success("Mobile number successfully updated !");
				get_profile_record();
				$(".mobile_save_btn").hide();
				$("#mobile_edit_cancel").hide();
				$("#mobile").prop("readonly", true);
				$("#mobileNumber_edit").show();
			} else if(response == "2") {
				toastr.error("Some error occured try again !");
			} else {
				toastr.error("Unknown error!");
			}
		}
	});
}