<div class="container">

<div class="row" >
    <div class="col-md-8">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                    Game Statistics
                </h2>
                <a href="{{ route('export.terminals') }}" class="btn btn-warning  pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                </a>
            </div>
                <div class="panel-body" >
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[20, 40, 100]"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th data-sortable="true">ID</th>
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

</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>