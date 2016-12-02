@include('modals.settings.terminals.terminal-restart-modal')
@include('modals.settings.terminals.terminal-store-modal')
@include('modals.settings.terminals.terminal-delete-modal')

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" >
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
                    <table class="table table-striped table-bordered" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-show-columns="true"
                            data-search="true"
                            data-show-toggle="true"
                            data-classes="table-condensed"
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
                        <tr class="test-class">
                            <td class="text-center">{{ $ps->dallasid }}</td>
                            <td class="text-center">{{ $ps->psid }}</td>
                            <td class="text-center">{{ $ps->seatid }}</td>
                            <td class="text-center">{{ $ps->ps_settings->psdescription }}</td>
                            <td class="text-center">
                                {{  $ps->ps_settings->ps_type === 0 ? "PlayStation" : (
                                    $ps->ps_settings->ps_type === 1 ? "Statistics" : (
                                    $ps->ps_settings->ps_type === 2 ? "Sphere" : (
                                    $ps->ps_settings->ps_type === 3 ? "Balls" : (
                                    $ps->ps_settings->ps_type === 4 ? "Wheel" : (
                                    $ps->ps_settings->ps_type === 5 ? "Statistic RLT" : (
                                    $ps->ps_settings->ps_type === 6 ? "Jackpot Statistic" : 0 ))))))
                                }}
                            </td>
                            <td class="text-center">
                                <span   id='Status{{ $ps->psid }}' 
                                        style="color: {{ $ps->ps_status->bonline ? 'green' : 'red' }} ;"
                                    >
                                        {{ $ps->ps_status->bonline ? 'Online' : 'Offline'}}
                                </span>
                            </td>
                            <td class="text-center">{{ $ps->ps_status->ip }}</td>
                            <td class="text-center">{{ $ps->casino->casinoname }}</td>
                            <td class="text-center">
                                <a  href="#" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateMachineModal-{{ $ps->psid }}"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    data-games="{{ $ps->ps_settings->subscribed }}"
                                    class="btn btn-primary btn-xs"
                                >
                                    Edit
                                </a>
                                <a  role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#resetPsModal"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    class="btn btn-warning btn-xs"
                                >  
                                    Restart
                                </a>

                                <a  role="button" data-toggle="modal"
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

.test-class {
    background-color: #e3e3e3;
}
</style>
