<div class="container">
	<div class="row">
	    <div class="col-md-12">
	        {{-- <h1 style="margin-top: 0px;" class="page-header"></h1> --}}
	        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
	            <!-- Secondary Navigation -->
	            <ul class="breadcrumb secondary-breadcrumb">
	              <li class="active" ><a href="javascript:ajaxLoad('{{url('/settings/bingo/mainconfig')}}')">@lang('messages.Main Config')</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}')">@lang('messages.My Bonus')</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')">@lang('messages.Max Balls')</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/sphereconfig')}}')">@lang('messages.Sphere Config')</a></li>

	              <li><a href="javascript:ajaxLoad('{{url('/settings/bingo/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
	            </ul>
	        </div>
		</div>
	</div><!-- End Row -->
</div><!-- End Container -->

<!-- Bingo Main Conf Panel -->
<div class="container">
<div class="row">
<div class="col-md-11">

<div class="panel panel-default" id="bingo-main-config-panel">
  	<div class="panel-heading clearfix">
{{--         <a class="btn btn-primary pull-left" href="/settings/bingo/main-config-export">
            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;
                @lang('messages.Export')
        </a> --}}

        <h2 class='text-center' style="display: inline; color: #fff; font-family: 'italic';  padding-left: 35%;">
             @lang('messages.Main Config')
        </h2>

	    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
	    <a class="btn btn-warning pull-right" onclick="ExportToPNGMainConfig();">
	        @lang('messages.Export to PNG')
	    </a>
  	</div>

  <div class="panel-body">
	
	<form action="/settings/bingo/mainconfig/edit" method="POST" role="form" id="bingo-main-config">
		{{ csrf_field() }}

		<!-- SETIINGS -->
		<div class="col-md-3">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">@lang('messages.Settings')</h3>
			<hr style="margin-top: 7px;">

		    <div class="form-group">
		    	<label style="color: #474747">@lang('messages.Ticket Cost') (@lang('messages.cents')):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">$</span>
					<input name="bingo_ticket_cost" value="{{ $bingo->bingo_ticket_cost }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.Line'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">%</span>
					<input name="bingo_line_pr" value="{{ $bingo->bingo_line_pr * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.Bingo'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">%</span>
					<input name="bingo_win_pr" value="{{ $bingo->bingo_win_pr * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.URL'):</label><br>
				<input name="url" value="{{ $bingo->url }}" type="text" class="form-control text-center" placeholder="URL">
			</div>
                        
                        <div class="form-group">
		    	<label style="color: #474747">@lang('messages.Bet Time'):</label><br>
				<input name="bingo_bet_time_val" value="{{ $bingo->bingo_bet_time_val }}" type="text" class="form-control text-center" placeholder="URL">
			</div>
                        <div class="form-group">
		    	<label style="color: #474747">@lang('messages.Draw Ball Interval'):</label><br>
				<input name="draw_ball_time" value="{{ $bingo->draw_ball_time }}" type="text" class="form-control text-center" placeholder="URL">
			</div>
		</div><!-- End Col -->

		<!-- VISIBLE -->
		<div class="col-md-2">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">@lang('messages.Vissible')</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">@lang('messages.My Bonus'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_visible" value="{{ $bingo->mybonus_pr_visible * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Bonus Line'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_visible" value="{{ $bingo->bonus_line_pr_visible * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Bonus Bingo'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_visible" value="{{ $bingo->bonus_bingo_pr_visible * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Jackpot Line'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_visible" value="{{ $bingo->jackpot_line_pr_visible * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Jackpot Bingo'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_visible" value="{{ $bingo->jackpot_bingo_pr_visible * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div><!-- End Col -->


		<!-- HIDDEN -->
		<div class="col-md-2">
			<h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">@lang('messages.Hidden')</h3>
			<hr style="margin-top: 7px;">

				<div class="form-group">
					<label style="color: #474747">@lang('messages.My Bonus'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="mybonus_pr_hidden" value="{{ $bingo->mybonus_pr_hidden * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>
				
				<div class="form-group">
					<label style="color: #474747">@lang('messages.Bonus Line'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_line_pr_hidden" value="{{ $bingo->bonus_line_pr_hidden * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Bonus Bingo'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="bonus_bingo_pr_hidden" value="{{ $bingo->bonus_bingo_pr_hidden * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Jackpot Line'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_line_pr_hidden" value="{{ $bingo->jackpot_line_pr_hidden * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
					<label style="color: #474747">@lang('messages.Jackpot Bingo'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input name="jackpot_bingo_pr_hidden" value="{{ $bingo->jackpot_bingo_pr_hidden * 100 }}" type="text" class="form-control text-center" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
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
		    	<label style="color: #474747">@lang('messages.My Bonus Max Ball'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="mybonus_max_ball" value="{{ $bingo->mybonus_max_ball }}" type="text" class="form-control text-center" placeholder="My Bonus MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
				<label style="color: #474747">@lang('messages.Bonus Line Max Ball'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="bonus_line_max_ball" value="{{ $bingo->bonus_line_max_ball }}" type="text" class="form-control text-center" placeholder="Bonus Line MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.Bonus Bingo Max Ball'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="bonus_bingo_max_ball" value="{{ $bingo->bonus_bingo_max_ball }}" type="text" class="form-control text-center" placeholder="Bonus Bingo MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.Jackpot Line Max Ball'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="jackpot_line_max_ball" value="{{ $bingo->jackpot_line_max_ball }}" type="text" class="form-control text-center" placeholder="Jackport Line MB" aria-describedby="sizing-addon2">
				</div>
			</div>

			<div class="form-group">
		    	<label style="color: #474747">@lang('messages.Jackpot Bingo Max Ball'):</label><br>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">#</span>
					<input name="jackpot_bingo_max_ball" value="{{ $bingo->jackpot_bingo_max_ball }}" type="text" class="form-control text-center" placeholder="Jackpot Bingo Max Ball" aria-describedby="sizing-addon2">
				</div>
			</div>

		</div><!-- End Col -->

		</div><!-- End Panel Body-->

		<hr>

		<div class="row">


			<div class="col-md-3">
				<div class="form-group" style="margin-left: 15px;">
			    	<label style="color: #474747">@lang('messages.Bngo + Line Total'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input disabled name="bingo_line_total" value="{{ $bingo_line_total }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Visible Total'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input disabled name="visible_total" value="{{ $bingo_visible_total }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Hidden Total'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input disabled name="hidden_total" value="{{ $bingo_hidden_total }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group" style="margin-right: 15px;">
			    	<label style="color: #474747">@lang('messages.Visible + Hidden Total'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input disabled name="visible_hidden_total" value="{{ $bingo_visible_hidden_total }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>
			</div>

		</div>


		<div class="panel-footer">
			<button id="cancel-game" type="submit" style="width:300px; margin-left: 17px;" class="btn btn-primary">
				@lang('messages.Cancel Bingo Game')
			</button>

			<button id="bingo-main-config-sbt" type="submit" style="width:300px; margin-left: 17px;" class="btn btn-danger pull-right">
				@lang('messages.Update')
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