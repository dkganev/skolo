<!-- Update Category Modal -->
<div class="row">
<div class="modal fade" id="updateMyBonus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update My Bonus</strong></h2>
      </div>
      
      <div class="modal-body">
          <form class="form-inline"> 

            <div class="form-group">
                <label for="ticket_cnt">ID:</label><br>
                <input disabled class="form-control" type="text" name="id" id="idx" placeholder="Cannot be edited" disabled>
            </div>

            <div class="form-group">
                <label for="ticket_cnt">Ticket Cost:</label><br>
                <input class="form-control" type="text" name="ticket_cnt" id="idx" placeholder="Cannot be edited">
            </div>

           
            <div class="form-group">
                <label for="name">Max Ball:</label><br>
                <input  class="form-control" type="text" name="max_ball_idx" id="name" placeholder="Category Name">
            </div>
             <hr>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="update-my-bonus" type="submit" class="btn btn-warning">Update</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
$('#update-my-bonus').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        method: 'POST',
        url: 'settings/bingo/mybonus/edit',
        data: {
            id: $('#updateMyBonus input[name="id"]').val(),
            ticket_cnt: $('#updateMyBonus input[name="ticket_cnt"]').val(),
            max_ball_idx: $('#updateMyBonus input[name="max_ball_idx"]').val() ,
            _token: token 
        } 
    })
    .done(function () {
          $('#updateMyBonus').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();

         javascript:ajaxLoad('{{url('/settings/bingo/mybonus')}}');
    });
});

$('#updateMyBonus').on('show.bs.modal', function(e) {
    //get data-* attributes of the clicked element
    var id = $(e.relatedTarget).data('id');
    var ticketCost = $(e.relatedTarget).data('ticket-cost');
    var maxBall = $(e.relatedTarget).data('max-ball');

    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="ticket_cnt"]').val(ticketCost);
    $(e.currentTarget).find('input[name="max_ball_idx"]').val(maxBall);

});
</script>