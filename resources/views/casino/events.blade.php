<div class="container">
<div class="row">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="#" class="btn btn-warning btn-sm">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true">
                    </i>  Export
                </a>
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                    Events
                </h2>
            </div>

        <div id="toolbar" class="form-inline">

            <button id="button" class="btn btn-default">selectPage</button>
            <button id="button2" class="btn btn-default">prevPage</button>
            <button id="button3" class="btn btn-default">nextPage</button>
        </div>

            <div class="panel-body" style="border: 1px solid #d1d1e0; border-radius:5px">
                <table  class="table table-striped table-bordered table-hover data-table-table" id="events-table" role="grid"
                            data-toggle="table"
                            data-sortable="true"
                            data-pagination="true"
                            data-classes="table-condensed"
                            data-url="/api/casino/events"
                    >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-field="psid" data-sortable="true">PS ID</th>
                            <th data-field="err_code" data-sortable="true">Error Code</th>
                            <th data-field="error" data-sortable="true">Error Text</th>
                            <th data-field="time" data-sortable="true">Time</th>
                        </tr>
                    </thead>
                </table>
            </div><!-- End Body-->
        </div><!-- End Panel-->
    </div><!-- End Col-->
</div><!-- End Row-->

</div><!-- End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>
<script>
    var $table = $('#events-table'),
        $page = $('#page'),
        $button = $('#button'),
        $button2 = $('#button2'),
        $button3 = $('#button3');
    $(function () {
        $button.click(function () {
            $table.bootstrapTable('selectPage', +$page.val());
        });
        $button2.click(function () {
            $table.bootstrapTable('prevPage');
        });
        $button3.click(function () {
            $table.bootstrapTable('nextPage');
        });
    });
</script>