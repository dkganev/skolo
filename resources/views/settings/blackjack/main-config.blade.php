<div class="container-full">
	<div class="row">
	    <div class="col-lg-12">
	        <h1 style="margin-top: 0px;" class="page-header">Blackjack</h1>
		</div>
	</div><!-- End Row -->
</div><!-- End Container -->

<!-- Blackjack Main Config -->
<div class="container-full">
<div class="row">

<div class="col-lg-5">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h2 class="panel-title text-center" style="color:white;"><strong>Main Config</strong></h2>
	  </div>

	  <div class="panel-body">
		<form action="/settings/blackjack/mainconfig/edit" method="POST" role="form" id="main-config-form">
			{{ csrf_field() }}
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
			</div>
			</div>

		  <div class="panel-footer">
		  	<button id="main-config-btn" type="submit" class="btn btn-warning btn-sm btn-block">Update</button>
		  </div>

	 	</form>
	 </div>

	</div><!-- End Panel -->	
</div><!-- End Col -->

<!-- TABLES -->

<div class="col-lg-7">
	<div class="panel panel-primary">
        <div class="panel-heading">
 			<h2 class="panel-title text-center" style="color:white;"><strong>Tables</strong></h2>
        </div>

            <div class="panel-body">
                <form action="/settings/blackjack/table/edit" method="POST">
                 <table class="table table-bordered">
                    <thead class="w3-blue-grey">
                      <tr>
                        <th>Table</th>
                        <th>Min Bet</th>
                        <th>Max Bet</th>
                        <th>Chip 1</th>
                        <th>Chip 2</th>
                        <th>Chip 3</th>
                        <th>Chip 4</th>
                        <th>Chip 5</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

			            @foreach($tables as $table)
			            <tr id="{{ $table->table_id }}">
			                <td><span class="badge">{{ $table->table_id + 1 }}</span></span></td>
			                <td>
			                    <input name="bet_min" style="height:30px;" class="form-control" value="{{ $table->bet_min }}" type="text">
			                </td>
			                <td>
			                    <input name="bet_max" style="height:30px;" class="form-control" value="{{ $table->bet_max }}" type="text">
			                </td>

			                <td>
			                    <input name="chip1" style="height:30px;" class="form-control" value="{{ $table->chip1 }}" type="text">
			                </td>
			                <td>
			                    <input name="chip2" style="height:30px;" class="form-control" value="{{ $table->chip2 }}" type="text">
			                </td>

			                <td>
			                    <input name="chip3" style="height:30px;" class="form-control" value="{{ $table->chip3 }}" type="text">
			                </td>
			                <td>
			                    <input name="chip4" style="height:30px;" class="form-control" value="{{ $table->chip4 }}" type="text">
			                </td>
			                <td>
			                    <input name="chip5" style="height:30px;" class="form-control" value="{{ $table->chip5 }}" type="text">
			                </td>

			                <td>
			                    <input type="hidden" name="id" value="{{ $table->table_id }}">
			                    <button class="btn btn-primary btn-xs bj-table-button"
			                            type="submit"
			                            data-id="{{ $table->table_id }}"
			                    >
			                        Update
			                    </button>
			                </td>
			            </tr>

			            @endforeach
                    </tbody>
                  </table>

                </form>

            </div> <!--End Panel Body -->
        </div> <!--End Panel -->
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->

<script>
// SEND TABLE EDIT FORM
$('.bj-table-button').on('click', function(event) {
    event.preventDefault();
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-id');

    $.ajax({
        method: 'POST',
        url: '/settings/blackjack/table/edit',
        data: {
            table_id: $('tr#' + id + ' input[name="id"]').val(),
            bet_min: $('tr#' + id + ' input[name="bet_min"]').val(),
            bet_max: $('tr#' + id + ' input[name="bet_max"]').val(),
            chip1: $('tr#' + id + ' input[name="chip1"]').val(),
            chip2: $('tr#' + id + ' input[name="chip2"]').val(),
            chip3: $('tr#' + id + ' input[name="chip3"]').val(),
            chip4: $('tr#' + id + ' input[name="chip4"]').val(),
            chip5: $('tr#' + id + ' input[name="chip5"]').val(),
            _token: token 
        } 
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}');
    });
});

// SEND MAIN CONFIG FORM
$('button#main-config-btn').on('click', function(event) {
    event.preventDefault();
    var token = $('meta[name="csrf-token"]').attr('content');

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