<div class="container">
  <div class="row">
      <div class="col-lg-5">
          <h2 style="margin-top: 0px;" class="page-header">Playlist</h2>
          <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

              <li><a class="active" href="javascript:ajaxLoad('{{url('/casino/playlist')}}')">Playlist</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/casino/templates')}}')">Templates</a></li>

              </ul>
          </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container -->

<div class="container">
  <div class="well">

    <div class="row">
      <div class="col-lg-5">
        <button id="toggle-game-type-form" class="btn btn-primary btn-sm">Add Next Game</button>
        <button id="toggle-load-template-form" class="btn btn-primary btn-sm">Load Template</button>
      </div><!-- End Col-->
    </div>

  <div class="row">
    <div class="col-lg-5">
      <form id="game-type-form" class="form-inline" style="padding-top: 15px;">

          <div class="form-group">
            <label for="game_type">Game Type: </label><br>
            <select name="game_type" class="form-control selectpicker" id="game_type">
              <option selected="true" disabled="disabled">Choose Game Type</option>
                <option value=""></option>
            </select>
          </div>

          <div class="form-group">
            <label for="ticket_cost">Ticket Cost:</label><br>
            <input class="form-control" type="text" name="ticket_cost" id="ticket_cost">

            <input class="btn btn-info btn-sm form-control" type="submit" name="submit" value="Load">
          </div>

        </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-5">
      <form id="load-template-form" class="form-inline" style="padding-top: 15px;">

          <div class="form-group">
            <label for="load_template">Load Template: </label><br>
            <select name="load_template" class="form-control selectpicker" id="load_template">
              <option selected="true" disabled="disabled">Choose Template</option>
                <option value=""></option>
            </select>
          </div>

          <div class="form-group">
            <input style="margin-top: 25px;" class="btn btn-info btn-sm" type="submit" name="submit" value="Load">
          </div>

        </form>
    </div>
  </div>

    <hr>

    <div class="row">
      <div class="col-lg-4">
       <table class="table table-bordered">
          <thead class="w3-blue-grey">
            <tr>
              <th>Ticket Cost</th>
              <th>Game Type</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Fixed</td>
            </tr>
          </tbody>
        </table>
      </div><!-- End Col-->
    </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script type="text/javascript">
  $(document).ready(function() {

    $('#game-type-form').hide(); //Initially form wil be hidden.
    $('#toggle-game-type-form').click(function() {
      $('#load-template-form').hide();
      $('#game-type-form').toggle(150);
    });

    $('#load-template-form').hide(); //Initially form wil be hidden.
    $('#toggle-load-template-form').click(function() {
      $('#game-type-form').hide();
      $('#load-template-form').toggle(150);
    });

  });
</script>