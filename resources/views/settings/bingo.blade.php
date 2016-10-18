<!-- Games -->
<div class="row">
     <!--  page header -->
    <div class="col-lg-12">
        <h1 style="margin-top: 0px;" class="page-header">Bingo</h1>
    </div>
     <!-- end  page header -->
</div>

<!-- Bingo Main Conf Panel -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">

		  <div  class="panel-heading">
		    <h3 class="panel-title text-center">Main Configurations</h3>
		  </div>

		  <!-- SETTINGS -->
		  <div class="panel-body">

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

		  </div><!-- End Panel Body -->

		<div class="panel-footer">
			<!-- Rounded switch -->
			<label class="switch">
			  <input id="locker" type="checkbox" name="lock">
			  <div class="slider round"></div>
			</label>

		</div>

		</div><!-- End Panel -->
	</div><!-- End Col -->
</div><!-- End Row -->

<script>
	$('#locker').click(function() {
	    $("#locker").toggle(this.checked);
	});

	$('input[type=checkbox]').change(function(){
	    if(this.checked) {
	        $('input').prop('disabled', true);
	    } else {
	        $('input').prop('disabled', false);
	    }
	});

</script>

<style>
	/* The switch - the box around the slider */
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {display:none;}

	/* The slider */
	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #b30000;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>
