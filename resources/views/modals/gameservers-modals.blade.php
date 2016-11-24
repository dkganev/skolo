<!-- Add Game Client Modal -->
<div class="row">
<div class="modal fade" id="addGameClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>+ Add Game Client</strong></h2>
      </div>
      
      <div class="modal-body">

          <form class="form-inline"> 

            <div class="form-group">
                <label for="client_game_id">Game Client ID:</label><br>
                <input class="form-control" type="text" name="client_game_id" id="client_game_id" placeholder="Cannot be edited">
            </div>

            <div class="form-group">
                <label for="client_game_name">Game Name:</label><br>
                <input class="form-control" type="text" name="client_game_name" id="client_game_name" placeholder="Game name">
            </div>
            <hr>

          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="game-client-save" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_game_client = '{{ route('add.gameclient') }}';
</script>
<!-- End Add Game Client Modal -->

<!-- Update Game Client Modal -->
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
<script>
    var token = '{{ Session::token() }}';
    var update_game_client = '{{ route('update.gameclient') }}';
</script>
<!-- End UpdateGame Server Modal -->


<!-- Add Game  Modal -->
<div class="row">
<div class="modal fade" id="addGameModal"  role="dialog" aria-labelledby="exampleModalLabel" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Add Game</strong></h2>
      </div>
      
      <div class="modal-body">
          <form class="form-inline"> 

            <div class="form-group">
              <label for="client_game_id">Game Cleint ID: </label><br>
              <select name="client_game_id" class="form-control selectpicker" id="client_game_id">
                <option selected="true" disabled="disabled">Choose Client Game ID </option>
                @foreach($game_clients as $game_client)
                  <option value="{{ $game_client->client_game_id }}">{{ $game_client->client_game_id }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="game_category">Game Category: </label><br>
              <select name="game_category" class="form-control selectpicker" id="game_category">
                <option selected="true" disabled="disabled">Choose Game Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->idx }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="game_type">Game Type: </label><br>
              <select name="game_type" class="form-control selectpicker" id="game_type">
                <option selected="true" disabled="disabled">Choose Game Type</option>
                @foreach($game_types as $game_type)
                  <option value="{{ $game_type->game_type }}">{{ $game_type->type }}</option>
                @endforeach
              </select>
            </div>

            <hr>

            <div class="form-group">
                <label for="gameid">Game ID:</label><br>
                <input  class="form-control" type="text" name="gameid" id="gameid" >
            </div>

          

           
            <div class="form-group">
                <label for="short_name">Game Short Name:</label><br>
                <input placeholder="3 Characters" class="form-control" type="text" name="short_name" id="short_name">
            </div>

             <hr>
            <div class="form-group">
                <label for="description">Game Description:</label><br>
                <input placeholder="Game Description" class="form-control" type="text" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="db_name">DB Name:</label><br>
                <input class="form-control" type="text" name="db_name" id="db_name" placeholder="DB Name">
            </div>
            <hr>

          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="add-game" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_game = '{{ route('add.game') }}';
</script>
<!-- End Add Game  Modal -->

<!-- Update Game Client Modal -->
<div class="row">
<div class="modal fade" id="updateGameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update Game</strong></h2>
      </div>
      
      <div class="modal-body">

          <form class="form-inline"> 

            <div class="form-group" style="width:200px;">
              <label for="client_game_id">Game Cleint ID: </label><br>
              <select name="client_game_id" class="form-control" id="client_game_id">
                <option disabled="disabled">Choose Client Game ID </option>
                @foreach($game_clients as $game_client)
                  <option
                      value="{{ $game_client->client_game_id }}">{{ $game_client->client_game_id }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="gameid">Game ID:</label><br>
                <input  disabled class="form-control" type="text" name="gameid" id="gameid">
            </div>
            <hr>

            <div class="form-group">
              <label for="game_type">Game Type: </label><br>
              <select name="game_type" class="form-control" id="game_type">
                <option disabled="disabled">Choose Game Type</option>
                <option value="1">Bingo/Keno/Lotto</option>
                <option value="2">Roulette/Lucky Circle Cash</option>
                <option value="3">Slots</option>
                <option value="4">Card Games</option>
              </select>
            </div>

            <div class="form-group">
                <label for="short_name">Game ShortName:</label><br>
                <input placeholder="3 Characters" class="form-control" type="text" name="short_name" id="short_name">
            </div>
            <hr>

            <div class="form-group">
                <label for="description">Game Description:</label><br>
                <input placeholder="3 Characters" class="form-control" type="text" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="db_name">DB Name:</label><br>
                <input class="form-control" type="text" name="db_name" id="db_name">
            </div>

          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="game-update" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var update_game = '{{ route('update.game') }}';
</script>
<!-- End UpdateGame Server Modal -->


<!-- Add Category Modal -->
<div class="row">
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Add Category</strong></h2>
      </div>
      
      <div class="modal-body">
          <form class="form-inline"> 

            <div class="form-group">
                <label for="idx">Category ID:</label><br>
                <input class="form-control" type="text" name="idx" id="idx" placeholder="Cannot be edited">
            </div>

            <div class="form-group">
                <label for="name">Category Name:</label><br>
                <input  class="form-control" type="text" name="name" id="name" placeholder="Category Name">
            </div>
            <hr>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="add-category" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_category = '{{ route('add.category') }}';
</script>
<!-- End Add Game  Modal -->


<!-- Update Category Modal -->
<div class="row">
<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update Category</strong></h2>
      </div>
      
      <div class="modal-body">
          <form class="form-inline"> 

            <div class="form-group">
                <label for="idx">Category ID:</label><br>
                <input class="form-control" type="text" name="idx" id="idx" placeholder="Cannot be edited" disabled>
            </div>

           
            <div class="form-group">
                <label for="name">Category Name:</label><br>
                <input  class="form-control" type="text" name="name" id="name" placeholder="Category Name">
            </div>
             <hr>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="update-category" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var update_category = '{{ route('update.category') }}';
</script>
<!-- End Add Game  Modal