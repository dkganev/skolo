<!-- Edit Template Modal -->
<div class="row">
<div class="modal fade" id="editTemplateModal--{{ $template->template_id }}" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update Template</strong></h2>
      </div>
      

      <div class="modal-body">

          <div class="row">

            <div class="col-md-4">

              <form id="game-type-form--{{ $template->template_id }}" class="form-inline" style="padding-top: 15px;">
                <div style="width: 169px" class="form-group">
                  <label>Game Type: </label><br>
                  <select name="game_type" class="form-control selectpicker">
                    <option selected="true" disabled="disabled">Choose Game Type</option>
                      <option value="0">Standard</option>
                      <option value="1">Fixed</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="ticket_cost">Ticket Cost (cents):</label><br>
                  <input class="form-control" type="text" name="ticket_cost" id="ticket_cost--{{ $template->template_id }}">

                </div>

                <div id="line-cost-form-group--{{ $template->template_id }}"  class="form-group" style="display: none;">
                  <label>Line Cost (cents):</label><br>
                  <input class="form-control" type="text" name="line_cost">
                </div>

                <div id="bingo-cost-form-group--{{ $template->template_id }}" class="form-group" style="display: none;">
                  <label>Bingo Cost (cents):</label><br>
                  <input class="form-control" type="text" name="bingo_cost">
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">


                <input type="hidden" name="template_id" value="{{ $template->template_id }}">

                    <button id="send-button--{{ $template->template_id }}"
                        type="Submit"
                        style="margin-top: 25px;" 
                        class="btn btn-primary btn-sm form-control"
                >
                  Add
                </button>

                </form>
              </div><!-- End Col--> 

              <div class="col-md-8">
                <h4><strong>Games</strong></h4>
                <hr>

                <div class="divTable">
                  <div class="divTableBody">
                    <div class="divTableRow">
                      <div class="divTableCell"><strong>Ticket Cost (cents)</strong></div>
                      <div class="divTableCell"><strong>Game Type</strong></div>
                      <div class="divTableCell"><strong>Line Cost (cents)</strong></div>
                      <div class="divTableCell"><strong>Bingo Cost (cents)</strong></div>
                    </div>

                    @foreach($template->template_games as $game)
                    <div class="divTableRow">
                      <div class="divTableCell">{{ $game->bingo_ticket_cost }}</div>
                      <div class="divTableCell">{{ $game->bingo_cost_line1_fixed && $game->bingo_cost_bingo_fixed ? 'Fixed' : 'Standard'}}</div>
                      <div class="divTableCell">{{ $game->bingo_cost_line1 }}</div>
                      <div class="divTableCell">{{ $game->bingo_cost_bingo }}</div>
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
  $(document).ready(function() {

    $('#send-button--{{ $template->template_id }}').on('click', function() {
        // event.preventDefault();
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
          }
        })
        .done(function() {
          $('#editTemplateModal-{{ $template->template_id }}').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          javascript:ajaxLoad('{{url('/casino/templates')}}');
          // console.log('Success');
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

  });
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