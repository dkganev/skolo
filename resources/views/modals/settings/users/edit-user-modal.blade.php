<!-- Add Language Modal -->
<div class="container">
<div class="row">
<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>Edit User</strong></h2>
      </div>
      <div class="modal-body">
        <form id="edit-form-{{ $user->id }}" role="form" method="post">
        <input id="theinput" type="hidden" value="HIT FINALLY" name="user_id">
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="edit-button-{{ $user->id }}" class="btn btn-primary edit-user">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
    $('#edit-button-{{ $user->id }}').on('click', function() {
        console.log('Hit')
        console.log($('#theinput').val())
    });
</script>