@include('modals.reset-ps-modal')
@include('modals.terminal-modals')

<div class="row">
     <!--  page header -->
    <div class="col-lg-12" >
        <h1 style="margin-top: 0px;" class="page-header">Terminals</h1>
    </div>
     <!-- end  page header -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
   
                <button class="btn btn-danger btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal">
                    Add Machine
                </button>

                <a href="{{ route('export.terminals') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>
            </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-show-columns="true"
                            data-search="true"
                            data-show-toggle="true"

                            data-show-pagination-switch="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[3, 5, 10, 15]"

                            data-classes="table-condensed"
                    >
                    <thead class="w3-blue-grey">
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
                        @include('modals.terminal-update-modal')
                            <tr>
                                <td>{{ $ps->dallasid }}</td>
                                <td>{{ $ps->psid }}</td>
                                <td>{{ $ps->seatid }}</td>
                                <td>{{ $ps->ps_settings->psdescription }}</td>
                                <td>
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
                                    <span style="color: {{ $ps->ps_status->bonline ? 'green' : 'red' }} ;">
                                            {{ $ps->ps_status->bonline ? 'Online' : 'Offline'}}
                                    </span>
                                </td>
                                <td>{{ $ps->ps_status->ip }}</td>
                                <td>{{ $ps->casino->casinoname }}</td>
                                <td>
                                    <a  href="" role="button" data-toggle="modal"
                                        data-toggle="modal"
                                        data-target="#updateMachineModal-{{ $ps->psid }}"
                                        data-psid="{{ $ps->psid }}"
                                        data-dallasid="{{ $ps->dallasid }}"
                                        data-games="{{ $ps->ps_settings->subscribed }}"
                                    >

                                        <span><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></span>
                                    </a>
                                    <a  href="" role="button" data-toggle="modal"
                                        data-toggle="modal"
                                        data-target="#resetPsModal"
                                        data-psid="{{ $ps->psid }}"
                                        data-dallasid="{{ $ps->dallasid }}"
                                    >
                                    <span><i class="fa fa-retweet fa-lg" aria-hidden="true"></i></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>