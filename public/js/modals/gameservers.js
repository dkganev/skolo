$(document).ready(function(){

// GAME SERVERS JQUERY AJAX
$('#game-client-save').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_game_client,
		data: { 
			client_game_id: $('#addGameClientModal input[name="client_game_id"]').val() ,
			client_game_name: $('#addGameClientModal input[name="client_game_name"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addGameClientModal').modal('hide');
		window.location.reload();
	});
});

// Populate Update Game Client  Modal
$('#updateGameClientModal').on('show.bs.modal', function(e) {

    //get data-* attributes of the clicked element
    var clientGameId = $(e.relatedTarget).data('id');
    var clientGameName = $(e.relatedTarget).data('name');

    //populate the textbox
    $(e.currentTarget).find('input[name="client_game_id"]').val(clientGameId);
    $(e.currentTarget).find('input[name="client_game_name"]').val(clientGameName);
});

// Update Game Client Modal
$('#game-client-update').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_game_client,
		data: { 
			client_game_id: $('#updateGameClientModal input[name="client_game_id"]').val() ,
			client_game_name: $('#updateGameClientModal input[name="client_game_name"]').val() ,
			_token: token
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#updateGameClientModal').modal('hide');
		window.location.reload();
	});
});


// GAME SERVERS
// Add Game Modal
$('#add-game').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_game,
		data: { 
			client_game_id: $('#addGameModal select[name="client_game_id"]').val() ,
			game_category: $('#addGameModal select[name="game_category"]').val() ,
			game_type: $('#addGameModal select[name="game_type"]').val() ,
			gameid: $('#addGameModal input[name="gameid"]').val() ,
			//game_type: $('#addGameModal input[name="game_type"]').val() ,
			short_name: $('#addGameModal input[name="short_name"]').val() ,
			description: $('#addGameModal input[name="description"]').val() ,
			db_name: $('#addGameModal input[name="db_name"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addGameModal').modal('hide');
		window.location.reload();
	});
});

// Update Machine Modal
$('#updateGameModal').on('show.bs.modal', function(e) {
    //get data-* attributes of the clicked element
    var clientGameId = $(e.relatedTarget).data('clientgameid');
    var gameId = $(e.relatedTarget).data('gameid');
    var description = $(e.relatedTarget).data('description');
    var gameType = $(e.relatedTarget).data('gametype');
    var dbName = $(e.relatedTarget).data('dbname');
    var shortName = $(e.relatedTarget).data('shortname');
    //populate the textbox
    $(e.currentTarget).find('select[name="client_game_id"]').val(clientGameId);
    $(e.currentTarget).find('input[name="gameid"]').val(gameId);
    $(e.currentTarget).find('input[name="description"]').val(description);
    $(e.currentTarget).find('select[name="game_type"]').val(gameType);
    $(e.currentTarget).find('input[name="db_name"]').val(dbName);
    $(e.currentTarget).find('input[name="short_name"]').val(shortName);
});

$('#game-update').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_game,
		data: { 
			client_game_id: $('#updateGameModal select[name="client_game_id"]').val() ,
			gameid: $('#updateGameModal input[name="gameid"]').val() ,
			game_type: $('#updateGameModal select[name="game_type"]').val() ,
			short_name: $('#updateGameModal input[name="short_name"]').val() ,
			description: $('#updateGameModal input[name="description"]').val() ,
			db_name: $('#updateGameModal input[name="db_name"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#updateGameModal').modal('hide');
		window.location.reload();
	});
});

// CATEGORY
$('#add-category').on('click', function() {
	$.ajax({
		method: 'POST',
		url: add_category,
		data: { 
			idx: $('#addCategoryModal input[name="idx"]').val() ,
			name: $('#addCategoryModal input[name="name"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#addCategoryModal').modal('hide');
		window.location.reload();
	});
});


$('#updateCategoryModal').on('show.bs.modal', function(e) {
    //get data-* attributes of the clicked element
    var idx = $(e.relatedTarget).data('idx');
    var name = $(e.relatedTarget).data('name');

    //populate the textbox
    $(e.currentTarget).find('input[name="idx"]').val(idx);
    $(e.currentTarget).find('input[name="name"]').val(name);

});

$('#update-category').on('click', function() {
	$.ajax({
		method: 'POST',
		url: update_category,
		data: { 
			idx: $('#updateCategoryModal input[name="idx"]').val() ,
			name: $('#updateCategoryModal input[name="name"]').val() ,
			_token: token 
		} 
	})
	.done(function (msg) {
		console.log(msg['message']);
		$('#updateCategoryModal').modal('hide');
		window.location.reload();
	});
});


}); // <== End Document Ready