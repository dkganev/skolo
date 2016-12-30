<div class="container"> 
    <div class="row">
      <div class="col-md-9">
        <ul class="breadcrumb">
          <li><a href="javascript:ajaxLoad('{{url('statistics/game-machine-blackjack')}}')">@lang('messages.Blackjack')</a></li>
          
          <li class="active"><a href="javascript:ajaxLoad('{{url('/statistics/game-machine-bingo')}}')">@lang('messages.Bingo')</a></li>
  
          <li><a href="javascript:ajaxLoad('{{url('/statistics/game-machine-rl1')}}')">@lang('messages.Roulette') 1</a></li>

          <li><a href="javascript:ajaxLoad('{{url('/statistics/game-machine-rl2')}}')">@lang('messages.Roulette') 2</a></li>
        </ul>
      </div>
    </div>
</div>

<div class="container">
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default" id="panelTerminatsContend">
            <div class="panel-heading" id="socketConect">
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 30%;">
                    @lang('messages.Bingo')
                </h2>
                <a href="/statistics/game-machine-bingo/export" class="btn btn-warning  pull-right ">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                    @lang('messages.Export')
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-warning  pull-right" onclick="ExportToPNGTerminatsTable();">
                    @lang('messages.Export to PNG')
                </a>
            </div>
                <div class="panel-body" >
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-classes="table-condensed"
                          >
                    <thead class="w3-dark-grey">
                      <tr>
                          <th data-sortable="true">@lang('messages.PS ID')</th>
                          <th data-sortable="true">@lang('messages.Total Bet') (@lang('messages.dollar'))</th>
                          <th data-sortable="true">@lang('messages.Total Win') (@lang('messages.dollar'))</th>
                          <th data-sortable="true">@lang('messages.Jackpot') (@lang('messages.dollar'))</th>
                          <th data-sortable="true">@lang('messages.Games')</th>
                          <th data-sortable="true">@lang('messages.JP Hits')</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($counters as $counter)
                        <tr class="tr-class">
                            <td class="text-center">{{ $counter->psid }}</td>
                            <td class="text-right">{{ number_format($counter->bet/100, 2) }}</td>
                            <td class="text-right">{{ number_format($counter->win/100, 2) }}</td>
                            <td class="text-right">{{ number_format($counter->jp/100, 2) }}</td>
                            <td class="text-right">{{ $counter->games }}</td>
                            <td class="text-right">{{ $counter->jp_hits }}</td>
                        </tr>
                      @endforeach
                      <tr class="danger">
                        <td class="text-center"><strong style="color:black;">@lang('messages.TOTAL')</strong></td>
                        <td class="text-right">{{ number_format($totals['bet']/100, 2) }}</td>
                        <td class="text-right">{{ number_format($totals['win']/100, 2) }}</td>
                        <td class="text-right">{{ number_format($totals['jp']/100, 2) }}</td>
                        <td class="text-right">{{ $totals['games'] }}</td>
                        <td class="text-right">{{ $totals['jp_hits'] }}</td>
                      </tr>
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div><!--End Row -->
</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>
