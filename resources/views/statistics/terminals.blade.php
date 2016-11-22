<div class="container">
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                    Machine Statistics
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
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th data-sortable="true">PS ID</th>
                            <th data-sortable="true">Dallas ID</th>
                            <th data-sortable="true">Total In</th>
                            <th data-sortable="true">Total Out</th>
                            <th data-sortable="true">Total Bet</th>
                            <th data-sortable="true">Total Win</th>
                            <th data-sortable="true">Total Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($counters as $c)
                            <tr>
                                <td class="text-center">{{ $c->server_ps->psid }}</td>
                                <td class="text-center">{{ $c->server_ps->dallasid }}</td>
                                <td class="text-center">{{ $c->totalIn() }}</td>
                                <td class="text-center">{{ $c->totalOut() }}</td>
                                <td class="text-center">{{ $c->totalBet() }}</td>
                                <td class="text-center">{{ $c->totalWin() }}</td>
                                <td class="text-center">{{ $c->totalCredit() }}</td>
                            </tr>
                        @endforeach
                        <tr class="danger">
                            <td class="text-center" colspan="2"><strong>TOTAL</strong></td>
                            <td class="text-center">{{ $totals['totalIn'] }}</td>
                            <td class="text-center">{{ $totals['totalOut'] }}</td>
                            <td class="text-center">{{ $totals['totalBet'] }}</td>
                            <td class="text-center">{{ $totals['totalWin'] }}</td>
                            <td class="text-center">{{ $totals['totalCredit'] }}</td>
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