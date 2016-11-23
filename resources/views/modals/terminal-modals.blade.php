<!-- Add Machine Modal --> 
<div class="row">
<div class="modal fade" id="addMachineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>+ Add Machine</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline new-machine bootstrap-modal-form" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group" style="width:270px; display: inline-block; margin-right:5px;">
              <label for="casinoid">Casino: </label><br>
              <select title="Choose casino.." name="casinoid" class="form-control selectpicker" id="casinoid" >
                @foreach($casinos as $casino)
                  <option value="{{ $casino->casinoid }}">{{ $casino->casinoname }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group" style="width:240px; display: inline-block;">
              <label for="ps_type">PS Type: </label><br>
              <select name="ps_type" class="form-control selectpicker" id="ps_type" title="Choose type..">
                <option value="0">PlayStation</option>
                <option value="1">Statistics</option>
                <option value="2">Sphere</option>
                <option value="3">Balls</option>
                <option value="4">Wheel</option>
                <option value="5">Statistic RLT</option>
                <option value="6">Jackpot Statistic</option>
              </select>
            </div>
            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label class="control-label" for="psid">PS ID:</label><br>
                <input class="form-control" type="text" name="psid" id="psid" placeholder="Unique ID">
                <span class="help-block">
                    <strong id="psid"></strong>
                </span>
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label class="control-label" for="dallasid">Machine ID:</label><br>
                <input class="form-control" type="text" name="dallasid" id="dallasid" placeholder="Dallas ID">
                <span class="help-block">
                    <strong id="dallasid"></strong>
                </span>
            </div>
            
            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="seatid">Seat ID: </label><br>
                <input class="form-control" type="text" name="seatid" id="seatid" placeholder="Seat ID">
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="psdescription">Description: </label><br>
                <input class="form-control" type="text" name="psdescription" id="psdescription" placeholder="A Description">
            </div>
            <hr>
            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="default_game">Default Game</label><br>
              <select name="default_game" id="default_game" class="selectpicker" title="Choose default game..." data-actions-box="true">

              <option value="0">None</option>

              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}" >
                  {{ $clientgameid->client_game_name }}
                </option>
              @endforeach
              </select>
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="games">Games</label><br>
              <select name="games[]" id="games" class="selectpicker" multiple data-selected-text-format="count > 3" title="Choose games..." data-actions-box="true">
              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}">{{ $clientgameid->client_game_name }}</option>
              @endforeach
              </select>
            </div>

            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="langname">Language: </label><br>
              <select name="langname" class="form-control selectpicker" id="langname">
                <option selected="true" disabled="disabled">Choose Language</option>
                @foreach($languages as $language)
                  <option value="{{ $language->langid }}">{{ $language->langname }}</option>
                @endforeach
              </select>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="add-machine" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>

<script src="/js/modals/terminals.js"></script>
<script>
  $('#add-machine').on('click', function() {
    $.ajax({
        method: 'POST',
        url: add_machine,
        data: { 
            casinoid: $('#addMachineModal select[name="casinoid"]').val() ,
            dallasid: $('#addMachineModal input[name="dallasid"]').val() ,
            psid: $('#addMachineModal input[name="psid"]').val() ,
            seatid: $('#addMachineModal input[name="seatid"]').val() ,
            psdescription: $('#addMachineModal input[name="psdescription"]').val() ,
            ps_type: $('#addMachineModal select[name="ps_type"]').val() ,
            //langname: $('#addMachineModal select[name="langname"]').val() ,
            games: $('#addMachineModal select[name="games[]"]').val() ,
            default_game: $('#addMachineModal select[name="default_game"]').val() ,
            _token: token 
        },
        success: function(response) {
          //
        },
        error: function(error) {
            console.log(error.responseJSON)
            $.each(error.responseJSON, function(key, value) {
                $('strong#' + key).html(value);
                $('strong#' + key).closest('.form-group').addClass('has-error');
            });
        }
    }).done(function () {
          $('#addMachineModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          //window.location.reload();
          javascript:ajaxLoad('{{url('settings/terminals')}}');
        });
    });
</script>
<script>
    var token = '{{ Session::token() }}';
    var add_machine = '{{ route('add.machine') }}';
</script>
