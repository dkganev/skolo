<div class="container">

<div class="row" >
    <div class="col-md-9">
        <div class="panel panel-default" id="panelGameContend">
            <div class="panel-heading" id="panel-heading">
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 15%;">
                    @lang('messages.Game Statistics')
                </h2>
                <a class="btn btn-warning  pull-right" onclick="export2excelTerminal();">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                    @lang('messages.Export')
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                    <a  class="btn btn-warning  pull-right" onclick="ExportToPNGGameTable();">
                        @lang('messages.Export to PNG')
                    </a>
                </div>
                <div class="panel-body" >
                    <input id="pageReload" type="hidden" val="" data-URL="javascript:ajaxLoad('{{url('statistics/games')}}" data-excel-url="{{ route('export2excelGamesStatistics') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" > 
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
                            <th data-sortable="true" onclick="changePageSortTerminal('gameid', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'gameid' ? 'asc' : 'desc' }}');">@lang('messages.ID')<i class="fa {{ $page['OrderQuery'] == 'gameid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('description', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'description' ? 'asc' : 'desc' }}');">@lang('messages.Description')<i class="fa {{ $page['OrderQuery'] == 'description' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('counters_bet', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'counters_bet' ? 'asc' : 'desc' }}');">@lang('messages.Bet') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'counters_bet' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('counters_win', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'counters_win' ? 'asc' : 'desc' }}');">@lang('messages.Win') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'counters_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('counters_jp', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'counters_jp' ? 'asc' : 'desc' }}');">@lang('messages.JP') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'counters_jp' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('counters_games', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'counters_games' ? 'asc' : 'desc' }}');">@lang('messages.Games')<i class="fa {{ $page['OrderQuery'] == 'counters_games' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('counter_jp_hits', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'counter_jp_hits' ? 'asc' : 'desc' }}');">@lang('messages.JP Hits')<i class="fa {{ $page['OrderQuery'] == 'counter_jp_hits' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                        </tr>
                        <tbody>
                            @foreach($games as $game)
                            <tr class="tr-class">
                                <td class="text-center">{{ $game->gameid }}</td>
                                <td class="text-center">{{ $game->description }}</td>
                                <td class="text-right">{{ number_format($game->counters_bet/100, 2) }}</td>
                                <td class="text-right">{{ number_format($game->counters_win/100, 2) }}</td>
                                <td class="text-right">{{ number_format($game->counters_jp/100, 2) }}</td>
                                <td class="text-right">{{ $game->counters_games }}</td>
                                <td class="text-right">{{ $game->counter_jp_hits }}</td>
                            </tr>
                            @endforeach
                            <tr class="danger">
                                <td class="text-center" colspan="2"><strong style="color:black;">@lang('messages.TOTAL')</strong></td>
                                <td class="text-right">{{ number_format($games_bet/100, 2) }}</td>
                                <td class="text-right">{{ number_format($games_win/100, 2) }}</td>
                                <td class="text-right">{{ number_format($games_jp/100, 2) }}</td>
                                <td class="text-right">{{ $games_games }}</td>
                                <td class="text-right">{{ $games_jp_hits }}</td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->

</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script>-->

<script>
    socket.disconnect();
    sockStatus = 0;
</script>