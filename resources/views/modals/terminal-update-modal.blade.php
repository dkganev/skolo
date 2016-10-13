

<div class="row">
<div class="modal fade" id="updateMachineModal-{{ $ps->psid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>+ Update Machine</strong></h2>
      </div>
      
      <div class="modal-body">

          <form class="form-horizontal update-machine bootstrap-modal-form" id="{{ $ps->psid }}"> 

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="dallasid">Machine ID:</label><br>
                <input class="form-control" type="text" name="dallasid" id="dallasid" value="{{ $ps->dallasid }}">
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="seatid">Seat ID: </label><br>
                <input class="form-control" type="text" name="seatid" id="seatid" value="{{ $ps->seatid }}">
            </div>
            <hr>
            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="psdescription">Description: </label><br>
                <input class="form-control" type="text" name="psdescription" id="psdescription" value="{{ $ps->ps_settings['psdescription'] }}">
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="psid">Unique ID: </label><br>
                <input disabled class="form-control" type="text" name="psid" id="psid" value="{{ $ps->psid }}">
            </div>
            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="ps_type">PS Type: </label><br>
              <select name="ps_type" class="form-control selectpicker" id="ps_type">
                <option disabled="disabled">Choose Type</option>

                <option value="0" {{ $ps->ps_settings->ps_type == 0 ? 'selected="true"' : '' }}>PlayStation</option>
                <option value="1" {{ $ps->ps_settings->ps_type == 1 ? 'selected="true"' : '' }}>Statistics</option>
                <option value="2" {{ $ps->ps_settings->ps_type == 2 ? 'selected="true"' : '' }}>Sphere</option>
                <option value="3" {{ $ps->ps_settings->ps_type == 3 ? 'selected="true"' : '' }}>Balls</option>
                <option value="4" {{ $ps->ps_settings->ps_type == 4 ? 'selected="true"' : '' }}>Wheel</option>
                <option value="5" {{ $ps->ps_settings->ps_type == 5 ? 'selected="true"' : '' }}>Statistic RLT</option>
                <option value="6" {{ $ps->ps_settings->ps_type == 6 ? 'selected="true"' : '' }}>Jackpot Statistic</option>
              </select>
            </div>
            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="games">Games</label><br>
              <select name="games[]" id="games" class="form-control selectpicker" multiple data-selected-text-format="count > 3" title="Update games..." data-actions-box="true">
              
              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}"

                  {{ (in_array($clientgameid->client_game_id, $ps->ps_settings->getGames() )) ? ' selected="true"' : '' }}
                              
                >{{ $clientgameid->client_game_name }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="default_game">Default Game</label><br>
              <select name="default_game" id="default_game" class="selectpicker" title="Choose default game..." data-actions-box="true">

              <option value="0" {{ $ps->ps_settings->default_game == 0 ? ' selected="true"' : '' }}
              
              >None</option>

              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}"

                  {{ $clientgameid->client_game_id == $ps->ps_settings->default_game  ? ' selected="true"' : '' }} 

                >{{ $clientgameid->client_game_name }}</option>
              @endforeach
              </select>
            </div>

        </form>
      </div>
      <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="machine-update-{{ $ps->psid }}" type="submit" class="btn btn-primary machine-update" form="modal-form">Update</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$(function() {
  $('#machine-update-{{ $ps->psid }}').on('click', function() {
     $.ajax({
       method: 'POST',
       url: '{{ url('machine/update') }}',
       data: { 
         psdescription: $('#updateMachineModal-{{ $ps->psid }} input[name="psdescription"]').val() ,
         dallasid: $('#updateMachineModal-{{ $ps->psid }} input[name="dallasid"]').val() ,
         seatid: $('#updateMachineModal-{{ $ps->psid }} input[name="seatid"]').val() ,
         ps_type: $('#updateMachineModal-{{ $ps->psid }} select[name="ps_type"]').val() ,
         psid: $('#updateMachineModal-{{ $ps->psid }} input[name="psid"]').val() ,
         games: $('#updateMachineModal-{{ $ps->psid }} select[name="games[]"]').val() ,
         default_game: $('#updateMachineModal-{{ $ps->psid }} select[name="default_game"]').val() ,
         _token: '{{ Session::token() }}'
       }
     }).done(function () {
        $('#updateMachineModal-{{ $ps->psid }}').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();

        javascript:ajaxLoad('{{url('settings/terminals')}}');
     });
  });
}); // => End Ready Function
</script>

