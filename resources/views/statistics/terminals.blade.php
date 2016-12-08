<div class="container">
<div class="row">
    <div class="col-md-11">
        <div class="panel panel-default" id="panelTerminatsContend">
            <div class="panel-heading" id="socketConect">
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 5%;">
                    Machine Statistics
                </h2>

                <a href="{{ route('export2excelTerminalsStatistics') }}" class="btn btn-warning  pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a  class="btn btn-warning  pull-right" onclick="ExportToPNGTerminatsTable();">
                    Export to PNG
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a id="socketConectRealtime" class="btn btn-warning  pull-right" onclick="socketConect();">
                    Start Real Time
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
                            <th data-sortable="true">PS ID</th>
                            <th data-sortable="true">Dallas ID</th>
                            <th data-sortable="true">Total In (cents)</th>
                            <th data-sortable="true">Total Out (cents)</th>
                            <th data-sortable="true">Total Bet (cents)</th>
                            <th data-sortable="true">Total Win (cents)</th>
                            <th data-sortable="true">Total Credit (cents)</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($counters as $c)
                            <tr class="tr-class" id="tr{{$c->psid}}">
                                <td>{{ $c->server_ps->psid }}</td>
                                <td>{{ $c->server_ps->dallasid }}</td>
                                <td class="text-center" id="TotalIn{{$c->psid}}">{{ number_format($c->totalIn()/100, 2) }}</td>
                                <td class="text-center" id="TotalOut{{$c->psid}}">{{ number_format($c->totalOut()/100, 2) }}</td>
                                <td class="text-center" id="TotalBet{{$c->psid}}">{{ number_format($c->totalBet()/100, 2) }}</td>
                                <td class="text-center" id="TotalWin{{$c->psid}}">{{ number_format($c->totalWin()/100, 2) }}</td>
                                <td class="text-center" id="TotalCredit{{$c->psid}}">{{ number_format($c->totalCredit()/100, 2) }}</td>

                            </tr>
                        @endforeach
                        <tr class="danger" >
                            <td class="text-center" colspan="2"><strong style="color:black;">TOTAL</strong></td>
                            <td class="text-center" id="TotalIn">{{ number_format($totals['totalIn']/100, 2) }}</td>
                            <td class="text-center" id="TotalOut">{{ number_format($totals['totalOut']/100, 2) }}</td>
                            <td class="text-center" id="TotalBet">{{ number_format($totals['totalBet']/100, 2) }}</td>
                            <td class="text-center" id="TotalWin">{{ number_format($totals['totalWin']/100, 2) }}</td>
                            <td class="text-center" id="TotalCredit">{{ number_format($totals['totalCredit']/100, 2) }}</td>
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
<script>
    if (sockStatus == 1) {
        socket.connect();
        //sockStatus = 1;
        console.log ("Conect"); //socketConect  background-color: #f5f5f5;
        $("#socketConect").css({'background-image': 'linear-gradient(to bottom,#5cb85c 0%,#419641 100%)'});
        $("#socketConectRealtime").text('Stop Real Time');
    }else{
        socket.disconnect();
        //sockStatus = 0;
        console.log ("Disconect");
        $("#socketConect").css({'background-image': 'linear-gradient(to bottom,#f5f5f5 0%,#e8e8e8 100%)'});
        $("#socketConectRealtime").text('Start Real Time');
    }
</script>
