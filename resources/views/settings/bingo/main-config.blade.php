<div class="container">
<div class="row">
    <div class="col-lg-4">
        <h1 style="margin-top: 0px;" class="page-header">Bingo - Main Confing</h1>
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

<!-- Bingo Main Conf Panel -->
<div class="row">
	<div class="col-lg-12">

		  <!-- SETTINGS -->
		  <div class="well">

		  	<div class="row">

				<div class="col-lg-4">
					<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Settings</h3>
					<hr style="margin-top: 7px;">
				    <div class="form-group">
				    	<label style="color: #474747">Ticket Cost:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">$</span>
							<input value="{{ $bingo->bingo_ticket_cost }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Cost Line 1:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">$</span>
							<input value="{{ $bingo->bingo_cost_line1 }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
					    <label style="color: #474747">Cost Line 2:</label><br>
						<div class="input-group">
								<span class="input-group-addon" id="sizing-addon2">$</span>
								<input value="{{ $bingo->bingo_cost_line2 }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
					    <label style="color: #474747">Cost Bingo:</label><br>
						<div class="input-group">
								<span class="input-group-addon" id="sizing-addon2">$</span>
								<input value="{{ $bingo->bingo_cost_bingo }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

				</div>

				<!-- VISIBLE -->
				<div class="col-lg-4">
					<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Vissible</h3>
					<hr style="margin-top: 7px;">

					<div class="form-group">
				    	<label style="color: #474747">Jackpot Bingo:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->jackpot_bingo_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

				    <div class="form-group">
				    	<label style="color: #474747">Jackpot Line:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->jackpot_line_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Bonus Line:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_line_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Bonus GLine:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_gline_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Bonus:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_gline_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">My Bonus:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->mybonus_pr_visible }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

				</div>

				<!-- HIDDEN -->
				<div class="col-lg-4">
					<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Hidden</h3>
					<hr style="margin-top: 7px;">

				    <div class="form-group">
				    	<label style="color: #474747">Jackpot Bingo Pr:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->jackpot_bingo_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
						<label style="color: #474747">Jackpot Line:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->jackpot_line_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
						<label style="color: #474747">Bonus Line:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_line_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
						<label style="color: #474747">Bonus GLine:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_gline_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Bonus:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->bonus_bingo_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">My Bonus:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">%</span>
							<input value="{{ $bingo->mybonus_pr_hidden }}" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
						</div>
					</div>
				</div>

			</div>


		  	<button style="width:200px; margin: 5px;" class="btn btn-warning">Update</button>


		</div><!-- End Well -->
	</div><!-- End Col -->
</div><!-- End Row -->
</div><!-- End Container -->
