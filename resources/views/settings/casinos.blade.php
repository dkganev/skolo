@include('modals.casino-modals')

<div class="container">
<div class="row">
     <!--  page header -->
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Casinos</h1>
    </div>
     <!-- end  page header -->
</div>
</div>

<div class="container-full" style="width:70%;">
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
           
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addCasinoModal">
                    Add Casino 
                </button>

                <a href="{{ route('export.casinos') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>

            </div>
            
            <div class="panel-body">
                <table class="table table-striped  table-hover data-table-table"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                  >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Casino ID</th>
                            <th data-sortable="true">Casino Name</th>
                            <th data-sortable="true">Casino Address</th>
                            <th data-sortable="true">Casino GSM</th>
                            <th data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($casinos as $casino)
                        <tr>
                            <td>{{ $casino->casinoid }}</td>
                            <td>{{ $casino->casinoname }}</td>
                            <td>{{ $casino->casinoaddr }}</td>
                            <td>{{ $casino->casinogsm }}</td>
                            <td>
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateCasinoModal"
                                    data-casinoid="{{ $casino->casinoid }}"
                                    data-casinoname="{{ $casino->casinoname }}"
                                    data-casinoaddr="{{ $casino->casinoaddr }}"
                                    data-casinogsm="{{ $casino->casinogsm }}"

                                >
                                    <span><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

    </div> <!--End Col -->
</div> <!--End Row -->
</div>
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>
<script src="/js/modals/casino.js" type="text/javascript"></script>
