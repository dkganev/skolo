<div class="container">
	<div class="row">
	    <div class="col-lg-5">
	        <h1 style="margin-top: 0px;" class="page-header">Bingo - Main Confing</h1>
	        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
	            <!-- Secondary Navigation -->
	            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

	              <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">Sphere Config</a></li>
	            </ul>
	        </div>
		</div>
	</div><!-- End Row -->
</div><!-- End Container -->

<!-- Bingo Main Conf Panel -->
<div class="container">
<div class="row">
<div class="col-lg-12">

<!-- SETTINGS -->
<div class="well" style="background: #ffffff;">
	<div class="row">

	<form action="/settings/bingo/mainconfig/edit" method="POST" role="form" id="bingo-main-config">
		{{ csrf_field() }}
		<!-- SETIINGS -->
		<div class="col-lg-4">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Settings</h3>
			<hr style="margin-top: 7px;">

			    <div class="form-group">
			    	<label style="color: #474747">Ticket Cost:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">$</span>
						<input name="bingo_ticket_cost" value="{{ $bingo->bingo_ticket_cost }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bingo_win_pr" value="{{ $bingo->bingo_win_pr }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2"><strong>%</strong></span>
						<input name="bingo_line_pr" value="{{ $bingo->bingo_line_pr }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">URL:</label><br>
					<input name="url" value="{{ $bingo->url }}" type="text" class="form-control" placeholder="URL">
				</div>

		</div><!-- End Col -->

		<!-- VISIBLE -->
		<div class="col-lg-4">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Vissible</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">My Bonus:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_visible" value="{{ $bingo->mybonus_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_visible" value="{{ $bingo->bonus_line_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_visible" value="{{ $bingo->bonus_bingo_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_visible" value="{{ $bingo->jackpot_line_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_visible" value="{{ $bingo->jackpot_bingo_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

		</div><!-- End Col -->


	<!-- HIDDEN -->

		<div class="col-lg-4">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Hidden</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">My Bonus:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_hidden" value="{{ $bingo->mybonus_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_hidden" value="{{ $bingo->bonus_line_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_hidden" value="{{ $bingo->bonus_bingo_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">Jackpot Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_hidden" value="{{ $bingo->jackpot_line_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_hidden" value="{{ $bingo->jackpot_bingo_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->

			<button id="bingo-main-config-sbt" type="submit" style="width:315px; margin-left: 17px;" class="btn btn-danger">Update</button>
			</form>


</div><!-- End Row -->
</div><!-- End Well -->


</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container -->

<script>
	$('button#bingo-main-config-sbt').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/bingo/mainconfig/edit',
        data: $('form#bingo-main-config').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}');
    });
});
</script>