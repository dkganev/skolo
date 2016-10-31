<!-- Delete Template Modal -->
<div class="row">
<div class="modal fade" id="deleteTemplateModal" action="/casino/templates/destroy" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Delete template</strong></h2>
      </div>
      
      <div class="modal-body">

          <h4>Delete Template <span></span>  ?</h4>

      </div>
      <div class="modal-footer">
          <input  type="hidden" name="template-id">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="delete-template-button" type="submit" class="btn btn-warning">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Edit Template Modal -->
<div class="row">
<div class="modal fade" id="updateGameClientModal" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update Game Client</strong></h2>
      </div>
      
      <div class="modal-body">

          <form class="form-inline"> 

            <div class="form-group">
                <label for="client_game_id">Game Client ID:</label><br>
                <input disabled class="form-control" type="text" name="client_game_id" id="client_game_id">
            </div>

            <div class="form-group">
                <label for="client_game_name">Game Name:</label><br>
                <input class="form-control" type="text" name="client_game_name" id="client_game_name">
            </div>
            <hr>

          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="game-client-update" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$(document).ready(function() {

// RESTART TERMINAL
$('#deleteTemplateModal').on('show.bs.modal', function(e) {
    var templateId = $(e.relatedTarget).data('template-id');
    var templateName = $(e.relatedTarget).data('template-name');

    $(e.currentTarget).find('span').html(templateName);
    $(e.currentTarget).find('input[name="template-id"]').val(templateName);
});

$('#delete-template-button').on('click', function() {
    var url = $('form#deleteTemplateModal').attr('action');
    var method = $('form#deleteTemplateModal').attr('method');
    var token = $('meta[name="csrf-token"]').attr('content');

     $.ajax({
         method: method,
         url: url,
         data: { 
             template_id: $('form#deleteTemplateModal input[name="template-id"]').val(),
             _token: token
        } 
     })
     .done(function() {
         console.log('success');
         $('#resetPsModal').modal('hide');
         window.location.reload();
     });
});

}); // <== End Document Ready
</script>