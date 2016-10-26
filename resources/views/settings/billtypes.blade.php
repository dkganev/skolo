@include('modals.billtype-modals')
<div class="container">
<!-- Games -->
<div class="row">
     <!--  page header -->
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Billing Types</h1>
    </div>
     <!-- end  page header -->
</div>
</div>

<div class="container">
<div class="row">
    <div class="col-lg-9">
         <!--    Context Classes  -->
        <div class="panel panel-default">
           
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addBillModal">
                    Add Billing Type 
                </button>

                <a href="{{ url('/settings/exportBillTypes') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>

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
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateBillModal"
                                    data-idtype='{{ $billtype->idtype }}'
                                    data-billname='{{ $billtype->billname }}'
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

    </div>
</div>
</div>
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>
<script src="/js/modals/billtypes.js" type="text/javascript"></script>
