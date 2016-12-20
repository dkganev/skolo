<!-- Add Language Modal -->
<div class="row">
<div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>@lang('messages.Add Language')</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline" role="form" method="POST" name="server-modal">
            <div class="form-group">
                <label for="langid">@lang('messages.Language ID'):</label><br>
                <input class="form-control" type="text" name="langid" id="langid" placeholder="@lang('messages.Language ID')">
            </div>

            <div class="form-group ">
                <label for="langname">@lang('messages.Language Name'): </label><br>
                <input class="form-control" type="text" name="langname" id="langname" placeholder="@lang('messages.Language Name')">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="add-language" class="btn btn-primary">@lang('messages.Save')</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Add Language Modal -->

<!-- Update Language Modal -->
<div class="row">
<div class="modal fade" id="updateLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong> @lang('messages.Update Language')</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="langid">@lang('messages.Language ID'):</label><br>
                <input disabled class="form-control" type="text" name="langid" id="langid" placeholder="@lang('messages.Language ID')">
            </div>

            <div class="form-group ">
                <label for="langname">@lang('messages.Language Name'): </label><br>
                <input class="form-control" type="text" name="langname" id="langname" placeholder="@lang('messages.Language Name')">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
        <button id="update-language" class="btn btn-primary">@lang('messages.Update')</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Add Language Modal -->

<script>
$(function() {

    $('#add-language').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            method: 'POST',
            url: '/settings/addLang',
            data: {
                langid: $('#addLanguageModal input[name="langid"]').val(),
                langname: $('#addLanguageModal input[name="langname"]').val(),
                _token: token
            } 
        }).done(function() {
            $('#addLanguageModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('settings/langs')}}')
        })
    })

    $('#updateLanguageModal').on('show.bs.modal', function(e) {
        var langId = $(e.relatedTarget).data('langid');
        var langName = $(e.relatedTarget).data('langname');

        $(e.currentTarget).find('input[name="langid"]').val(langId);
        $(e.currentTarget).find('input[name="langname"]').val(langName);
    })

    $('#update-language').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            method: 'POST',
            url: '/settings/updateLang',
            data: {
                langid: $('#updateLanguageModal input[name="langid"]').val(),
                langname: $('#updateLanguageModal input[name="langname"]').val(),
                _token: token 
            }
        }).done(function() {
            $('#updateLanguageModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('settings/langs')}}')
        })
    })

}); // <== End Document Ready
</script>