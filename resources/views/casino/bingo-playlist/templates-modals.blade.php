<!-- Delete Template Modal -->
<div class="row">
<div class="modal fade" id="deleteTemplateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Restart Terminal</strong></h2>
      </div>
      
      <div class="modal-body">

          <h4>Delete Template <span id="dallasid"></span>  ?</h4>

      </div>
      <div class="modal-footer">
          <input  type="hidden" name="psid">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="reset-ps" type="submit" class="btn btn-warning">Restart</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Edit Template Modal -->
<div class="row">
<div class="modal fade" id="updateGameClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
