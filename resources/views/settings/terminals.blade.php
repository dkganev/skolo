@include('modals.settings.terminals.terminal-restart-modal')
@include('modals.settings.terminals.terminal-store-modal')
@include('modals.settings.terminals.terminal-delete-modal')

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div id="panel-head" class="panel-heading" >
                <button class="btn btn-danger btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal">
                    Add Machine
                </button>
                
                <h2 style="display: inline; color: #fff; font-family: 'italic';  padding-left: 35%;">
                    Terminals
                </h2>

                <a href="{{ route('export.terminals') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                </a>
            </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered  data-table-table table-hover" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-show-columns="true"
                            data-search="true"
                            data-show-toggle="true"
                            data-classes="table-condensed"
                            data-cell-style
                    >
                    <thead>
                        <tr>
                            <th data-sortable="true">Machine ID</th>
                            <th data-sortable="true">Unique ID</th>
                            <th data-sortable="true">Seat ID</th>
                            <th data-sortable="true">Description</th>
                            <th data-sortable="true">Type</th>
                            <th data-sortable="true">Status</th>
                            <th data-sortable="true">IP Adress</th>
                            <th data-sortable="true">Casino</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($server_ps as $ps)
                        <tr class="active" style="color:black;">
                            <td class="table-data-style text-center">{{ $ps->dallasid }}</td>
                            <td class="table-data-style text-center">{{ $ps->psid }}</td>
                            <td class="table-data-style text-center">{{ $ps->seatid }}</td>
                            <td class="table-data-style text-center">{{ $ps->ps_settings->psdescription }}</td>
                            <td class="table-data-style text-center">
                                {{  $ps->ps_settings->ps_type === 0 ? "PlayStation" : (
                                    $ps->ps_settings->ps_type === 1 ? "Statistics" : (
                                    $ps->ps_settings->ps_type === 2 ? "Sphere" : (
                                    $ps->ps_settings->ps_type === 3 ? "Balls" : (
                                    $ps->ps_settings->ps_type === 4 ? "Wheel" : (
                                    $ps->ps_settings->ps_type === 5 ? "Statistic RLT" : (
                                    $ps->ps_settings->ps_type === 6 ? "Jackpot Statistic" : 0 ))))))
                                }}
                            </td>
                            <td>
                                <span id='Status{{ $ps->psid }}' style="color: {{ $ps->ps_status->bonline ? 'green' : 'red' }} ;">
                                        {{ $ps->ps_status->bonline ? 'Online' : 'Offline'}}
                                </span>
                            </td>
                            <td class="table-data-style text-center">{{ $ps->ps_status->ip }}</td>
                            <td class="table-data-style text-center">{{ $ps->casino->casinoname }}</td>
                            <td class="table-data-style">
                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateMachineModal-{{ $ps->psid }}"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    data-games="{{ $ps->ps_settings->subscribed }}"
                                    class="btn btn-primary btn-xs"
                                >
                                    Edit
                                </a>
                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#resetPsModal"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    class="btn btn-warning btn-xs"
                                >  
                                    Restart
                                </a>

                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#deletePsModal"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    class="btn btn-danger btn-xs"
                                >
                                    Delete
                                </a>

                            </td>
                        </tr>
                    @include('modals.settings.terminals.terminal-update-modal')
                    @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div><!--End Row -->
</div><!--End Container -->

<!-- TABLE -->
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>
<script src="bootstrap-table/bootstrap-table-locale-all.js"></script>
<!-- END TABLE LINKS -->

<script src="/js/socket.io/socket.io.js"></script>
<script src="/js/socket.io/setingsTerminals.js"></script>

<style>
td {
    color:#141516;
}

#panel-head {
    background: rgba(76,76,76,1);
background: -moz-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 46%, rgba(0,0,0,1) 51%, rgba(44,44,44,1) 55%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(76,76,76,1)), color-stop(12%, rgba(89,89,89,1)), color-stop(25%, rgba(102,102,102,1)), color-stop(39%, rgba(71,71,71,1)), color-stop(46%, rgba(44,44,44,1)), color-stop(51%, rgba(0,0,0,1)), color-stop(55%, rgba(44,44,44,1)), color-stop(60%, rgba(17,17,17,1)), color-stop(76%, rgba(43,43,43,1)), color-stop(91%, rgba(28,28,28,1)), color-stop(100%, rgba(19,19,19,1)));
background: -webkit-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 46%, rgba(0,0,0,1) 51%, rgba(44,44,44,1) 55%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -o-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 46%, rgba(0,0,0,1) 51%, rgba(44,44,44,1) 55%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 46%, rgba(0,0,0,1) 51%, rgba(44,44,44,1) 55%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
background: linear-gradient(to bottom, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 46%, rgba(0,0,0,1) 51%, rgba(44,44,44,1) 55%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}


</style>
