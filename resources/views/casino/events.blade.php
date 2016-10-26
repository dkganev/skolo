<div class="container-full">
<div class="row">
     <!--  page header -->
    <div class="col-lg-12">
        <h2 class="page-header" style="margin-top: 0px;">Events</h2>
    </div>
     <!-- end  page header -->
</div>

<div class="row">
     <!--  page header -->
    <div class="col-lg-12">

        <div class="panel panel-default">

                <div class="panel-heading">
                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>
                </div>

                <div class="panel-body" style="border: 1px solid #d1d1e0; border-radius:5px">
                    <div class="table table-striped table-hover data-table-table">
                        <table  class="table table-striped table-bordered table-hover data-table-table" id="terminals-table" role="grid"
                                data-toggle="table"
                                data-sortable="true"



                                data-pagination="true"
                                data-side-pagination="client"
                                data-page-list="[3, 5, 10, 15]"

                                data-classes="table-condensed"
                        >
                        <thead class="w3-blue-grey">
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
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>