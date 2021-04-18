<!-- Delete Terminal Modal -->
<div class="row">
<div class="modal fade" id="destroyUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>@lang('messages.Delete User')</strong></h2>
      </div>
      
      <div class="modal-body">
          <h4>@lang('messages.Delete User') <span id="dallasid"></span>  ?</h4>
      </div>
      <div class="modal-footer">
          <input  type="hidden" name="id">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
          <button id="destroy-user" type="submit" class="btn btn-warning">@lang('messages.Delete')</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(function() {

    // POPULATE DELETE PS MODAL
    $('#destroyUserModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var fullName = $(e.relatedTarget).data('fullname');

        $(e.currentTarget).find('span').html(fullName);
        $(e.currentTarget).find('input[name="id"]').val(id);
    });

    $('#destroy-user').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.post('/settings/users/destroy', { id: $('#destroyUserModal input[name="id"]').val(), _token: token })
          .done(function() {
            $('#destroyUserModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('/settings/users')}}');
        });
    });

}); // <== End Document Ready
</script>