<div class="container">
  <div class="row">
      <div class="col-lg-5">
          <div style="padding-top:2px; margin-top: 0px;">
            <ul class="breadcrumb">
                <li class="active"><a href="javascript:ajaxLoad('{{url('/casino/playlist')}}')">@lang('messages.Playlist')</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/casino/templates')}}')">@lang('messages.Templates')</a></li>
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
          @lang('messages.Add Next Game')
          <span style="margin-left: 6px;" class="caret"></span>
      </button>

      <button id="toggle-load-template-form" class="btn btn-primary btn-sm">
          @lang('messages.Load Template')
          <span style="margin-left: 6px;" class="caret"></span>
      </button>
    </div><!-- End Col-->
  </div>

  <!-- Add Game Next Game Form -->
  <div class="row">
    <div class="col-lg-10">
      <form method="post" id="game-type-form" action="/casino/playlist/store" class="form-inline" style="padding-top: 15px;">

        <div style="width: 169px" class="form-group">
          <label for="game_type">@lang('messages.Game Type'): </label><br>
          <select  name="game_type" class="form-control selectpicker" id="game_type">
            <option selected="true" disabled="disabled">@lang('messages.Choose Game Type')</option>
              <option value="0">@lang('messages.Standard')</option>
              <option value="1" >@lang('messages.Fixed')</option>
          </select>
        </div>

        <div class="form-group">
          <label for="ticket_cost">@lang('messages.Ticket Cost') (@lang('messages.cents')):</label><br>
          <input class="form-control" type="text" name="ticket_cost" id="ticket_cost">

        </div>

        <div id="line-cost-form-group"  class="form-group" style="display: none;">
          <label for="line_cost">@lang('messages.Line Cost') (@lang('messages.cents')):</label><br>
          <input class="form-control" type="text" name="line_cost" id="lineline_cost">
        </div>

        <div id="bingo-cost-form-group" class="form-group" style="display: none;">
          <label for="bingo_cost">@lang('messages.Bingo Cost') (@lang('messages.cents')):</label><br>
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
                @lang('messages.Add')
        </button>

        </form>
    </div>
  </div>

  <!-- Load Template Form -->
  <div class="row">
    <div class="col-lg-5">
      <form method="POST" id="load-template-form" action="/casino/playlist/load"  class="form-inline" style="padding-top: 15px;">

          <div class="form-group">
            <label for="load_template">Load Template: </label><br>
            <select name="load_template" class="form-control selectpicker" id="load_template">
              <option selected="true" disabled="disabled">Choose Template</option>
              @foreach($templates as $template)
                <option value="{{ $template->template_id }}">{{ $template->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">

            <button  id="load-template-button" type="Submit" value="Submit"  style="margin-top: 25px;" class="btn btn-info btn-sm form-control">
                @lang('messages.Add')
            </button>
            <!-- <input style="margin-top: 25px;" class="btn btn-info btn-sm" type="submit" name="submit" value="Load"> -->
          </div>

        </form>
    </div>
  </div>

  <hr>

  <!-- Playlist Table -->
  <div class="row">
    <div class="col-lg-8">
     <table class="table table-bordered">
        <thead class="w3-blue-grey">
          <tr>
            <th>@lang('messages.Ticket Cost') (@lang('messages.cents'))</th>
            <th>@lang('messages.Game Type')</th>
            <th>@lang('messages.Line Cost') (@lang('messages.cents'))</th>
            <th>@lang('messages.Bingo Cost') (@lang('messages.cents'))</th>
            <th>@lang('messages.Action')</th>
          </tr>
        </thead>
        <tbody>
          @foreach($playlists as $playlist)
          <tr id="row{{ $playlist->idx }}" class="tr-class " idx="{{ $playlist->idx }}">
            <td>{{ $playlist->bingo_ticket_cost }}</td>
            <td>
              {{ $playlist->bingo_cost_line1_fixed && $playlist->bingo_cost_bingo_fixed ? 'Fixed' : 'Standard'}}
            </td>
            <td>{{ $playlist->bingo_cost_line1 }}</td>
            <td>{{ $playlist->bingo_cost_bingo }}</td>
            <td>
              <a class="btn btn-primary btn-xs top">
                <span class="glyphicon glyphicon-eject"></span>
              </a>

              <a class="btn btn-success btn-xs up">
                <span class="glyphicon glyphicon-arrow-up"></span>
              </a>
              <a class="btn btn-success btn-xs down">
                <span class="glyphicon glyphicon-arrow-down"></span>
              </a>

              <a class="btn btn-danger btn-xs remove">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- End Col-->
  </div><!-- End Row-->

  </div><!-- End Well-->
</div><!-- End Container-->

<script>
    $(".up,.down").click(function() {
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            //row.insertBefore(row.prev());
            var data = {
                idx: row.attr('idx'),
                _token: $('meta[name="csrf-token"]').attr('content')
            }
            $.post('/casino/playlist/up', data, function(response) {
                //console.log(response.msg, response.idx);
                $('#row' + response.idx ).attr('idx', response.idxC );    
                $('#row' + response.idx ).attr('id', 'rowNew' );
                $('#row' + response.idxNew ).attr('idx', response.idx );    
                $('#row' + response.idxNew ).attr('id', 'row' + response.idx );
                $('#rowNew' ).attr('idx', response.idxNew );    
                $('#rowNew' ).attr('id', 'row' + response.idxNew );
                row.insertBefore(row.prev());
            });

        } else if ($(this).is(".down")) {
            //row.insertAfter(row.next());
            var data = {
                idx: row.attr('idx'),
                _token: $('meta[name="csrf-token"]').attr('content')
            }
            $.post('/casino/playlist/down', data, function(response) {
                $('#row' + response.idx ).attr('idx', response.idxC );    
                $('#row' + response.idx ).attr('id', 'rowNew' );
                $('#row' + response.idxNew ).attr('idx', response.idx );    
                $('#row' + response.idxNew ).attr('id', 'row' + response.idx );
                $('#rowNew' ).attr('idx', response.idxNew );    
                $('#rowNew' ).attr('id', 'row' + response.idxNew );
                row.insertAfter(row.next());
            });
        }
    });

    $(".top").click(function(){
      var row = $(this).parents("tr:first");
      var data = {
          idx: row.attr('idx'),
          _token: $('meta[name="csrf-token"]').attr('content')
      }
      $.post('/casino/playlist/top', data, function(response) {
        //console.log(response.msg, response.idx);
        //row.attr('idx',response.idxNew ); 
        $('#row' + response.idx ).attr('idx', response.idxNew );    
        $('#row' + response.idx ).attr('id', 'row' + response.idxNew );
                
      });

      row.prependTo('table');
    });

    $(".remove").click(function() {
      var row = $(this).parents("tr:first");
      var data = {
          idx: row.attr('idx'),
          _token: $('meta[name="csrf-token"]').attr('content')
      }
      $.post('/casino/playlist/destroy', data, function(response) {
        //console.log(response.msg, response.id);
      });
      row.remove();
    });

</script>

<script>
  $(function() {
    // ADD PLAYLIST
    $('#load-template-button').on('click', function(event) {
        event.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: 'POST',
            url: '/casino/playlist/load',
            data: {
              template_id: $('form#load-template-form select[name="load_template"]').val(),
              _token: token,
          }
        })
        .done(function() {
          javascript:ajaxLoad('{{url('/casino/playlist')}}');
        });
    });

    // ADD PLAYLIST
    $('#send-button').on('click', function(event) {
        event.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            method: 'POST',
            url: '/casino/playlist/store',
            data: {
               game_type: $('form#game-type-form select[name="game_type"]').val(),
               ticket_cost: $('form#game-type-form  input[name="ticket_cost"]').val(),
               line_cost: $('form#game-type-form  input[name="line_cost"]').val(),
               bingo_cost: $('form#game-type-form  input[name="bingo_cost"]').val(),
               template_id: $('form#game-type-form  input[name="template_id"]').val(),
               _token: token,
          }
        }).done(function() {
          javascript:ajaxLoad('{{url('/casino/playlist')}}');
        });
    });

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