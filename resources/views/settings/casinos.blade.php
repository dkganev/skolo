@include('modals.casino-modals')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1 style="margin-top: 0px;" class="page-header">Casinos</h1>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addCasinoModal">
                    Add Casino 
                </button>
                <a href="{{ route('export.casinos') }}" class="btn btn-primary btn-sm pull-right">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i>  Export
                </a>
            </div>
            <div class="panel-body">
                <table class="table table-striped  table-hover data-table-table"
                    data-toggle="table"
                    data-sortable="true"
                    data-show-columns="true"
                    data-search="true"
                    data-show-toggle="true"  

                    data-show-pagination-switch="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-page-list="[3, 6, 9]"
                  >
                    <thead class="w3-blue-grey">
                        <tr>
                            <th data-sortable="true">Casino ID</th>
                            <th data-sortable="true">Casino Name</th>
                            <th data-sortable="true">Casino Address</th>
                            <th data-sortable="true">Casino GSM</th>
                            <th data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($casinos as $casino)
                        <tr>
                            <td>{{ $casino->casinoid }}</td>
                            <td>{{ $casino->casinoname }}</td>
                            <td>{{ $casino->casinoaddr }}</td>
                            <td>{{ $casino->casinogsm }}</td>
                            <td>
                                <a href="" role="button" data-toggle="modal"
                                    data-toggle="modal"
                                    data-target="#updateCasinoModal"
                                    data-casinoid="{{ $casino->casinoid }}"
                                    data-casinoname="{{ $casino->casinoname }}"
                                    data-casinoaddr="{{ $casino->casinoaddr }}"
                                    data-casinogsm="{{ $casino->casinogsm }}"
                                >
                                    <span><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div><!--End Col -->
</div><!--End Row -->
</div><!--End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>
<script>
$(document).ready(function(){

// CASINO JQUERY AJAX
$('#add-casino').on('click', function() {
    $.ajax({
        method: 'POST',
        url: add_casino,
        data: { 
            casinoid: $('#addCasinoModal input[name="casinoid"]').val() ,
            casinoname: $('#addCasinoModal input[name="casinoname"]').val() ,
            casinoaddr: $('#addCasinoModal input[name="casinoaddr"]').val() ,
            casinogsm: $('#addCasinoModal input[name="casinogsm"]').val() ,
            _token: token 
        } 
    })
    .done(function (msg) {
        console.log(msg['message']);
        $('#addCasinoModal').modal('hide');
        window.location.reload();
    });
});

// Populate Update Game Client  Modal
$('#updateCasinoModal').on('show.bs.modal', function(e) {

    //get data-* attributes of the clicked element
    var casinoId = $(e.relatedTarget).data('casinoid');
    var casinoName = $(e.relatedTarget).data('casinoname');
    var casinoAddr = $(e.relatedTarget).data('casinoaddr');
    var casinoGsm = $(e.relatedTarget).data('casinogsm');

    //populate the textbox
    $(e.currentTarget).find('input[name="casinoid"]').val(casinoId);
    $(e.currentTarget).find('input[name="casinoname"]').val(casinoName);
    $(e.currentTarget).find('input[name="casinoaddr"]').val(casinoAddr);
    $(e.currentTarget).find('input[name="casinogsm"]').val(casinoGsm);
});

$('#update-casino').on('click', function() {
    $.ajax({
        method: 'POST',
        url: update_casino,
        data: { 
            casinoid: $('#updateCasinoModal input[name="casinoid"]').val() ,
            casinoname: $('#updateCasinoModal input[name="casinoname"]').val() ,
            casinoaddr: $('#updateCasinoModal input[name="casinoaddr"]').val() ,
            casinogsm: $('#updateCasinoModal input[name="casinogsm"]').val() ,
            _token: token 
        } 
    })
    .done(function (msg) {
        console.log(msg['message']);
        $('#updateCasinoModal').modal('hide');
        window.location.reload();
    });
});

}); // <== End Document Ready
</script>
