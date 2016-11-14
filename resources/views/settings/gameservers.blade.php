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

                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 10%;">
                    Client Game IDs
                </h2>

                <a href="{{ route('export.clients') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>

            </div>
            
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover data-table-table game-servers" role="grid"
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
                        <tr>
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

                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 7%;">
                    Game Categories
                </h2>

                <a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover data-table-table game-servers" id="gameTable" role="grid"
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
                        <tr>
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
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                    Game Servers
                </h2>
                <a href="{{ route('export.games') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg"      aria-hidden="true"></i> Export
                </a>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover data-table-table game-servers" id="gameTable" role="grid"
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
                    <thead class="w3-blue-grey">
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
                        <tr>
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
<script src="/js/modals/gameservers.js" type="text/javascript"></script>
