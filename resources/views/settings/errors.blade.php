@include('modals.errors-modals')
<div class="container">
<!-- Games -->
<div class="row">
     <!--  page header -->
    <div class="col-lg-8">
        <h1 style="margin-top: 0px;" class="page-header">Error List</h1>
    </div>

    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Error Levels</h1>
    </div>
     <!-- end  page header -->
</div>

<div class="row">
    <div class="col-lg-8">

        <div class="panel panel-default">
           
            <div class="panel-heading">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addErrorListModal">
                    Add 
                </button>

                <a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>
            </div>
            
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover data-table-table"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                    data-classes="table-condensed"
                    >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Error Code</th>
                            <th data-sortable="true">Error Level</th>
                            <th data-sortable="true">Error Group</th>
                            <th data-sortable="true">Error Text</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($error_list as $err_list)
                        <tr>
                            <td>{{ $err_list->err_code }}</td>
                            <td>{{ $err_list->err_lvl->level_str }}</td>
                            <td>                      
                                {{  $err_list->err_group === 1 ? "NOTE" : (
                                    $err_list->err_group === 2 ? "DOORS" : (
                                    $err_list->err_group === 4 ? "DOORSOFF" : (
                                    $err_list->err_group === 8 ? "ERROR" : (
                                    $err_list->err_group === 16 ? "CR_IN" : (
                                    $err_list->err_group === 32 ? "BILL" : (
                                    $err_list->err_group === 64 ? "HANDPAY" : (
                                    $err_list->err_group === 128 ? "PRGR" : (
                                    $err_list->err_group === 256 ? "VOUCHRIN" : (
                                    $err_list->err_group === 512 ? "VOUCHOUT" : (
                                    $err_list->err_group === 1024 ? "CASHLESSIN" : (
                                    $err_list->err_group === 2048 ? "CASHLESSOUT" : (
                                    $err_list->err_group === 4096 ? "BONUS" : (
                                    $err_list->err_group === 8192 ? "MONEY" : (
                                    $err_list->err_group === 16384 ? "SERVER" : $err_list->err_group ))))))))))))))
                                }}
                            </td>

                            <td>{{ $err_list->err_text }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  <!--End Panel Body -->
        </div>  <!--End Panel -->
    </div>  <!--End Col -->

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>
                
            </div>

            <div class="panel-body">
               <table class="table table-striped table-bordered table-hover data-table-table" id="gameTable" role="grid"
                    data-toggle="table"
                    data-locale="en-US"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  
               >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Error Level Int</th>
                            <th data-sortable="true">Error Level String</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($error_lvls as $error_lvl)
                        <tr>
                            <td>{{ $error_lvl->err_level }}</td>
                            <td>{{ $error_lvl->level_str }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  <!--End Panel Body -->
        </div>  <!--End Panel -->
    </div> <!--End Col -->
</div> <!--End Row -->
</div>
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>
<script src="/js/modals/errors.js" type="text/javascript"></script>