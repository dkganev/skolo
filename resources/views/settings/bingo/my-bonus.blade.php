<div class="container">

<div class="row">
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Bingo - My Bonus</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a class="active" href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

            </ul>
        </div>
	</div><!--End Col -->
</div><!-- End Row -->

<div class="row">
	<div class="col-lg-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ url('/settings/exportBillTypes') }}" class="btn btn-danger btn-sm">
                	<i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export
                </a>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                    data-toggle="table"
                    data-locale="en-US"

                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 5]"

                    data-classes="table-condensed"
                  >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">ID</th>                          
                            <th data-sortable="true">Ticket Cost</th>
                            <th data-sortable="true">Max Ball</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      	@foreach($my_bonus as $bonus)
                        <tr>
                        <form method="POST" action="#">
                            <td><span class="badge">{{ $bonus->id }}</span></td>
                            <td>
								<input style="height:30px;" class="form-control" value="{{ $bonus->ticket_cnt }}" type="text" placeholder="Ticket Count">
                            </td>
                            <td>
								<input style="height:30px;" class="form-control" value="{{ $bonus->max_ball_idx }}" type="text" placeholder="Max Ball">
                            </td>

                            <td>
                                <button type="submit" class="btn btn-warning btn-xs">Update</button>
                            </td>
                        </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

    </div><!--End Col -->
</div><!--End Row -->

</div><!--End Container -->