<div class="container">
<div class="row">
    <div class="col-md-11">
        <div class="panel panel-default" id="panelTerminatsContend">
            <div class="panel-heading" id="socketConect">
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 5%;">
                    @lang('messages.Machine Statistics')
                </h2>

                <a class="btn btn-warning  pull-right" onclick="export2excelTerminal();">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> @lang('messages.Export')
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a  class="btn btn-warning  pull-right" onclick="ExportToPNGTerminatsTable();">
                    @lang('messages.Export to PNG')
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a id="socketConectRealtime" class="btn btn-warning  pull-right" onclick="socketConect();">
                    @lang('messages.Start Real Time')
                </a>
            </div>
                <div class="panel-body" >
                    <input id="pageReload" type="hidden" val="" data-URL="javascript:ajaxLoad('{{url('statistics/terminals')}}" data-excel-url="{{ route('export2excelTerminalsStatistics') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" > 
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th data-sortable="true" onclick="changePageSortTerminal('psid', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'psid' ? 'asc' : 'desc' }}');">@lang('messages.PS ID')<i class="fa {{ $page['OrderQuery'] == 'psid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('dallasid', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'dallasid' ? 'asc' : 'desc' }}');">@lang('messages.Dallas ID')<i class="fa {{ $page['OrderQuery'] == 'dallasid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('total_in', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'total_in' ? 'asc' : 'desc' }}');">@lang('messages.Total In') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'total_in' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('total_out', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'total_out' ? 'asc' : 'desc' }}');">@lang('messages.Total Out') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'total_out' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('total_bet', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'total_bet' ? 'asc' : 'desc' }}');">@lang('messages.Total Bet') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'total_bet' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('total_win', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'total_win' ? 'asc' : 'desc' }}');">@lang('messages.Total Win') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'total_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th data-sortable="true" onclick="changePageSortTerminal('total_credit', '{{ $page['OrderDesc'] == 'desc' && $page['OrderQuery'] == 'total_credit' ? 'asc' : 'desc' }}');">@lang('messages.Total Credit') (@lang('messages.dollar'))<i class="fa {{ $page['OrderQuery'] == 'total_credit' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($counters as $c)
                            <tr class="tr-class" id="tr{{$c->psid}}">
                                <td class="text-center">{{ $c->psid }}</td>
                                <td class="text-center">{{ $c->dallasid }}</td>
                                <td class="text-right" id="TotalIn{{$c->psid}}">{{ number_format($c->total_in/100, 2) }}</td>
                                <td class="text-right" id="TotalOut{{$c->psid}}">{{ number_format($c->total_out/100, 2) }}</td>
                                <td class="text-right" id="TotalBet{{$c->psid}}">{{ number_format($c->total_bet/100, 2) }}</td>
                                <td class="text-right" id="TotalWin{{$c->psid}}">{{ number_format($c->total_win/100, 2) }}</td>
                                <td class="text-right" id="TotalCredit{{$c->psid}}">{{ number_format($c->total_credit/100, 2) }}</td>

                            </tr>
                        @endforeach
                        <tr class="danger">
                            <td class="text-center" colspan="2"><strong style="color:black;">@lang('messages.TOTAL')</strong></td>
                            <td class="text-right" id="TotalIn" data-total="{{$totals['totalIn']}}">{{ number_format($totals['totalIn']/100, 2) }}</td>
                            <td class="text-right" id="TotalOut" data-total="{{$totals['totalOut']}}">{{ number_format($totals['totalOut']/100, 2) }}</td>
                            <td class="text-right" id="TotalBet" data-total="{{$totals['totalBet']}}">{{ number_format($totals['totalBet']/100, 2) }}</td>
                            <td class="text-right" id="TotalWin" data-total="{{$totals['totalWin']}}">{{ number_format($totals['totalWin']/100, 2) }}</td>
                            <td class="text-right" id="TotalCredit" data-total="{{$totals['totalCredit']}}">{{ number_format($totals['totalCredit']/100, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div><!--End Row -->
</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script>-->
<script>
    var stopRealTime = '<?php echo app('translator')->get('messages.Stop Real Time'); ?>';
    var startRealTime = '<?php echo app('translator')->get('messages.Start Real Time'); ?>';
    if (sockStatus == 1) {
        socket.connect();
        //sockStatus = 1;
        console.log ("Conect"); //socketConect  background-color: #f5f5f5;
        //$("#socketConect").attr('style', 'background-image: linear-gradient(to bottom,#5cb85c 0%,#419641 100%) !important');
        //
        //background: rgba(164,179,87,1);
        //background: -moz-linear-gradient(top, rgba(164,179,87,1) 0%, rgba(164,179,86,1) 57%, rgba(164,179,86,1) 62%, rgba(164,179,86,1) 72%, rgba(117,137,12,1) 100%);
        //background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(164,179,87,1)), color-stop(57%, rgba(164,179,86,1)), color-stop(62%, rgba(164,179,86,1)), color-stop(72%, rgba(164,179,86,1)), color-stop(100%, rgba(117,137,12,1)));
        //background: -webkit-linear-gradient(top, rgba(164,179,87,1) 0%, rgba(164,179,86,1) 57%, rgba(164,179,86,1) 62%, rgba(164,179,86,1) 72%, rgba(117,137,12,1) 100%);
        //background: -o-linear-gradient(top, rgba(164,179,87,1) 0%, rgba(164,179,86,1) 57%, rgba(164,179,86,1) 62%, rgba(164,179,86,1) 72%, rgba(117,137,12,1) 100%);
        //background: -ms-linear-gradient(top, rgba(164,179,87,1) 0%, rgba(164,179,86,1) 57%, rgba(164,179,86,1) 62%, rgba(164,179,86,1) 72%, rgba(117,137,12,1) 100%);
        //background: linear-gradient(to bottom, rgba(164,179,87,1) 0%, rgba(164,179,86,1) 57%, rgba(164,179,86,1) 62%, rgba(164,179,86,1) 72%, rgba(117,137,12,1) 100%);
        //filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a4b357', endColorstr='#75890c', GradientType=0 );
        $("#socketConect").attr('style', 'background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(164, 179, 87, 1) 0%, rgba(164, 179, 86, 1) 57%, rgba(164, 179, 86, 1) 62%, rgba(164, 179, 86, 1) 72%, rgba(117, 137, 12, 1) 100%) repeat scroll 0 0 !important;');
        $("#socketConectRealtime").text(stopRealTime);
    }else{
        socket.disconnect();
        //sockStatus = 0;
        console.log ("Disconect");
        $("#socketConect").attr('style', 'background: rgba(0, 0, 0, 0) linear-gradient(background: linear-gradient(top, rgba(164,179,86,1) 0%, rgba(164,179,86,1) 1%, rgba(164,179,86,1) 20%, rgba(164,179,86,1) 29%, rgba(164,179,86,1) 63%, rgba(116,137,14,1) 99%, rgba(115,136,12,1) 100%);, rgba(76, 76, 76, 1) 0%, rgba(89, 89, 89, 1) 12%, rgba(102, 102, 102, 1) 25%, rgba(71, 71, 71, 1) 39%, rgba(44, 44, 44, 1) 46%, rgba(0, 0, 0, 1) 51%, rgba(44, 44, 44, 1) 55%, rgba(17, 17, 17, 1) 60%, rgba(43, 43, 43, 1) 76%, rgba(28, 28, 28, 1) 91%, rgba(19, 19, 19, 1) 100%) repeat scroll 0 0 !important;'); 
        
        //$("#div.panel-heading").css('background', '#fff', 'important');
        $("#socketConectRealtime").text(startRealTime);
    }
</script>
