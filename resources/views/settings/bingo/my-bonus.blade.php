<!-- Games -->
<div class="container">
<div class="row">
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Bingo - My Bonus</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

            </ul>
        </div>
	</div>
</div><!-- End Row -->

<div class="row">
	@foreach($my_bonus as $bonus)
	<div class="col-md-3">
		<div class="panel panel-info">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Panel ID {{ $bonus->id }}</div>
		  <div class="panel-body">
			<div class="form-group">
				<label>Ticket Count</label>
				<input class="form-control" value="{{ $bonus->ticket_cnt }}" type="text" placeholder="Ticket Count">
			</div>

			<div class="form-group">
				<label>Max Ball</label>
				<input class="form-control" value="{{ $bonus->max_ball_idx }}" type="text" placeholder="Max Ball">
			</div>
		  </div>
		</div>
	</div>
	@endforeach

	<button style="width:200px; margin: 5px;" class="btn btn-warning">Update</button>

</div>
</div>

