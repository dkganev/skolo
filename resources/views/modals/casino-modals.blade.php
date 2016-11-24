<!-- Add Casino  Modal -->
<div class="row">
<div class="modal fade" id="addCasinoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Add Casino</strong></h2>
      </div>
      <div class="modal-body">
          <form class="form-inline">
            <div class="form-group">
                <label for="casinoid">Casino ID:</label><br>
                <input  class="form-control" type="text" name="casinoid" id="casinoid" >
            </div>

            <div class="form-group">
                <label for="casinoname">Casino Name:</label><br>
                <input  class="form-control" type="text" name="casinoname" id="casinoname" placeholder="Name">
            </div>
            <hr>
            <div class="form-group">
                <label for="casinoaddr">Casino Address:</label><br>
                <input placeholder="Address" class="form-control" type="text" name="casinoaddr" id="casinoaddr">
            </div>

            <div class="form-group">
                <label for="casinogsm">Casino GSM:</label><br>
                <input placeholder="Mobile Number" class="form-control" type="text" name="casinogsm" id="casinogsm">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="add-casino" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Add Casino  Modal -->

<!-- Update Casino  Modal -->
<div class="row">
<div class="modal fade" id="updateCasinoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Update Casino</strong></h2>
      </div>
      
      <div class="modal-body">
          <form class="form-inline"> 
            <div class="form-group">
                <label for="casinoid">Casino ID:</label><br>
                <input  class="form-control" type="text" name="casinoid" id="casinoid" >
            </div>

            <div class="form-group">
                <label for="casinoname">Casino Name:</label><br>
                <input  class="form-control" type="text" name="casinoname" id="casinoname" placeholder="Name">
            </div>
            <hr>
            <div class="form-group">
                <label for="casinoaddr">Casino Address:</label><br>
                <input placeholder="Address" class="form-control" type="text" name="casinoaddr" id="casinoaddr">
            </div>

            <div class="form-group">
                <label for="casinogsm">Casino GSM:</label><br>
                <input placeholder="Mobile Number" class="form-control" type="text" name="casinogsm" id="casinogsm">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="update-casino" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Update Casino  Modal -->
<script>
$(function() {
  $('#add-casino').on('click', function() {
      var token = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          method: 'POST',
          url: '/settings/casino/store',
          data: { 
              casinoid: $('#addCasinoModal input[name="casinoid"]').val(),
              casinoname: $('#addCasinoModal input[name="casinoname"]').val(),
              casinoaddr: $('#addCasinoModal input[name="casinoaddr"]').val(),
              casinogsm: $('#addCasinoModal input[name="casinogsm"]').val(),
              _token: token
          }
      }).done(function() {
          $('#addCasinoModal').modal('hide')
          $('body').removeClass('modal-open')
          $('.modal-backdrop').remove()
          javascript:ajaxLoad('{{url('settings/casinos')}}')
      })
  })

  $('#updateCasinoModal').on('show.bs.modal', function(e) {
      var casinoId = $(e.relatedTarget).data('casinoid')
      var casinoName = $(e.relatedTarget).data('casinoname')
      var casinoAddr = $(e.relatedTarget).data('casinoaddr')
      var casinoGsm = $(e.relatedTarget).data('casinogsm')

      $(e.currentTarget).find('input[name="casinoid"]').val(casinoId)
      $(e.currentTarget).find('input[name="casinoname"]').val(casinoName)
      $(e.currentTarget).find('input[name="casinoaddr"]').val(casinoAddr)
      $(e.currentTarget).find('input[name="casinogsm"]').val(casinoGsm)
  })

  $('#update-casino').on('click', function() {
      var token = $('meta[name="csrf-token"]').attr('content')
      $.ajax({
          method: 'POST',
          url: '/settings/casino/update',
          data: {
              casinoid: $('#updateCasinoModal input[name="casinoid"]').val(),
              casinoname: $('#updateCasinoModal input[name="casinoname"]').val(),
              casinoaddr: $('#updateCasinoModal input[name="casinoaddr"]').val(),
              casinogsm: $('#updateCasinoModal input[name="casinogsm"]').val(),
              _token: token 
          }
      }).done(function() {
          $('#updateCasinoModal').modal('hide')
          $('body').removeClass('modal-open')
          $('.modal-backdrop').remove()
          javascript:ajaxLoad('{{url('settings/casinos')}}')
      })
  })

}) // <== End Document Ready
</script>