<!-- Edit Template Modal -->
<div class="row">
<div class="modal fade" id="editTemplateModal--{{ $template->template_id }}" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>@lang('messages.Update Template')</strong></h2>
      </div>
      <div class="modal-body">

          <div class="row">

            <div class="col-md-3">

              <form id="game-type-form--{{ $template->template_id }}" class="form-inline" style="padding-top: 15px;">
                <div style="width: 202px" class="form-group">
                  <label>@lang('messages.Game Type'): </label><br>
                  <select name="game_type" class="form-control selectpicker">
                    <option selected="true" disabled="disabled">@lang('messages.Choose Game Type')</option>
                      <option value="0">@lang('messages.Standard')</option>
                      <option value="1">@lang('messages.Fixed')</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="ticket_cost">@lang('messages.Ticket Cost') (@lang('messages.cents')):</label><br>
                  <input class="form-control" type="text" name="ticket_cost" id="ticket_cost--{{ $template->template_id }}">
                </div>

                <div id="line-cost-form-group--{{ $template->template_id }}"  class="form-group" style="display: none;">
                  <label>@lang('messages.Line Cost') (@lang('messages.cents')):</label><br>
                  <input class="form-control" type="text" name="line_cost">
                </div>

                <div id="bingo-cost-form-group--{{ $template->template_id }}" class="form-group" style="display: none;">
                  <label>@lang('messages.Bingo Cost') (@lang('messages.cents')):</label><br>
                  <input class="form-control" type="text" name="bingo_cost">
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">


                <input type="hidden" name="template_id" value="{{ $template->template_id }}">

                  <button id="send-button--{{ $template->template_id }}"
                        type="Submit"
                        style="margin-top: 25px;" 
                        class="btn btn-primary btn-sm form-control"
                >
                  @lang('messages.Add')
                </button>

                <button type="button"
                        data-dismiss="modal"
                        style="margin-top: 25px;"
                        class="btn btn-default btn-sm form-control"
                        >
                          @lang('messages.Close')
                </button>

                </form>
              </div><!-- End Col--> 

              <div class="col-sm-9">
                <h4><strong>@lang('messages.Games')</strong></h4>
                <hr>

                <div class="divTable">
                  <div class="divTableBody">
                    <div class="divTableRow dataHeadingRow">
                      <div class="divTableCell"><strong>@lang('messages.Ticket Cost') (@lang('messages.cents'))</strong></div>
                      <div class="divTableCell"><strong>@lang('messages.Game Type')</strong></div>
                      <div class="divTableCell"><strong>@lang('messages.Line Cost') (@lang('messages.cents'))</strong></div>
                      <div class="divTableCell"><strong>@lang('messages.Bingo Cost') (@lang('messages.cents'))</strong></div>
                      <div class="divTableCell"><strong>@lang('messages.Action')</strong></div>
                    </div>

                    @foreach($template->template_games as $game)
                    <div class="divTableRow dataTableRow">
                      <div class="divTableCell">{{ $game->bingo_ticket_cost }}</div>
                      <div class="divTableCell">
                        {{ $game->bingo_cost_line1_fixed && $game->bingo_cost_bingo_fixed ? app('translator')->get('messages.Fixed') : app('translator')->get('messages.Standard')}}
                      </div>
                      <div class="divTableCell">{{ $game->bingo_cost_line1 }}</div>
                      <div class="divTableCell">{{ $game->bingo_cost_bingo }}</div>
                      <div class="divTableCell" id="{{ $game->idx }}">
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
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div><!-- End Col--> 
          </div><!-- End Row-->
      </div><!-- End Modal Body-->

    </div>
  </div>
</div>
</div>
<script>
    $(".up,.down").click(function() {
      var row = $(this).parents(".dataTableRow:first");
      if ($(this).is(".up")) {
          row.insertBefore(row.prev());
      } else {
          row.insertAfter(row.next());
      }
    });

    $(".top").click(function(){
      var row = $(this).parents(".divTableRow:first");
      // var data = {
      //     idx: row.attr('idx'),
      //     _token: $('meta[name="csrf-token"]').attr('content')
      // }
      // $.post('/casino/playlist/top', data, function(response) {
      //   console.log(response.msg, response.idx);
      // });

      row.insertAfter('.dataHeadingRow');
    });

    $(".remove").click(function() {
      var row = $(this).parents(".dataTableRow:first");
      // var data = {
      //     idx: row.attr('idx'),
      //     _token: $('meta[name="csrf-token"]').attr('content')
      // }
      // $.post('/casino/playlist/destroy', data, function(response) {
      //   console.log(response.msg, response.id);
      // });
      row.remove();
    });

</script>
<script>
$(document).ready(function() {

$('#send-button--{{ $template->template_id }}').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        method: 'POST',
        url: '/casino/template/game/store',
        data: {
             game_type: $('#editTemplateModal--{{ $template->template_id }} select[name="game_type"]').val(),
             ticket_cost: $('#editTemplateModal--{{ $template->template_id }} input[name="ticket_cost"]').val(),
             line_cost: $('#editTemplateModal--{{ $template->template_id }} input[name="line_cost"]').val(),
             bingo_cost: $('#editTemplateModal--{{ $template->template_id }} input[name="bingo_cost"]').val(),
             template_id: $('#editTemplateModal--{{ $template->template_id }} input[name="template_id"]').val(),
             _token: token,
          },
        success: function (response) {

            if(response.bingo_cost_line1_fixed === false) {
              var gameType = '<?php echo app('translator')->get('messages.Standard'); ?>';
            } else {
              var gameType = '<?php echo app('translator')->get('messages.Fixed'); ?>' ;
            }

            if(response.bingo_cost_line1_fixed === false && response.bingo_cost_bingo_fixed === false) {
               var bingoCostLine = "";
               var bingoCostBingo = "";
            } else {
              var bingoCostLine = response.bingo_cost_line1;
              var bingoCostBingo = response.bingo_cost_bingo;
            }

            $('.divTable').append('<div class="divTableRow"><div class="divTableCell">' + response.bingo_ticket_cost + '</div><div class="divTableCell">' + gameType + '</div><div class="divTableCell">' + bingoCostLine + '</div><div class="divTableCell">' + bingoCostBingo + '</div></div>');
        }, 
        error: function () {
          //
        }
    });
});

$('select[name="game_type"]').change(function () {
 var optionSelected = $(this).find("option:selected");
 var valueSelected  = optionSelected.val();

  if(valueSelected == 1) {
    $('#line-cost-form-group--{{ $template->template_id }}').show(100);
    $('#bingo-cost-form-group--{{ $template->template_id }}').show(100);
  }

  if(valueSelected == 0) {
    $('#line-cost-form-group--{{ $template->template_id }}').hide(100);
    $('#bingo-cost-form-group--{{ $template->template_id }}').hide(100);
  }
});

}); // End Document Ready
</script>

<style>
.divTable{
  display: table;
  width: 100%;
}
.divTableRow {
  display: table-row;
}
.divTableHeading {
  background-color: #EEE;
  display: table-header-group;
}
.divTableCell, .divTableHead {
  border: 1px solid #999999;
  display: table-cell;
  padding: 3px 10px;
}
.divTableHeading {
  background-color: #EEE;
  display: table-header-group;
  font-weight: bold;
}
.divTableFoot {
  background-color: #EEE;
  display: table-footer-group;
  font-weight: bold;
}
.divTableBody {
  display: table-row-group;
}
</style>
