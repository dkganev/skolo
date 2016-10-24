@include('modals.bingoHistory-modal')

<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li><a href="javascript:ajaxLoad('#')">Roulette</a></li>
              <li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>
              <li><a href="javascript:ajaxLoad('#')">Slots </a></li>
            </ul>
        </div>
        
    </div>
<div class="container-fluid">
<div class="row">
     <!--  page header -->
    <div class="col-md-12" >
    <a href="{{ route('export.terminals') }}" class="btn btn-warning  pull-right"><i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export</a>

        <h1 style="margin-top: 0px; color:white;" class="page-header">History Statistics</h1>

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
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"

                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[3, 5, 10, 15]"

                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th colspan="5"style='text-align: center !Important;'>Game Info</th>
                            <th colspan="2">Line</th>
                            <th colspan="2">Bingo</th>
                            <th colspan="2">My Bonus</th>
                            <th colspan="2">Bonus Line</th>
                            <th colspan="2">Bonus Bingo</th>
                            <th colspan="2">Jackpot Line</th>
                            <th colspan="2">Jackpot Bingo</th>
                            <th data-sortable="true" rowspan="2">Game<br/>Cancelled</th>
                        </tr>
                        <tr>
                            <th data-sortable="true">Time</th>
                            <th data-sortable="true">Game #</th>
                            <th data-sortable="true" >Ticket<br/>Cost</th>
                            <th data-sortable="true">Players</th>
                            <th data-sortable="true">Tickets</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th>
                            <th data-sortable="true">$</th>
                            <th data-sortable="true">at<br/>ball</th> 
                            <th data-sortable="true">$</th>
                            
                        </tr>
                        

                        <tbody>
                            @foreach($historys as $history)
                                <tr onclick="boxModalWindow()" id='Row{{ $history->bingo_seq }}' data_id='{{ $history->bingo_seq }}'  class="disableTextSelect offline bootstrap-modal-form-open" data-toggle="modal" data-target="#casinoTerminalInfo" onclick="boxModalWindow()" >
                       
                                    <td onclick='alert("qwe");'><?php echo date("Y-m-d H:i:s", strtotime($history->tstamp)); ?></td>
                                    <td> <a onclick='alert("qwe");'>{{ $history->bingo_seq }} </a> </td>
                                    <td><?php echo number_format($history->ticket_cost / 100, 2 ); ?></td>
                                    <td><div class='testrow'>{{ $history->players }}</div></td>
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
                    </thead>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div> <!--End Row -->
</div>

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

<script src="bootstrap-table/bootstrap-table.js"></script>

<script >
function boxModalWindow(bixID) {
    //$('#ModalBoxID').text(bixID);
    //$('#ModalCredit').text($("#box" + bixID + " .boxCdredit").text());
    //$('#ModalStatus').text($("#box" + bixID).attr('data_boxStatus'));
    alert("ttte");
    //alert($("#box" + bixID + " #boxCdredit").text()); data_boxStatus
}
    
$(".disableTextSelect").click(function() {
   alert("tes"); 
});



</script>