$(document).ready(function() {
	$('.women-cms-images').hide();
	$('.men-image').hide();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').hide();
	$('.footware-image').hide();
});

function womenInches() {
	$('.women-inches-images').show();
	$('.women-cms-images').hide();
	$('.men-image').hide();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').hide();
	$('.footware-image').hide();
}

function womenCM() {
	$('.women-inches-images').hide();
	$('.women-cms-images').show();
	$('.men-image').hide();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').hide();
	$('.footware-image').hide();
}

function men() {
	$('.women-inches-images').hide();
	$('.women-cms-images').hide();
	$('.men-image').show();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').hide();
	$('.footware-image').hide();
}

function kidsGirl() {
	$('.women-inches-images').hide();
	$('.women-cms-images').hide();
	$('.men-image').hide();
	$('.kids-girl-image').show();
	$('.kids-boy-image').hide();
	$('.footware-image').hide();
}

function kidsBoy() {
	$('.women-inches-images').hide();
	$('.women-cms-images').hide();
	$('.men-image').hide();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').show();
	$('.footware-image').hide();
}

function footware() {
	$('.women-inches-images').hide();
	$('.women-cms-images').hide();
	$('.men-image').hide();
	$('.kids-girl-image').hide();
	$('.kids-boy-image').hide();
	$('.footware-image').show();
}