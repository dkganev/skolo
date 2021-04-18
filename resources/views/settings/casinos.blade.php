@include('modals.casino-modals')

<div class="container">
<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addCasinoModal">
                    @lang('messages.Add') 
                </button>
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 27%;">
                    @lang('messages.Casinos')
                </h2>
                <a href="{{ route('export.casinos') }}" class="btn btn-warning btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  
                    @lang('messages.Export')
                </a>
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
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">@lang('messages.Casino Name')</th>
                            <th data-sortable="true">@lang('messages.Casino Address')</th>
                            <th data-sortable="true">@lang('messages.Casino GSM')</th>
                            <th data-sortable="true">@lang('messages.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($casinos as $casino)
                        <tr class="tr-class">
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
                                    class="btn btn-primary btn-xs"
                                >
                                    @lang('messages.Edit')
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div><!--End Col -->
</div><!--End Row -->
</div><!--End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>