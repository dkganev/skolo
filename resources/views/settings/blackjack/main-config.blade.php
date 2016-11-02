<div class="container">
  <div class="row">
      <div class="col-lg-6">
        <h1 style="margin-top: 0px;" class="page-header">Blackjack - Main Config</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}')">Main Config</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/blackjack/tables')}}')">Tables</a></li>

            </ul>
        </div>
  	</div>
  </div><!-- End Row -->
</div><!-- End Container-->

<!-- Blackjack Main Config -->
<div class="container">
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-primary">

	  <div class="panel-heading">
	    <h2 class="panel-title text-center" style="color:white;"><strong>Main Config</strong></h2>
	  </div>

	  <div class="panel-body">
		<form action="/settings/blackjack/mainconfig/edit" method="POST" role="form" id="main-config-form">
			<!-- FIRST COLUMN -->
			<div class="col-lg-4">

				    <div class="form-group">
				    	<label style="color: #474747">Game ID:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">#</span>
							<input disabled name="game_id" value="{{ $config->game_id }}" type="text" class="form-control" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Max Ps:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">#</span>
							<input name="max_ps_per_game" value="{{ $config->max_ps_per_game }}" type="text" class="form-control" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Keep Alive Time:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
							<input name="keepalive_time" value="{{ $config->keepalive_time }}" type="text" class="form-control" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">Common Bet Time:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
							<input name="common_bet_time" value="{{ $config->common_bet_time }}" type="text" class="form-control" aria-describedby="sizing-addon2">
						</div>
					</div>

					<div class="form-group">
				    	<label style="color: #474747">BJ Bet Time:</label><br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
							<input name="bj_bet_time" value="{{ $config->bj_bet_time }}" type="text" class="form-control" aria-describedby="sizing-addon2">
						</div>
					</div>

			</div><!-- End Col -->

			<!-- SECOND COLUMN -->
			<div class="col-lg-4">
				<div class="form-group">
					<label style="color: #474747">Draw Card Time:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="draw_card_time" value="{{ $config->draw_card_time }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Num Card Packs:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="num_card_packs" value="{{ $config->num_card_packs }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Removed Cards Min:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="removed_cards_min" value="{{ $config->removed_cards_min }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Removed Cards Max:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="removed_cards_max" value="{{ $config->removed_cards_max }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Shuffle Cards Min:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_cards_min" value="{{ $config->shuffle_cards_min }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->

			<!-- THIRD COLUMN -->
			<div class="col-lg-4">
				<div class="form-group">
					<label style="color: #474747">Shuffle Cards Max:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_cards_max" value="{{ $config->shuffle_cards_max }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Win Pause:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="win_pause" value="{{ $config->win_pause }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Keep Alive Acc:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="keepalive_acc" value="{{ $config->keepalive_acc }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Insurance On:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="insurance_on" value="{{ $config->insurance_on }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">Shuffle Timeout:</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_timeout" value="{{ $config->shuffle_timeout }}" type="text" class="form-control" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->

			<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Shuffle On Each Game:</label>
					<input type="hidden" name="shuffle_on_each_game" value="false">
					<input name="shuffle_on_each_game" type="checkbox" {{ $config->shuffle_on_each_game ? " checked" : "" }} >


					<label>Allow Split Aces:</label>
					<input type="hidden" name="allow_split_aces" value="false">
					<input name="allow_split_aces" type="checkbox" {{ $config->allow_split_aces ? " checked" : "" }} >
				</div>
			</div><!-- End Col -->
			</div><!-- End Row -->
			<hr>
			<div class="pull-right" style="width: 400px;">
				{{ csrf_field() }}
				<button id="main-config-btn" type="submit" class="btn btn-warning btn-sm btn-block">Update</button>
			</div>

	 	</form>
	 </div><!-- End Panel Body-->	

	</div><!-- End Panel -->	
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->

<script>
// SEND MAIN CONFIG FORM
$('button#main-config-btn').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/mainconfig/edit',
        data: $('form#main-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}');
    });
});

// CHANGE VALUE ON CHECKBOX ON CHANGE T/F
$('input[type="checkbox"]').change(function(){
     cb = $(this);
     cb.val(cb.prop('checked'));
 });
</script>