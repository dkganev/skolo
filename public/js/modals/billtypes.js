$(document).ready(function(){

//BILLING JQUERY AJAX 
$('#add-bill').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_billtype,
		data: { 
			idtype: $('#addBillModal input[name="idtype"]').val() ,
			billname: $('#addBillModal input[name="billname"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addBillModal').modal('hide');
		window.location.reload();
	});
});

$('#updateBillModal').on('show.bs.modal', function(e) {

	//get data-* attributes of the clicked element
	var idType = $(e.relatedTarget).data('idtype');
	var billName = $(e.relatedTarget).data('billname');

    //populate the textbox
    $(e.currentTarget).find('input[name="idtype"]').val(idType);
    $(e.currentTarget).find('input[name="billname"]').val(billName);
});

$('#update-bill').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_billtype,
		data: { 
			idtype: $('#updateBillModal input[name="idtype"]').val() ,
			billname: $('#updateBillModal input[name="billname"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('updateBillModal').modal('hide');
		window.location.reload();
	});
});

}); // <== End Document Ready