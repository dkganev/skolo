<div class="container-fluid">
<div class="row">
     <!--  page header -->
    <div class="col-md-12" >
    <a href="{{ route('export.terminals') }}" class="btn btn-warning  pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>

        <h1 style="margin-top: 0px; color:white;" class="page-header">Game Statistics</h1>

    </div>
     <!-- end  page header -->
</div>

<div class="row" >
    <div class="col-md-12">

        <div class="panel panel-default" >
            <div class="panel-heading">
                <!--  -->
            </div>

                <div class="panel-body" >
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"

                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[3, 5, 10, 15]"

                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th data-sortable="true">Game ID</th>
                            <th data-sortable="true">Description</th>
                            <th data-sortable="true">BET</th>
                            <th data-sortable="true">WIN</th>
                            <th data-sortable="true">JP</th>
                            <th data-sortable="true">GAMES</th>
                            <th data-sortable="true">JP HITS</th>
                        </tr>

                        <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <td>{{ $game->gameid }}</td>
                                    <td>{{ $game->description }}</td>
                                    <td>{{ $game->counters_bet }}</td>
                                    <td>{{ $game->counters_win }}</td>
                                    <td>{{ $game->counters_jp }}</td>
                                    <td>{{ $game->counters_games }}</td>
                                    <td>{{ $game->counter_jp_hits }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>