<!-- Delete Terminal Modal -->
<div class="row">
<div class="modal fade" id="deletePsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Delete Terminal</strong></h2>
      </div>
      
      <div class="modal-body">
          <h4>Delete Terminal <span id="dallasid"></span>  ?</h4>
      </div>
      <div class="modal-footer">
          <input  type="hidden" name="psid">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="delete-ps" type="submit" class="btn btn-warning">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(function() {

    // POPULATE DELETE PS MODAL
    $('#deletePsModal').on('show.bs.modal', function(e) {
        var psId = $(e.relatedTarget).data('psid');
        var dallasid = $(e.relatedTarget).data('dallasid');

        $(e.currentTarget).find('span').html(dallasid);
        $(e.currentTarget).find('input[name="psid"]').val(psId);
    });

    $('#delete-ps').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '/terminal/destroy',
            data: {
                psid: $('#deletePsModal input[name="psid"]').val(),
                _token: token
            },
            success: function(response) {
              //
            },
            error: function(error) {
              //
            }
        }).done(function() {
            $('#deletePsModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('/settings/terminals')}}');
        });
    });

}); // <== End Document Ready
</script>