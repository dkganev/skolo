<!-- Add Casino  Modal -->
<div class="row">
<div class="modal fade" id="addMaxBallsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>@lang('messages.Add Max Balls')</strong></h2>
      </div>
      
      <form class="form-inline" action="/settings/bingo/maxballs/store" method="POST">
          {{ csrf_field() }}

      <div class="modal-body">

        <div class="form-group">
          <label>@lang('messages.Ticket Cost')</label><br>
          <input style="width:150px; height: 30px;" name="bingo_ticket_cost" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>@lang('messages.JL. Max Ball')</label><br>
          <input style="width:150px; height: 30px;" name="jackpot_line_max_ball"  type="text" class="form-control">
        </div>
        
        <div class="form-group">
          <label>@lang('messages.JB. Max Ball')</label><br>
          <input style="width:150px; height: 30px;" name="jackpot_bingo_max_ball"  type="text" class="form-control">
        </div>
        
        <div class="form-group">
          <label>@lang('messages.BL. Max Ball')</label><br>
          <input style="width:150px; height: 30px;" name="bonus_line_max_ball"  type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>@lang('messages.BB. Max Ball')</label><br>
          <input style="width:150px; height: 30px;" name="bonus_bingo_max_ball"  type="text" class="form-control">
        </div>
      
        <hr><br>

        <div class="form-group">
          <label>@lang('messages.JL. Ticket Count')</label><br>
          <input style="width:150px; height: 30px;" name="jackpo_line_ticket_cnt" type="text" class="form-control">
        </div> 

        <div class="form-group">
          <label>@lang('messages.JB. Ticket Count')</label><br>
          <input style="width:150px; height: 30px;" name="jackpo_bingo_ticket_cnt" type="text" class="form-control">
        </div>

        <div class="form-group"> 
          <label>@lang('messages.BL. Ticket Count')</label><br>
          <input style="width:150px; height: 30px;" name="bonus_line_ticket_cnt" type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>@lang('messages.BB. Ticket Count')</label><br>
          <input style="width:150px; height: 30px;" name="bonus_bingo_ticket_cnt"  type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>@lang('messages.Fixed Cost')</label>
          <input name="bingo_cost_fixed" type="checkbox">
        </div>

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
            <button name="Submit" value="Login" type="Submit" style="width:315px; margin-left: 17px;" 
                    type="submit" class="btn btn-danger"
                    >
                      @lang('messages.Save')
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Add Game Client Modal -->
<div class="row">
<div class="modal fade" id="deleteMaxBallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>@lang('messages.Delete Max Bal')</strong></h2>
      </div>
      
      <div class="modal-body">

          <h4>@lang('messages.Delete Max Bal') <span id="ball"></span>  ?</h4>

      </div>
      <div class="modal-footer">
          <input  type="hidden" name="id">
          <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close')</button>
          <button id="delete-max-ball" type="submit" class="btn btn-warning">@lang('messages.Delete')</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  // RESTART TERMINAL
   $('#deleteMaxBallModal').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');

      $(e.currentTarget).find('span').html(id);
      $(e.currentTarget).find('input[name="id"]').val(id);
  });

  $('#delete-max-ball').on('click', function() {
      var token = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
           method: 'POST',
           url: 'settings/bingo/maxballs/destroy',
           data: { 
              id: $('#deleteMaxBallModal input[name="id"]').val(),
              _token: token
          } 
       })
      .done(function() {
          $('#deleteMaxBallModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
            
          javascript:ajaxLoad('{{url('/settings/bingo/maxballs')}}')
      });
  });

</script>
