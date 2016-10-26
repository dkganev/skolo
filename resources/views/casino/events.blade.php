<div class="container-full">
<div class="row">
     <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header" style="margin-top: 0px;">Events</h1>
    </div>
     <!-- end  page header -->
</div>

<div class="row">
     <!--  page header -->
    <div class="col-lg-12">

        <div class="panel panel-default">

                <div class="panel-heading">
                    <button class="btn btn-danger btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: hidden">
                        Add Machine
                    </button>
                    <a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>
                </div>

                <div class="panel-body" style="border: 1px solid #d1d1e0; border-radius:5px">
                    <div class="table table-striped table-hover data-table-table">
                        <table  class="table table-striped table-bordered table-hover data-table-table" id="terminals-table" role="grid"
                                data-toggle="table"
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
                        <thead>
                            <tr>
                                <th data-sortable="true">PS ID</th>
                                <th data-sortable="true">Error Code</th>
                                <th data-sortable="true">Error Text</th>
                                <th data-sortable="true">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($errors as $error)
                                <tr>
                                    <td>{{ $error->psid }}</td>
                                    <td>{{ $error->err_code }}</td>
                                    <td>{{ $error->error }}</td>
                                    <td>{{ $error->time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div> <!-- End Body-->
        </div> <!-- End Panel-->
    </div>
</div>
</div>
