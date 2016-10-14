<div class="container-fluid">
<div class="row">
     <!--  page header -->
    <div class="col-md-12" >
    
        <a href="{{ route('export.terminals') }}" class="btn btn-warning  pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>

        <h1 style="margin-top: 0px; color:white;" class="page-header">Machine Statistics</h1>

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
                                <td>{{ $c->server_ps->psid }}</td>
                                <td>{{ $c->server_ps->dallasid }}</td>
                                <td>{{ $c->totalIn() }}</td>
                                <td>{{ $c->totalOut() }}</td>
                                <td>{{ $c->totalBet() }}</td>
                                <td>{{ $c->totalWin() }}</td>
                                <td>{{ $c->totalCredit() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>