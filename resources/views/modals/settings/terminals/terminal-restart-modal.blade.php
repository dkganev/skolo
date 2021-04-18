<!-- Restart Terminal Modal -->
<div class="row">
<div class="modal fade" id="resetPsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>@lang('messages.Restart Terminal')</strong></h2>
      </div>
      
      <div class="modal-body">
          <h4>@lang('messages.Restart Terminal') <span id="dallasid"></span>  ?</h4>
      </div>
      <div class="modal-footer">
          <input  type="hidden" name="psid">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
          <button id="reset-ps" type="submit" class="btn btn-warning">@lang('messages.Restart')</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(function() {
    $('#resetPsModal').on('show.bs.modal', function(e) {
        var psId = $(e.relatedTarget).data('psid');
        var dallasid = $(e.relatedTarget).data('dallasid');

        $(e.currentTarget).find('span').html(dallasid);
        $(e.currentTarget).find('input[name="psid"]').val(psId);
    });

    $('#reset-ps').on('click', function() {
      var token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
         method: 'GET',
         url: '/resetps',
         data: {
             psid: $('#resetPsModal input[name="psid"]').val(),
             _token: token
        },
        success: function(response) {
          //
        },
        error: function(error) {
          //
        }
      }).done(function() {
        $('#resetPsModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        javascript:ajaxLoad('{{url('settings/terminals')}}');
      });
    });
}); // <== End Document Ready
</script>