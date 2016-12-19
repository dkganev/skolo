<div class="container">

<div class="row" >
    <div class="col-md-12">
        <div class="panel panel-default" id="panelGameContend">
            <div class="panel-heading" id="panel-heading">

                <a href="{{ route('export2excelGamesStatistics') }}" class="btn btn-primary  pull-left">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                    @lang('messages.Export')
                </a>
                    
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 25%;">
                    User Logs
                </h2>

                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                    <a class="btn btn-warning  pull-right" onclick="ExportToPNGGameTable();">
                        @lang('messages.Export to PNG')
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
                            <th data-sortable="true">Time</th>
                            <th data-sortable="true">PS ID</th>
                            <th data-sortable="true">Message</th>
                            <th data-sortable="true">User (username)</th>
                            <th data-sortable="true">IP</th>
                        </tr>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->psid }}</td>
                                <td>{{ $log->message }}</td>
                                <td>{{ $log->user_name }}</td>
                                <td>{{ $log->ip }}</td>
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