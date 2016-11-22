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
<script>
    var token = '{{ Session::token() }}';
    var add_casino = '{{ route('add.casino') }}';
</script>
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
<script>
    var token = '{{ Session::token() }}';
    var update_casino = '{{ route('update.casino') }}';
</script>
<!-- End Update Casino  Modal -->