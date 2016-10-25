<div class="container">
  <div class="row">
      <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Bingo - Max Balls</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li><a class="active" href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container-full">
<div class="row">
<div class="col-lg-12">

<form class="form-inline">

         <!--    Context Classes  -->
        <div class="panel panel-default">
           
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addBillModal">
                    Add New
                </button>

                <a href="{{ url('/settings/exportBillTypes') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export</a>

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
                            <th data-sortable="true">BL. Max Ball</th>
                            <th data-sortable="true">Max Ball</th>
                            <th data-sortable="true">Max Ball</th>
                            <th data-sortable="true">BL. Max Ball</th>
                            <th data-sortable="true">Max Ball</th>
                            <th data-sortable="true">BL. Max Ball</th>
                            <th data-sortable="true"> Ball</th>
                            <th data-sortable="true"> Ball</th>
                            <th data-sortable="true"> Ball</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($jackpot_steps as $steps)
      <tr>
          <td><span class="badge">{{ $steps->id }}</span></td>

          <form action="{{ url('/settings/bingo/maxballs/edit') }}" method="POST">
          
          <input type="hidden" name="id" value="{{ $steps->id }}">

          <td>
            <input style="width:110px; height: 30px;" name="bingo_ticket_cost" value="{{ $steps->bingo_ticket_cost }}" type="text" class="form-control">
          </td>

          <td>
            <input style="width:110px; height: 30px;" name="jackpot_bingo_max_ball" value="{{ $steps->jackpot_bingo_max_ball }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="jackpot_line_max_ball" value="{{ $steps->jackpot_line_max_ball }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="bonus_line_max_ball" value="{{ $steps->bonus_line_max_ball }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="bonus_bingo_max_ball" value="{{ $steps->bonus_bingo_max_ball }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="jackpo_line_ticket_cnt" value="{{ $steps->jackpo_line_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="jackpo_bingo_ticket_cnt" value="{{ $steps->jackpo_bingo_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="bonus_line_ticket_cnt" value="{{ $steps->bonus_line_ticket_cnt }}" type="text" class="form-control">
          </td>
          <td>
            <input style="width:110px; height: 30px;" name="bonus_bingo_ticket_cnt" value="{{ $steps->bonus_bingo_ticket_cnt }}" type="text" class="form-control">
          </td>

          <td>
            <input type="checkbox" {{ $steps->bingo_cost_fixed ? " checked" : "" }}></input>
          </td>
          <td>
              <!-- <button type="submit" class="btn btn-warning btn-xs">Update</button> -->
            <input value="Update" type="submit" name="submit" class="btn btn-warning btn-xs">
          </td>

          </form>
      </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

</form>

</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container Fluid -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>