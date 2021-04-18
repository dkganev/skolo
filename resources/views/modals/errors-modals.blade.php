<!-- Add Error Level Modal -->
<div class="row">
<div class="modal fade" id="addErrorLevelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>@lang('messages.Error Levels')</strong></h2>
      </div>
      <div class="modal-body">
        <form class="form-inline" role="form" method="POST" name="server-modal">
            <div class="form-group">
                <label for="err_level">@lang('messages.Error Level Int'):</label><br>
                <input class="form-control" type="text" name="err_level" id="err_level" placeholder="@lang('messages.Error Level Int')">
            </div>

            <div class="form-group ">
                <label for="level_str">@lang('messages.Error Level String'): </label><br>
                <input class="form-control" type="text" name="level_str" id="level_str" placeholder="@lang('messages.Error Level String')">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="add-error-lvl" class="btn btn-primary">@lang('messages.Save')</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Add Error List Modal -->
<div class="row">
<div class="modal fade" id="addErrorListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>@lang('messages.Error List')</strong></h2>
      </div>
      <div class="modal-body">
        <form class="form-inline" role="form" method="POST" name="server-modal">
            <div class="form-group">
              <label for="err_level">@lang('messages.Error Level'): </label><br>
              <select name="err_level" class="form-control selectpicker" title="@lang('messages.Error Level')l.." id="err_level">
                @foreach($error_lvls as $error_lvl)
                  <option value="{{ $error_lvl->err_level }}">{{ $error_lvl->level_str }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="err_group">@lang('messages.Error Group'): </label><br>
              <select name="err_group" class="form-control selectpicker" id="err_group" title="@lang('messages.Error Group')..">
                <option value="1">NOTE</option>
                <option value="2">DOORS</option>
                <option value="4">DOORSOFF</option>
                <option value="8">ERROR</option>
                <option value="16">CR_IN</option>
                <option value="32">BILL</option>
                <option value="64">HANDPAY</option>
                <option value="128">PRGR</option>
                <option value="256">VOUCHRIN</option>
                <option value="512">VOUCHOUT</option>
                <option value="1024">CASHLESSIN</option>
                <option value="2048">CASHLESSOUT</option>
                <option value="4096">BONUS</option>
                <option value="8192">MONEY</option>
                <option value="16384">SERVER</option>
              </select>
            </div>

            <div class="form-group">
                <label for="err_code">@lang('messages.Error Code'):</label><br>
                <input class="form-control" type="text" name="err_code" id="err_code" placeholder="@lang('messages.Error Code')">
            </div>
            <hr>
            <div class="form-group ">
                <label for="err_text">@lang('messages.Error Text'): </label><br>
                <input class="form-control" type="text" name="err_text" id="err_text" placeholder="@lang('messages.Error Text')">
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="add-error-list" class="btn btn-primary">@lang('messages.Save')</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$('#add-error-lvl').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        method: 'POST',
        url: '/settings/addErrorLvl',
        data: { 
          err_level: $('#addErrorLevelModal input[name="err_level"]').val() ,
          level_str: $('#addErrorLevelModal input[name="level_str"]').val() ,
          _token: token 
        } 
    }).done(function() {
        $('#addErrorLevelModal').modal('hide')
        javascript:ajaxLoad('{{url('settings/errors')}}')
    });
});

$('#add-error-list').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        method: 'POST',
        url: '/settings/addErrorList',
        data: { 
          err_level: $('#addErrorListModal select[name="err_level"]').val() ,
          err_code: $('#addErrorListModal input[name="err_code"]').val() ,
          err_group: $('#addErrorListModal select[name="err_group"]').val() ,
          err_text: $('#addErrorListModal input[name="err_text"]').val() ,
          _token: token 
        } 
    }).done(function() {
        $('#addErrorListModal').modal('hide');
        sortTimer123 = setTimeout(function(){ javascript:ajaxLoad('{{url('settings/errors')}}')}, 200);
        
    });
});
</script>