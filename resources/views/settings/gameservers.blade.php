@include('modals.gameservers-modals')
<div class="container">
<!-- Keep For Styling -->
</div>

<div class="container">
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addGameClientModal">
                    Add Game Client 
                </button>

                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 10%;">
                    Client Game IDs
                </h2>

                <a href="{{ route('export.clients') }}" class="btn btn-danger btn-sm pull-right">
                    Export
                </a>
            </div>
            
            <div class="panel-body">
                <table class="table table-striped table-bordered game-servers" role="grid"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 5]"
                    data-page-size='5'
                    data-classes="table-condensed"
                    >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Game ID</th>
                            <th data-sortable="true">Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($game_clients as $game_client)
                        <tr class="tr-class">
                            <td>{{ $game_client->client_game_id }}</td>
                            <td>{{ $game_client->client_game_name }}</td>
                            <td>
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateGameClientModal"
                                    data-id="{{ $game_client->client_game_id }}"
                                    data-name="{{ $game_client->client_game_name }}"
                                    class="btn btn-primary btn-xs"
                                >
                                Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--  end  Context Classes  -->
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addCategoryModal">
                    Add Game Category 
                </button>

                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 7%;">
                    Game Categories
                </h2>

                <a href="#" class="btn btn-danger btn-sm pull-right">
                    Export
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered game-servers" id="gameTable" role="grid"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                    data-page-size='5'
                    data-classes="table-condensed"
                    >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Category ID</th>
                            <th data-sortable="true">Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="tr-class">
                            <td>{{ $category->idx }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateCategoryModal"
                                    data-idx="{{ $category->idx }}"
                                    data-name="{{ $category->name }}"
                                    class="btn btn-primary btn-xs"
                                >
                                Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--  end  Context Classes  -->
    </div>
</div>

<!-- GameServers -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addGameModal">
                    Add Game 
                </button>

                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                    Game Servers
                </h2>
                
                <a href="{{ route('export.games') }}" class="btn btn-danger btn-sm pull-right">
                   Export
                </a>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered game-servers" id="gameTable" role="grid"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                    data-classes="table-condensed"
                >
                    <thead>
                        <tr>
                            <th data-sortable="true">Client Game ID</th>
                            <th data-sortable="true">Game ID</th>
                            <th data-sortable="true">Game Description</th>
                            <th data-sortable="true">Game Type</th>
                            <th data-sortable="true">DB Name</th>
                            <th data-sortable="true">Category</th>
                            <th data-sortable="true">Short Name:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                        <tr class="tr-class">
                            <td>{{ $game->client_game_id }}</td>
                            <td>{{ $game->gameid }}</td>
                            <td>{{ $game->description }}</td>
                            <td>{{ $game->type->type }}</td>
                            <td>{{ $game->db_name }}</td>
                            <td>{{ $game->category->name }}</td>
                            <td>{{ $game->short_name }}</td>
                            <td>
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateGameModal"
                                    data-clientgameid="{{ $game->client_game_id }}"
                                    data-gameid="{{ $game->gameid }}" 
                                    data-description="{{ $game->description }}"
                                    data-gametype="{{ $game->type->game_type }}"
                                    data-dbname="{{ $game->db_name }}"
                                    data-shortname="{{ $game->short_name }}"
                                    data-color="{{ $game->color }}"
                                    class="btn btn-primary btn-xs"
                                >
                                Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>

<script>
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
    var color = $(e.relatedTarget).data('color');
    //populate the textbox
    $(e.currentTarget).find('select[name="client_game_id"]').val(clientGameId);
    $(e.currentTarget).find('input[name="gameid"]').val(gameId);
    $(e.currentTarget).find('input[name="description"]').val(description);
    $(e.currentTarget).find('select[name="game_type"]').val();
    $(e.currentTarget).find('input[name="db_name"]').val(dbName);
    $(e.currentTarget).find('input[name="short_name"]').val(shortName);
    $(e.currentTarget).find('input[name="color"]').val(color);
    $(e.currentTarget).find('strong#color-label').text(color);
});

$('#game-update').on('click', function () {
    $.ajax({
        method: 'POST',
        url: update_game,
        data: {
            client_game_id: $('#updateGameModal select[name="client_game_id"]').val(),
            gameid: $('#updateGameModal input[name="gameid"]').val(),
            game_type: $('#updateGameModal select[name="game_type"]').val(),
            short_name: $('#updateGameModal input[name="short_name"]').val(),
            description: $('#updateGameModal input[name="description"]').val(),
            db_name: $('#updateGameModal input[name="db_name"]').val(),
            color: $('#updateGameModal input[name="color"]').val(),
            _token: token 
        }
    }).done(function () {
        $('#updateGameModal').modal('hide');
        $('body').removeClass('modal-open')
        $('.modal-backdrop').remove()
        javascript:ajaxLoad('{{url('settings/gameservers')}}')
    })
})

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
    }).done(function() {
        $('#addCategoryModal').modal('hide')
        $('body').removeClass('modal-open')
        $('.modal-backdrop').remove()
        javascript:ajaxLoad('{{url('settings/gameservers')}}')
    })
})

$('#updateCategoryModal').on('show.bs.modal', function(e) {
    //get data-* attributes of the clicked element
    var idx = $(e.relatedTarget).data('idx');
    var name = $(e.relatedTarget).data('name');

    //populate the textbox
    $(e.currentTarget).find('input[name="idx"]').val(idx)
    $(e.currentTarget).find('input[name="name"]').val(name)

})

$('#update-category').on('click', function() {
    $.ajax({
        method: 'POST',
        url: update_category,
        data: { 
            idx: $('#updateCategoryModal input[name="idx"]').val() ,
            name: $('#updateCategoryModal input[name="name"]').val() ,
            _token: token 
        } 
    }).done(function() {
        $('#updateCategoryModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        javascript:ajaxLoad('{{url('settings/gameservers')}}')
    })
})
</script>
