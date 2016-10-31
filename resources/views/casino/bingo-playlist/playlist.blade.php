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
      <button id="toggle-game-type-form" class="btn btn-primary btn-sm">
          Add Next Game
          <span style="margin-left: 6px;" class="caret"></span>
      </button>

      <button id="toggle-load-template-form" class="btn btn-primary btn-sm">
          Load Template
          <span style="margin-left: 6px;" class="caret"></span>
      </button>
    </div><!-- End Col-->
  </div>

  <!-- Add Game Next Game Form -->
  <div class="row">
    <div class="col-lg-10">
      <form method="post" id="game-type-form" action="/casino/playlist/store" class="form-inline" style="padding-top: 15px;">

        <div style="width: 169px" class="form-group">
          <label for="game_type">Game Type: </label><br>
          <select  name="game_type" class="form-control selectpicker" id="game_type">
            <option selected="true" disabled="disabled">Choose Game Type</option>
              <option value="0">Standard</option>
              <option value="1">Fixed</option>
          </select>
        </div>

        <div class="form-group">
          <label for="ticket_cost">Ticket Cost (cents):</label><br>
          <input class="form-control" type="text" name="ticket_cost" id="ticket_cost">

        </div>

        <div id="line-cost-form-group"  class="form-group" style="display: none;">
          <label for="line_cost">Line Cost (cents):</label><br>
          <input class="form-control" type="text" name="line_cost" id="lineline_cost">
        </div>

        <div id="bingo-cost-form-group" class="form-group" style="display: none;">
          <label for="bingo_cost">Bingo Cost (cents):</label><br>
          <input class="form-control" type="text" name="bingo_cost" id="bingo_cost">
        </div>

        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button 
                id="send-button"
                type="Submit"
                value="Submit" 
                style="margin-top: 25px;" 
                class="btn btn-info btn-sm form-control"
        >
                Add
        </button>

        </form>
    </div>
  </div>

  <!-- Load Template Form -->
  <div class="row">
    <div class="col-lg-5">
      <form id="load-template-form" action="/casino/playlist/load"  class="form-inline" style="padding-top: 15px;">

          <div class="form-group">
            <label for="load_template">Load Template: </label><br>
            <select name="load_template" class="form-control selectpicker" id="load_template">
              <option selected="true" disabled="disabled">Choose Template</option>
              @foreach($templates as $template)
                <option value="{{ $template->template_id }}">{{ $template->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group" >
            <input style="margin-top: 25px;" class="btn btn-info btn-sm" type="submit" name="submit" value="Load">
          </div>

        </form>
    </div>
  </div>

  <hr>

  <!-- Playlist Table -->
  <div class="row">
    <div class="col-lg-6">
     <table class="table table-bordered">
        <thead class="w3-blue-grey">
          <tr>
            <th>Ticket Cost(cents)</th>
            <th>Game Type</th>
            <th>Line Cost(cents)</th>
            <th>Bingo Cost(cents)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($playlists as $playlist)
          <tr>
            <td>{{ $playlist->bingo_ticket_cost }}</td>
            <td>
              {{ $playlist->bingo_cost_line1_fixed && $playlist->bingo_cost_bingo_fixed ? 'Fixed' : 'Standard'}}
            </td>
            <td>{{ $playlist->bingo_cost_line1 }}</td>
            <td>{{ $playlist->bingo_cost_bingo }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- End Col-->
  </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script>
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

    $('select#game_type').change(function () {
     var optionSelected = $(this).find("option:selected");
     var valueSelected  = optionSelected.val();

      if(valueSelected == 1) {
        $('#line-cost-form-group').show(100);
        $('#bingo-cost-form-group').show(100);
      }

      if(valueSelected == 0) {
        $('#line-cost-form-group').hide(100);
        $('#bingo-cost-form-group').hide(100);
      }
    });

  });
</script>