$(document).ready(function(){

//BILLING JQUERY AJAX 
$('#add-error-lvl').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_error_lvl,
		data: { 
			err_level: $('#addErrorLevelModal input[name="err_level"]').val() ,
			level_str: $('#addErrorLevelModal input[name="level_str"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addErrorLevelModal').modal('hide');
		window.location.reload();
	});
});

$('#add-error-list').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_error_list,
		data: { 
			err_level: $('#addErrorListModal select[name="err_level"]').val() ,
			err_code: $('#addErrorListModal input[name="err_code"]').val() ,
			err_group: $('#addErrorListModal select[name="err_group"]').val() ,
			err_text: $('#addErrorListModal input[name="err_text"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addErrorListModal').modal('hide');
		window.location.reload();
	});
});

}); // <== End Document Ready