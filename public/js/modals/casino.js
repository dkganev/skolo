$(document).ready(function(){

// CASINO JQUERY AJAX
$('#add-casino').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_casino,
		data: { 
			casinoid: $('#addCasinoModal input[name="casinoid"]').val() ,
			casinoname: $('#addCasinoModal input[name="casinoname"]').val() ,
			casinoaddr: $('#addCasinoModal input[name="casinoaddr"]').val() ,
			casinogsm: $('#addCasinoModal input[name="casinogsm"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addCasinoModal').modal('hide');
		window.location.reload();
	});
});

// Populate Update Game Client  Modal
$('#updateCasinoModal').on('show.bs.modal', function(e) {

	//get data-* attributes of the clicked element
	var casinoId = $(e.relatedTarget).data('casinoid');
	var casinoName = $(e.relatedTarget).data('casinoname');
	var casinoAddr = $(e.relatedTarget).data('casinoaddr');
	var casinoGsm = $(e.relatedTarget).data('casinogsm');

    //populate the textbox
    $(e.currentTarget).find('input[name="casinoid"]').val(casinoId);
    $(e.currentTarget).find('input[name="casinoname"]').val(casinoName);
    $(e.currentTarget).find('input[name="casinoaddr"]').val(casinoAddr);
    $(e.currentTarget).find('input[name="casinogsm"]').val(casinoGsm);
});

$('#update-casino').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_casino,
		data: { 
			casinoid: $('#updateCasinoModal input[name="casinoid"]').val() ,
			casinoname: $('#updateCasinoModal input[name="casinoname"]').val() ,
			casinoaddr: $('#updateCasinoModal input[name="casinoaddr"]').val() ,
			casinogsm: $('#updateCasinoModal input[name="casinogsm"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#updateCasinoModal').modal('hide');
		window.location.reload();
	});
});

}); // <== End Document Ready