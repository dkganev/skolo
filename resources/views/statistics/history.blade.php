@include('modals.bingoHistory-modal')
@include('modals.bingoHistory2-modal')

<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
              <li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>
              <li><a href="javascript:ajaxLoad('#')">Slots </a></li>
            </ul>
        </div>
        
    </div>
<div class="container-fluid">
<div class="row">
     <!--  page header -->
    <div class="col-md-12" >
    <a href="{{ route('export.history') }}" class="btn btn-warning  pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>

        <h1 style="margin-top: 0px; color:white;" class="page-header">Bingo History Statistics</h1>

    </div>
     <!-- end  page header -->
</div>

<div class="row" >
    <div class="col-md-12">

        <div class="panel panel-default" >
            <div class="panel-heading">
                <!--  -->
            </div>

                <div class="panel-body" >
                    <table id="example" class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"

                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[3, 5, 10, 15, 50]"

                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th colspan="5" class="text-center" style='text-align: center !Important; '>Game Info</th>
                            <th colspan="2" class="text-center">Line</th>
                            <th colspan="2" class="text-center">Bingo</th>
                            <th colspan="2" class="text-center">My Bonus</th>
                            <th colspan="2" class="text-center">Bonus Line</th>
                            <th colspan="2" class="text-center">Bonus Bingo</th>
                            <th colspan="2" class="text-center">Jackpot Line</th>
                            <th colspan="2" class="text-center">Jackpot Bingo</th>
                            <th rowspan="2" class="text-center" data-field="sort20" data-sortable="true" >Game<br/>Cancelled</th>
                        </tr>
                        <tr>
                            <th class="text-center" data-field="date" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-field="id" data-sortable="true" tabindex="0"  data-sort-order="asc">Game #</th>
                            <th class="text-center" data-align="right" data-field="id1" data-sortable="true" >Ticket<br/>Cost</th>
                            <th class="text-center" data-align="right" data-field="id2" data-sortable="true">Players</th>
                            <th class="text-center" data-align="right" data-field="id3" data-sortable="true">Tickets</th>
                            <th class="text-center" data-align="right" data-field="id4" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort7" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort8" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort9" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort10" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort11" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort12" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort13" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort14" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort15" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort16" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="sort17" data-sortable="true">$</th>
                            <th class="text-center" data-align="right" data-field="sort18" data-sortable="true">at<br/>ball</th> 
                            <th class="text-center" data-align="right" data-field="sort19" data-sortable="true">$</th>
                            
                            
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->bingo_seq }}' data-id='{{ $history->bingo_seq }}'  class="disableTextSelect offline bootstrap-modal-form-open rows" data-toggle="modal" data-target="#bingoHistory_modal" >
                       
                                    <td><?php echo date("Y-m-d H:i:s", strtotime($history->tstamp)); ?></td>
                                    <td>{{ $history->bingo_seq }}</td>
                                    <td><?php echo number_format($history->ticket_cost / 100, 2 ); ?></td>
                                    <td>{{ $history->players }}</td>
                                    <td>{{ $history->tickets }}</td>
                                    <td>{{ $history->line }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 1)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->bingo }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 2)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->mybonus }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 7)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->bonus_line }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 3)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->bonus_bingo }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 4)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->jackpot_line }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 5)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->jackpot_bingo }}</td>
                                    <td><?php echo number_format($history->BingoWins_History->where('win_type', 6)->sum('win_val') / 100, 2 ); ?></td>
                                    <td>{{ $history->BingoWins_History->where('win_type', 8)->count() ? "Game Cancelled" : ' ' }}</td>
                              
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>

<script >
var firstClick = 0;
$(document).on("click","tr.rows td", function(e){
    //console.log( $(this).parent("tr").attr('data-id'));
    boxID = parseInt($(this).parent("tr").attr('data-id'));
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBingoHistory',
        dataType: "json",
        data:{'boxID': boxID , _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#bingoPurchase_History').html(data.html);
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });

    
});

//$(document).ready(function() {
    
   // $('#example').DataTable( {
        //initComplete: function () {
           // this.api().columns().every( function () {
                //var column = this;
                //var select = $('<select><option value=""></option></select>')
                   // .appendTo( $(column.footer()).empty() )
                    //.on( 'change', function () {
                   //     var val = $.fn.dataTable.util.escapeRegex(
                    //        $(this).val()
                    //    );
 
                     //   column
                    //        .search( val ? '^'+val+'$' : '', true, false )
                    //        .draw();
                   //} );
 
               // column.data().unique().sort().each( function ( d, j ) {
                    //select.append( '<option value="'+d+'">'+d+'</option>' )
               // } );
           // } );
       // }
   // } );
//} );
/*function boxModalWindow(boxID) {
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBingoHistory',
        dataType: "json",
        data:{'boxID': boxID , _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#bingoPurchase_History').html(data.html);
               //alert(boxID); 
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });
    
}
*/    
function boxModalWindow2(bingo_seq, psid) {
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBingoHistoryTickets',
        dataType: "json",
        data:{'bingo_seq': bingo_seq, "psid": psid, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#ticketNumber').html(data.server_ps_seatid);
                $('#gameNumber').html(bingo_seq);
                $('#balsHistory').html(data.BingoBallsHTML);
                $('#psTicketsArchive').html(data.psTicketsArchiveHTML);
                
                $('#bingoTickets_History').html(data.html);
               //alert(boxID); balsHistory
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });
    
}
    



</script>