@include('modals.reset-ps-modal')
@include('modals.terminal-modals')

<div class="container">
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
   
                <button class="btn btn-danger btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal">
                    Add Machine
                </button>
                
                <h2 style="display: inline; color: #444649; font-family: 'italic';  padding-left: 35%;">
                    Terminals
                </h2>

                <a href="{{ route('export.terminals') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                </a>
            </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-show-columns="true"
                            data-search="true"
                            data-show-toggle="true"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Machine ID</th>
                            <th data-sortable="true">Unique ID</th>
                            <th data-sortable="true">Seat ID</th>
                            <th data-sortable="true">Description</th>
                            <th data-sortable="true">Type</th>
                            <th data-sortable="true">Status</th>
                            <th data-sortable="true">IP Adress</th>
                            <th data-sortable="true">Casino</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($server_ps as $ps)
                        <tr>
                            <td>{{ $ps->dallasid }}</td>
                            <td>{{ $ps->psid }}</td>
                            <td>{{ $ps->seatid }}</td>
                            <td>{{ $ps->ps_settings->psdescription }}</td>
                            <td>
                                {{  $ps->ps_settings->ps_type === 0 ? "PlayStation" : (
                                    $ps->ps_settings->ps_type === 1 ? "Statistics" : (
                                    $ps->ps_settings->ps_type === 2 ? "Sphere" : (
                                    $ps->ps_settings->ps_type === 3 ? "Balls" : (
                                    $ps->ps_settings->ps_type === 4 ? "Wheel" : (
                                    $ps->ps_settings->ps_type === 5 ? "Statistic RLT" : (
                                    $ps->ps_settings->ps_type === 6 ? "Jackpot Statistic" : 0 ))))))
                                }}
                            </td>
                            <td>
                                <span id='Status{{ $ps->psid }}' style="color: {{ $ps->ps_status->bonline ? 'green' : 'red' }} ;">
                                        {{ $ps->ps_status->bonline ? 'Online' : 'Offline'}}
                                </span>
                            </td>
                            <td>{{ $ps->ps_status->ip }}</td>
                            <td>{{ $ps->casino->casinoname }}</td>
                            <td>
                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateMachineModal-{{ $ps->psid }}"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    data-games="{{ $ps->ps_settings->subscribed }}"
                                    class="btn btn-primary btn-xs"
                                >
                                Edit
                                </a>
                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#resetPsModal"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    class="btn btn-warning btn-xs"
                                >  
                                Restart
                                </a>

                                <a  href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#deletePsModal"
                                    data-psid="{{ $ps->psid }}"
                                    data-dallasid="{{ $ps->dallasid }}"
                                    class="btn btn-danger btn-xs"
                                >
                                Delete
                                </a>

                            </td>
                        </tr>
                    @include('modals.terminal-update-modal')
                    @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
</div> <!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>

<!-- Add Game Client Modal -->
<div class="row">
<div class="modal fade" id="deletePsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h2><strong>Delete Terminal</strong></h2>
      </div>
      
      <div class="modal-body">
          <h4>Delete Terminal <span id="dallasid"></span>  ?</h4>
      </div>
      <div class="modal-footer">
          <input  type="hidden" name="psid">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="delete-ps" type="submit" class="btn btn-warning">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>


<script src="/js/socket.io/socket.io.js"></script>
<script src="/js/socket.io/setingsTerminals.js"></script>
<script>
$(document).ready(function() {

    // POPULATE DELETE PS MODAL
    $('#deletePsModal').on('show.bs.modal', function(e) {
        var psId = $(e.relatedTarget).data('psid');
        var dallasid = $(e.relatedTarget).data('dallasid');

        $(e.currentTarget).find('span').html(dallasid);
        $(e.currentTarget).find('input[name="psid"]').val(psId);
    });

    // SUBMIT PS DELETE MODAL
    $('#delete-ps').on('click', function() {
        $.ajax({
            method: 'POST',
            url: '/terminal/destroy',
            data: {
                psid: $('#deletePsModal input[name="psid"]').val(),
                _token: token
            }
        })
        .done(function() {
            $('#deletePsModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            javascript:ajaxLoad('{{url('/settings/terminals')}}');
        });
    });

    // RESTART TERMINAL
     $('#resetPsModal').on('show.bs.modal', function(e) {
        var psId = $(e.relatedTarget).data('psid');
        var dallasid = $(e.relatedTarget).data('dallasid');

        $(e.currentTarget).find('span').html(dallasid);
        $(e.currentTarget).find('input[name="psid"]').val(psId);
    });

    $('#reset-ps').on('click', function() {
         $.ajax({
             method: 'GET',
             url: reset_ps,
             data: {
                 psid: $('#resetPsModal input[name="psid"]').val(),
                 _token: token
            }
         })
         .done(function() {
             console.log('success');
             $('#resetPsModal').modal('hide');
             window.location.reload();
         });
    });

}); // <== End Document Ready
</script>