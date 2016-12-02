@include('modals.settings.billtype-modals')

<div class="container">
<div class="row">
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addBillModal">
                    Add Billing Type 
                </button>
                <h2 style="display: inline; color: #fff; font-family: 'italic';  padding-left: 6%;">
                    Billing Types
                </h2>
                <a href="{{ url('/settings/exportBillTypes') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover data-table-table"
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
                            <th data-sortable="true">ID Type</th>
                            <th data-sortable="true">Bill Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billtypes as $billtype)
                        <tr>
                            <td>{{ $billtype->idtype }}</td>
                            <td>{{ $billtype->billname }}</td>
                            <td>
                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateBillModal"
                                    data-idtype='{{ $billtype->idtype }}'
                                    data-billname='{{ $billtype->billname }}'
                                    class="btn btn-primary btn-xs"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div> <!--End Panel -->

    </div><!--End Col -->
</div><!--End Row -->
</div><!--End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>