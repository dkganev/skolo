<div class="container">
@include('settings.bingo.my-bonus-modals')
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


                 <table class="table table-bordered">
                    <thead class="w3-blue-grey">
                      <tr>
                        <th>ID</th>
                        <th>Ticket Cost</th>
                        <th>Max Ball</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($my_bonus as $bonus)
                        <tr>
                                <td><span class="badge">{{ $bonus->id }}</span></td>

                                <td>
                                    <input disabled name="ticket_cnt" style="height:30px;" class="form-control" value="{{ $bonus->ticket_cnt }}" type="text" placeholder="Ticket Count">
                                </td>
                                <td>
                                    <input disabled name="max_ball_idx" style="height:30px;" class="form-control" value="{{ $bonus->max_ball_idx }}" type="text" placeholder="Max Ball">
                                </td>
                                <td>
                                    <a href="#" 
                                        class="btn btn-danger btn-xs"
                                        role="button" data-toggle="modal"
                                        data-toggle="modal"
                                        data-target="#updateMyBonus"
                                        data-id="{{ $bonus->id }}"
                                        data-ticket-cost="{{ $bonus->ticket_cnt }}"
                                        data-max-ball="{{ $bonus->max_ball_idx }}"
                                    >
                                        Update
                                    </a>
                                </td>

                        </tr>
                    @endforeach

                    </tbody>
                  </table>

            </div> <!--End Panel Body -->
        </div> <!--End Panel -->

    </div><!--End Col -->
</div><!--End Row -->
</div><!--End Container -->
