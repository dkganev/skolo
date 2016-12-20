<div class="container">
	<div class="row">
	    <div class="col-md-8">
	        {{-- <h1 style="margin-top: 0px;" class="page-header"></h1> --}}
	        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
	            <!-- Secondary Navigation -->
	            <ul class="breadcrumb secondary-breadcrumb">
	              <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">Main Config</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">My Bonus</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">Max Balls</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">Sphere Config</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">Accounting Config</a></li>
	            </ul>
	        </div>
		</div>
	</div><!-- End Row -->
</div><!-- End Container -->

<!-- Bingo Main Conf Panel -->
<div class="container">
<div class="row">
<div class="col-md-10">

<div class="panel panel-default" id="bingo-main-config-panel">
  	<div class="panel-heading clearfix">
{{--         <a class="btn btn-primary pull-left" href="/settings/bingo/main-config-export">
            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Export
        </a> --}}

        <h2 class='text-center' style="display: inline; color: #fff; font-family: 'italic';  padding-left: 35%;">
             Main Config
        </h2>

	    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
	    <a class="btn btn-warning pull-right" onclick="ExportToPNGMainConfig();">
	        Export to PNG
	    </a>
  	</div>

  <div class="panel-body">
	
	<form action="/settings/bingo/mainconfig/edit" method="POST" role="form" id="bingo-main-config">
		{{ csrf_field() }}

		<!-- SETIINGS -->
		<div class="col-md-2">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Settings</h3>
			<hr style="margin-top: 7px;">

		    <div class="form-group">
		    	<label style="color: #474747">Ticket Cost(cents):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">$</span>
					<input name="bingo_ticket_cost" value="{{ $bingo->bingo_ticket_cost }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">Bingo:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">%</span>
					<input name="bingo_win_pr" value="{{ $bingo->bingo_win_pr }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">Line:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">%</span>
					<input name="bingo_line_pr" value="{{ $bingo->bingo_line_pr }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">URL:</label><br>
				<input style="width: 130px;" name="url" value="{{ $bingo->url }}" type="text" class="form-control text-center" placeholder="URL">
			</div>
		</div><!-- End Col -->

		<!-- VISIBLE -->
		<div class="col-md-2">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Vissible</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">My Bonus:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_visible" value="{{ $bingo->mybonus_pr_visible }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_visible" value="{{ $bingo->bonus_line_pr_visible }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_visible" value="{{ $bingo->bonus_bingo_pr_visible }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_visible" value="{{ $bingo->jackpot_line_pr_visible }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_visible" value="{{ $bingo->jackpot_bingo_pr_visible }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div><!-- End Col -->


		<!-- HIDDEN -->
		<div class="col-md-2">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Hidden</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">My Bonus:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_hidden" value="{{ $bingo->mybonus_pr_hidden }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_hidden" value="{{ $bingo->bonus_bingo_pr_hidden }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Bonus Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_hidden" value="{{ $bingo->bonus_line_pr_hidden }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">Jackpot Line:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_hidden" value="{{ $bingo->jackpot_line_pr_hidden }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Jackpot Bingo:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_hidden" value="{{ $bingo->jackpot_bingo_pr_hidden }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div><!-- End Col -->

		<!-- Max Ball Defaults -->
		<h3 style="margin: 0; position: relative; left: 124px; ;color: #474747; font-family: sans-serif; font-size: 21px;">
			Max Ball Defaults
		</h3>

		<hr style="margin-top: 7px; width: 420px;padding: 0;">

		<div class="col-md-3">
	
			<div class="form-group">
		    	<label style="color: #474747">Jackpot Bingo Max Ball:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="jackpot_bingo_max_ball" value="{{ $bingo->jackpot_bingo_max_ball }}" type="text" class="form-control text-center" placeholder="Jackpot Bingo Max Ball" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">Jackpot Line Max Ball:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="jackpot_line_max_ball" value="{{ $bingo->jackpot_line_max_ball }}" type="text" class="form-control text-center" placeholder="Jackport Line MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
				<label style="color: #474747">Bonus Line Max Ball:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="bonus_line_max_ball" value="{{ $bingo->bonus_line_max_ball }}" type="text" class="form-control text-center" placeholder="Bonus Line MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">Bonus Bingo Max Ball:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="bonus_bingo_max_ball" value="{{ $bingo->bonus_bingo_max_ball }}" type="text" class="form-control text-center" placeholder="Bonus Bingo MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">My Bonus Max Ball:</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="mybonus_max_ball" value="{{ $bingo->mybonus_max_ball }}" type="text" class="form-control text-center" placeholder="My Bonus MB" aria-describedby="sizing-addon2">
				</div>
			</div>

		</div><!-- End Col -->

		</div><!-- End Panel Body-->
		<div class="panel-footer">
			<button id="cancel-game" type="submit" style="width:300px; margin-left: 17px;" class="btn btn-primary">
				Cancel Bingo Game
			</button>

			<button id="bingo-main-config-sbt" type="submit" style="width:300px; margin-left: 17px;" class="btn btn-danger pull-right">
				Update
			</button>

		</div><!-- End Panel Footer-->
	</form>
	</div>
</div><!-- End Col-->
</div><!-- End Row -->
</div><!-- End Container -->

<script>
	$('button#bingo-main-config-sbt').on('click', function(event) {
	    event.preventDefault();
	    
	    $.ajax({
	        method: 'POST',
	        url: '/settings/bingo/mainconfig/edit',
	        data: $('form#bingo-main-config').serialize(),
	    }).done(function () {
         	javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')
	    })
	})

   	$('button#cancel-game').on('click', function(event) {
	    event.preventDefault();
	    var token = $('meta[name="csrf-token"]').attr('content');
	    $.ajax({
	        method: 'POST',
	        url: '/settings/bingo/mainconfig/cancel-game',
	        data: { _token: token },
		    success: function() {
	            $('.cancel-game').delay(50).fadeIn(function() {
	              $(this).delay(1500).fadeOut()
	            })
	        },
	        error: function (error) {
	            console.log("Error " + error);
	        }
	    })
	})
</script>
<script>
	function ExportToPNGMainConfig() {
    html2canvas($('#bingo-main-config-panel'), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            //document.body.appendChild(canvas);
            $(".faSpinner").show();
            // Convert and download as image 
            Canvas2Image.saveAsPNG(canvas); 
            //document.body.append(canvas);
            // Clean up 
            //document.body.removeChild(canvas);
            $(".faSpinner").hide();
        }
    });
}
</script>

<style>

</style>