<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px;">
		        <ul class="breadcrumb">
	                <li class="active">
	                	<a href="javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}')">@lang('messages.Main Config')</a>
	                </li>

	                <li>
	                	<a href="javascript:ajaxLoad('{{url('/settings/blackjack/tables')}}')">@lang('messages.Tables')</a>
	                </li>

	                <li>
	                	<a href="javascript:ajaxLoad('{{url('/settings/blackjack/accconfig')}}')">@lang('messages.Accounting Config')</a>
	                </li>
		        </ul>
            </div>
  		</div>
    </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
<div class="row">
<div class="col-lg-8">
    <div class="panel panel-default" id="blackjack-main-config-panel">
        <div class="panel-heading">
            <h2 class='text-center' style="display: inline; color: white; font-family: 'italic';  padding-left: 20%;">
                @lang('messages.Main Config')
            </h2>

{{--        <a class="btn btn-warning  btn-sm pull-right" href="/settings/blackjack/mainconfig/export">
                <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>
                @lang('messages.Export')
            </a> --}}

            <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>

            <a class="btn btn-warning btn-sm pull-right" onclick="ExportToPNGBJMainConfig();">
                @lang('messages.Export to PNG')
            </a>
        </div>

	  <div class="panel-body">
		<form action="/settings/blackjack/mainconfig/edit" method="POST" role="form" id="main-config-form">
			<!-- FIRST COLUMN -->
			<div class="col-lg-4">

			    <div class="form-group">
			    	<label style="color: #474747">@lang('messages.Game ID'):</label><br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">#</span>
                                    <input disabled name="game_id" value="{{ $config->game_id }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="color: #474747">@lang('messages.Max Ps'):</label><br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">#</span>
                                    <input name="max_ps_per_game" value="{{ $config->max_ps_per_game }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
                                </div>
                                <label id="max_ps_per_game" style="color: red; display: none; ">@lang('messages.Max Ps must be between 1-2000')</label>
                            </div>

                            <div class="form-group">
                                <label style="color: #474747">@lang('messages.Common Bet Time'):</label><br>
                            	<div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">#</span>
                                    <input name="common_bet_time" value="{{ $config->common_bet_time }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
				</div>
				<label id="common_bet_time" style="color: red; display: none; ">@lang('messages.Common Bet Time must be between 1-600')</label>
                            </div>

                            <div class="form-group">
			    	<label style="color: #474747">@lang('messages.Personal Bet Time'):</label><br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">#</span>
                                    <input name="bj_bet_time" value="{{ $config->bj_bet_time }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
				</div>
				<label id="bj_bet_time" style="color: red; display: none; ">@lang('messages.Personal Bet Time must be between 1-600')</label>
                            </div>

			</div><!-- End Col -->

			<!-- SECOND COLUMN -->
			<div class="col-lg-4">
				<div class="form-group">
					<label style="color: #474747">@lang('messages.Draw Card Time'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="draw_card_time" value="{{ $config->draw_card_time }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Num Card Packs'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="num_card_packs" value="{{ $config->num_card_packs }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Removed Cards Min'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="removed_cards_min" value="{{ $config->removed_cards_min }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Removed Cards Max'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="removed_cards_max" value="{{ $config->removed_cards_max }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Shuffle Cards Min'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_cards_min" value="{{ $config->shuffle_cards_min }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->

			<!-- THIRD COLUMN -->
			<div class="col-lg-4">
				<div class="form-group">
					<label style="color: #474747">@lang('messages.Shuffle Cards Max'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_cards_max" value="{{ $config->shuffle_cards_max }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Win Pause'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="win_pause" value="{{ $config->win_pause }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

				<div class="form-group" >
					<label for="insurance_on">@lang('messages.Insurance On'):</label><br>
					    <select name="insurance_on" id="insurance_on" class="selectpicker" data-actions-box="true">
					        <option value="7" {{ $config->insurance_on  == 7 ? ' selected="true"' : '' }} >
					            7
					        </option>
					        <option value="11" {{ $config->insurance_on  == 11 ? ' selected="true"' : '' }} >
                                                    A
						</option>
                                            </select>
				</div>

				<div class="form-group">
			    	<label style="color: #474747">@lang('messages.Shuffle Timeout'):</label><br>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">#</span>
						<input name="shuffle_timeout" value="{{ $config->shuffle_timeout }}" type="text" class="form-control text-center" aria-describedby="sizing-addon2">
					</div>
				</div>

			</div><!-- End Col -->

			<div class="row">
			<div class="col-md-12">
				<div class="form-group">

                                    <span class="button-checkbox col-lg-3" style="padding: 0 0 0 15px ;">
					<input type="hidden" name="shuffle_on_each_game" value="false">
				        <button type="button" class="btn col-lg-12" data-color="danger">@lang('messages.Shuffle On Each Game')</button>
				        <input type="checkbox" name="shuffle_on_each_game" class="hidden" {{ $config->shuffle_on_each_game ? " checked" : "" }}  />
                                    </span>

                                    <span class="button-checkbox col-lg-3" style="padding: 0 0 0 15px ;">
					<input type="hidden" name="allow_split_aces" value="false">
				        <button type="button" class="btn col-lg-12" data-color="danger">@lang('messages.Allow Split Aces')</button>
				        <input type="checkbox" name="allow_split_aces" class="hidden" {{ $config->allow_split_aces ? " checked" : "" }} />
                                    </span>

                                    <span class="button-checkbox col-lg-3" style="padding: 0 0 0 15px;">
					<input type="hidden" name="double_after_split" value="false">
				        <button type="button" class="btn col-lg-12" data-color="danger">@lang('messages.Double After Split')</button>
				        <input type="checkbox" name="double_after_split" class="hidden" {{ $config->double_after_split ? " checked" : "" }}  />
                                    </span>

                                    <span class="button-checkbox col-lg-3" style="padding: 0 0 0 15px;">
					<input type="hidden" name="surrender" value="false">
				        <button type="button" class="btn col-lg-12" data-color="danger">@lang('messages.Surrender1')</button>
				        <input type="checkbox" name="surrender" class="hidden" {{ $config->surrender ? " checked" : "" }} />
                                    </span>

				</div>
			</div><!-- End Col -->
			</div><!-- End Row -->

			<hr style="margin: 15px 0 15px 0">
			<div class="pull-right" style="width: 400px;">
				{{ csrf_field() }}
				<button id="main-config-btn" type="submit" class="btn btn-danger btn-sm btn-block" data-success="2">
                                    <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                    <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                    @lang('messages.Update')
                                </button>
			</div>

	 	</form>
	 </div><!-- End Panel Body-->	

	</div><!-- End Panel -->	
</div><!-- End Col -->

</div><!-- End Row -->
</div><!-- End Container -->

<script>
// SEND MAIN CONFIG FORM
updateSuccess = $('button#main-config-btn').attr('data-success');
if (updateSuccess == 1){
    $('#OK').show();
    sortTimer123 = setTimeout(function(){ $('#OK').hide(); }, 10000);
}else if (updateSuccess == 2){
    $('#remove').show();
    sortTimer123 = setTimeout(function(){ $('#remove').hide(); }, 10000);
}else{
    //sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
}    
$('button#main-config-btn').on('click', function(event) {
    event.preventDefault();
    var dataValid = 0;
    var data123 = $('form#main-config-form').serializeArray();
    var dataAray = [0] ;
    $.each(data123, function(i, field){
        dataAray[field.name] = field.value;
        //$("#results").append(field.name + ":" + field.value + " ");
    });
    console.log( dataAray);
    dataValid = 0;
    if (dataAray['max_ps_per_game'] < 1 || dataAray['max_ps_per_game'] > 2000){
        $('#max_ps_per_game').show();
        dataValid = 1;
    }else{
        $('#max_ps_per_game').hide();
    }
    if (dataAray['common_bet_time'] < 10 || dataAray['common_bet_time'] > 600){
        $('#common_bet_time').show();
        dataValid = 1;
    }else{
        $('#common_bet_time').hide();
    }
    if (dataAray['bj_bet_time'] < 10 || dataAray['bj_bet_time'] > 600){
        $('#bj_bet_time').show();
        dataValid = 1;
    }else{
        $('#bj_bet_time').hide();
    }
    
    
    if (dataValid == 0){ 
    /*$.ajax({
        method: 'POST',
        url: '/settings/blackjack/mainconfig/edit',
        data: {'boxID': boxID, 'rowUnique': rowUnique, _token: token},
        //data: $('form#main-config-form').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/blackjack/mainconfig')}}');
    });
    */
    $('#OK').show();
    sortTimer123 = setTimeout(function(){ $('#OK').hide(); }, 10000);
    }else{
        $('#remove').show();
        sortTimer123 = setTimeout(function(){ $('#remove').hide(); }, 10000);
    }
});

// CHANGE VALUE ON CHECKBOX ON CHANGE T/F
$('input[type="checkbox"]').change(function(){
     cb = $(this);
     cb.val(cb.prop('checked'));
 });
</script>

<!-- Plugin for Boostrap Checkbox -->
<script>
  $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
<script>
    function ExportToPNGBJMainConfig() {
    html2canvas($('#blackjack-main-config-panel'), {
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