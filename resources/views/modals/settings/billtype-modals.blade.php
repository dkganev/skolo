<!-- Add Bill Type Modal -->
<div class="row">
<div class="modal fade" id="addBillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong>+ Add Billing Type</strong></h2>
      </div>
      <div class="modal-body">
        <form class="form-inline" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="idtype">Bill ID:</label><br>
                <input class="form-control" type="text" name="idtype" id="idtype" placeholder="ID Type">
            </div>

            <div class="form-group">
                <label for="billname">Bill Name: </label><br>
                <input class="form-control" type="text" name="billname" id="billname" placeholder="Bill Name">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="add-bill" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Add Bill Type Modal -->

<!-- Update Bill Type Modal -->
<div class="row">
<div class="modal fade" id="updateBillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2><strong> Update Billing Type</strong></h2>
      </div>
      <div class="modal-body">
        <form class="form-inline" role="form" method="POST" name="server-modal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="idtype">Bill ID:</label><br>
                <input disabled class="form-control" type="text" name="idtype" id="idtype" placeholder="ID Type">
            </div>

            <div class="form-group">
                <label for="billname">Bill Name: </label><br>
                <input class="form-control" type="text" name="billname" id="billname" placeholder="Bill Name">
            </div>
            <hr>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="update-bill" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Update Bill Type Modal -->
<script>
$(function() {
    $('#add-bill').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '/settings/addBill',
            data: {
                idtype: $('#addBillModal input[name="idtype"]').val() ,
                billname: $('#addBillModal input[name="billname"]').val() ,
                _token: token
            }
        }).done(function() {
            $('#addBillModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('settings/billtypes')}}')
        });
    });

    $('#updateBillModal').on('show.bs.modal', function(event) {
        var idType = $(event.relatedTarget).data('idtype');
        var billName = $(event.relatedTarget).data('billname');

        //populate the textbox
        $(event.currentTarget).find('input[name="idtype"]').val(idType);
        $(event.currentTarget).find('input[name="billname"]').val(billName);
    });

    $('#update-bill').on('click', function() {
        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            method: 'POST',
            url: '/settings/updateBill',
            data: {
                idtype: $('#updateBillModal input[name="idtype"]').val() ,
                billname: $('#updateBillModal input[name="billname"]').val() ,
                _token: token
            }
        }).done(function() {
            $('#updateBillModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('settings/billtypes')}}')
        });
    });

}); // <== End Document Ready
</script>