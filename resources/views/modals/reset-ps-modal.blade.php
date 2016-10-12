<!-- Add Game Client Modal -->
<div class="row">
<div class="modal fade" id="resetPsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Restart Terminal</strong></h2>
      </div>
      
      <div class="modal-body">

          <h4>Restart Terminal <span id="dallasid"></span>  ?</h4>

      </div>
      <div class="modal-footer">
          <input  type="hidden" name="psid">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="reset-ps" type="submit" class="btn btn-warning">Restart</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var reset_ps = '{{ url('/resetps') }}';
</script>