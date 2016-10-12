$(document).ready(function(){

// LANGUAGES JQUERY AJAX 
$('#add-language').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_language,
		data: { 
			langid: $('#addLanguageModal input[name="langid"]').val() ,
			langname: $('#addLanguageModal input[name="langname"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addLanguageModal').modal('hide');
		window.location.reload();
	});
});

$('#updateLanguageModal').on('show.bs.modal', function(e) {

	//get data-* attributes of the clicked element
	var langId = $(e.relatedTarget).data('langid');
	var langName = $(e.relatedTarget).data('langname');

    //populate the textbox
    $(e.currentTarget).find('input[name="langid"]').val(langId);
    $(e.currentTarget).find('input[name="langname"]').val(langName);
});

$('#update-language').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_language,
		data: { 
			langid: $('#updateLanguageModal input[name="langid"]').val() ,
			langname: $('#updateLanguageModal input[name="langname"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#updateLanguageModal').modal('hide');
		window.location.reload();
	});
});

}); // <== End Document Ready