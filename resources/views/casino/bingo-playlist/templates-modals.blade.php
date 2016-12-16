<!-- Delete Template Modal -->
<div class="row">
<div class="modal fade" id="deleteTemplateModal" action="/casino/templates/destroy" method="POST" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong id="strong">@lang('messages.Delete template')</strong></h2>
      </div>
      
      <div class="modal-body">

          <h4>@lang('messages.Delete template') <span></span>  ?</h4>

      </div>
      <div class="modal-footer">
          <input  type="hidden" name="template-id">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
          <button id="delete-template-button" type="submit" class="btn btn-warning">@lang('messages.Delete')</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(document).ready(function() {

// POPULATE DELETE TEMPLATE MODAL
$('#deleteTemplateModal').on('show.bs.modal', function(e) {
    var templateId = $(e.relatedTarget).data('template-id');
    var templateName = $(e.relatedTarget).data('template-name');

    $(e.currentTarget).find('input[name="template-id"]').val(templateId);
    $(e.currentTarget).find('span').html(templateName);
});

// SUBMIT DELETE TEMPLATE MODAL
$('#delete-template-button').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
      method:'POST',
      url: '/casino/templates/destroy',
      data: { 
         template_id: $('#deleteTemplateModal input[name="template-id"]').val(),
         _token: token
      }
    })
    .done(function() {
      $('#deleteTemplateModal').modal('hide');
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      javascript:ajaxLoad('{{url('/casino/templates')}}');
    });
});

}); // <== End Document Ready
</script>

<style>
  #strong {
    color: black;
  }
</style>