<!-- Store Terminal Modal --> 
<div class="row">
<div class="modal fade" id="addMachineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>@lang('messages.Add Machine')</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline new-machine bootstrap-modal-form" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group" style="width:270px; display: inline-block; margin-right:5px;">
              <label for="casinoid">@lang('messages.Casino'): </label><br>
              <select title="@lang('messages.Choose casino').." name="casinoid" class="form-control selectpicker" id="casinoid" >
                @foreach($casinos as $casino)
                  <option value="{{ $casino->casinoid }}">{{ $casino->casinoname }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group" style="width:240px; display: inline-block;">
              <label for="ps_type">@lang('messages.PS Type'): </label><br>
              <select name="ps_type" class="form-control selectpicker" id="ps_type" title="@lang('messages.Choose type'):..">
                <option value="0">@lang('messages.PlayStation')</option>
                <option value="1">@lang('messages.Statistics')</option>
                <option value="2">@lang('messages.Sphere')</option>
             {{--    <option value="3">:Balls</option> --}}
                <option value="4">@lang('messages.Wheel')</option>
                <option value="5">@lang('messages.Statistic RLT')</option>
                <option value="6">@lang('messages.Jackpot Statistic')</option>
              </select>
            </div>
            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label class="control-label" for="psid">@lang('messages.PS ID'):</label><br>
                <input class="form-control" type="text" name="psid" id="psid" placeholder="@lang('messages.Unique ID')">
                <span class="help-block">
                    <strong id="psid"></strong>
                </span>
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label class="control-label" for="dallasid">@lang('messages.Machine ID'):</label><br>
                <input class="form-control" type="text" name="dallasid" id="dallasid" placeholder="@lang('messages.Dallas ID')">
                <span class="help-block">
                    <strong id="dallasid"></strong>
                </span>
            </div>
            
            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="seatid">@lang('messages.Seat ID'): </label><br>
                <input class="form-control" type="text" name="seatid" id="seatid" placeholder="@lang('messages.Seat ID')">
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
                <label for="psdescription">@lang('messages.Description'): </label><br>
                <input class="form-control" type="text" name="psdescription" id="psdescription" placeholder="@lang('messages.A Description')">
            </div>
            <hr>
            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="default_game">@lang('messages.Default Game')</label><br>
              <select name="default_game" id="default_game" class="selectpicker" title="@lang('messages.Choose default game')..." data-actions-box="true">

              <option value="0">None</option>

              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}" >
                  {{ $clientgameid->client_game_name }}
                </option>
              @endforeach
              </select>
            </div>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="games">@lang('messages.Games')</label><br>
              <select name="games[]" id="games" class="selectpicker" multiple data-selected-text-format="count > 3" title="@lang('messages.Choose games')..." data-actions-box="true">
              @foreach($clientgameids as $clientgameid)
                <option value="{{ $clientgameid->client_game_id }}">{{ $clientgameid->client_game_name }}</option>
              @endforeach
              </select>
            </div>

            <hr>

            <div class="form-group" style="width:270px; display: inline-block;">
              <label for="default_lang">@lang('messages.Languages'): </label><br>
              <select name="default_lang" class="form-control selectpicker" id="default_lang">
                <option selected="true" disabled="disabled">@lang('messages.Choose Language')</option>
                @foreach($languages as $language)
                  <option value="{{ $language->langid }}">{{ $language->langname }}</option>
                @endforeach
              </select>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="add-machine" class="btn btn-primary">@lang('messages.Save')</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(function() {

  $('#add-machine').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        method: 'POST',
        url: '/terminal/store',
        data: { 
            casinoid: $('#addMachineModal select[name="casinoid"]').val() ,
            dallasid: $('#addMachineModal input[name="dallasid"]').val() ,
            psid: $('#addMachineModal input[name="psid"]').val() ,
            seatid: $('#addMachineModal input[name="seatid"]').val() ,
            psdescription: $('#addMachineModal input[name="psdescription"]').val() ,
            ps_type: $('#addMachineModal select[name="ps_type"]').val() ,
            default_lang: $('#addMachineModal select[name="default_lang"]').val() ,
            games: $('#addMachineModal select[name="games[]"]').val() ,
            default_game: $('#addMachineModal select[name="default_game"]').val() ,
            _token: token 
        },
        success: function(response) {
          //
        },
        error: function(error) {
            $.each(error.responseJSON, function(key, value) {
                $('strong#' + key).html(value);
                $('strong#' + key).closest('.form-group').addClass('has-error');
            });
        }
    }).done(function () {
          $('#addMachineModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          javascript:ajaxLoad('{{url('settings/terminals')}}');
        });
    });

}); // => End Ready Function
</script>
