<!-- Add Language Modal -->
<div class="row">
<div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>+ Add Language</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline" role="form" method="POST" name="server-modal">
           

            <div class="form-group">
                <label for="langid">Language ID:</label><br>
                <input class="form-control" type="text" name="langid" id="langid" placeholder="ID">
            </div>

            <div class="form-group ">
                <label for="langname">Language Name: </label><br>
                <input class="form-control" type="text" name="langname" id="langname" placeholder="Name">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="add-language" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_language = '{{ url('/settings/addLang') }}';
</script>
<!-- End Add Language Modal -->

<!-- Update Language Modal -->
<div class="row">
<div class="modal fade" id="updateLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong> Update Language</strong></h2>
      </div>
      <div class="modal-body">

        <form class="form-inline" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="langid">Language ID:</label><br>
                <input disabled class="form-control" type="text" name="langid" id="langid" placeholder="ID">
            </div>

            <div class="form-group ">
                <label for="langname">Language Name: </label><br>
                <input class="form-control" type="text" name="langname" id="langname" placeholder="Name">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="update-language" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var update_language = '{{ url('/settings/updateLang') }}';
</script>
<!-- End Add Language Modal -->
