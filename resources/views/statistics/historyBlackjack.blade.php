@include('modals.BJHistory-modal')
<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li ><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
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

        <h1 style="margin-top: 0px; color:white;" class="page-header">Blackjack History Statistics</h1>

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
                            <th class="text-center" data-field="date" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-sortable="true">Game #</th>
                            <th class="text-center" data-align="right" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-sortable="true">Terminals</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Bet</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Win</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->game_seq }}' data-id='{{ $history->game_seq }}' data-ts='{{ $history->ts }}'  class="disableTextSelect offline bootstrap-modal-form-open rowsBJ" data-toggle="modal" data-target="#BJHistory_modal" >
                       
                                    <td><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                    <td>{{ $history->game_seq }}</td>
                                    <td>{{$history->table_idx + 1}}</td>
                                    <td><?php 
                                            $totalBetStr = $history->seat_id; 
                                            $totalBetStr = str_replace("{","",$totalBetStr);
                                            $totalBetStr = str_replace("}","",$totalBetStr);
                                            $totalBetArray = explode(',', $totalBetStr);
                                            $n = 0;
                                            foreach ($totalBetArray as $key => $val){
                                                if ($val != 0){
                                                    if ($n == 0){
                                                        $n = 1;
                                                    }else {
                                                        print (", ");
                                                    }
                                                    print  ($val);
                                                    
                                                    
                                                }
                                                //$totalWin1 += parseInt($val);
                                            }
                                            //print ($totalBet);
                                        ?>
                                    </td>
                                    <td><?php 
                                            $totalBetStr = $history->bet; 
                                            $totalBetStr = str_replace("{","",$totalBetStr);
                                            $totalBetStr = str_replace("}","",$totalBetStr);
                                            $totalBetArray = explode(',', $totalBetStr);
                                            $totalBet = 0;
                                            foreach ($totalBetArray as $val){
                                                $totalBet += $val;
                                                //$totalWin1 += parseInt($val);
                                            }
                                            print ($totalBet);
                                        ?>
                                    </td>
                                    <td><?php 
                                            $totalWinStr = $history->win; 
                                            $totalWinStr = str_replace("{","",$totalWinStr);
                                            $totalWinStr = str_replace("}","",$totalWinStr);
                                            $totalWinArray = explode(',', $totalWinStr);
                                            $totalWin = 0;
                                            foreach ($totalWinArray as $val){
                                                $totalWin += $val;
                                                //$totalWin += parseInt($val);
                                            }
                                            print ($totalWin);
                                        ?>
                                    </td>
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
$(document).on("click","tr.rowsBJ td", function(e){
    //alert(e.target.innerHTML);
    //console.log( $(this).parent("tr").attr('data-id'));
    rowID = parseInt($(this).parent("tr").attr('data-id'));
    rowTS = $(this).parent("tr").attr('data-ts');
    token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:'POST',
        url:'ajax_statBJHistory',
        dataType: "json",
        data:{'rowID': rowID, 'rowTS': rowTS, _token: token},
        success:function(data){
            if (data.success == "success"){
                $('#BJcards').html(data.html); //seatid
                $('#BJHead').html(data.seatid);
                $('#totalBet').html(data.totalBet);
                $('#totalWin').html(data.totalWin);
                
            }
        },
        error: function (error) {
            alert ("Unexpected wrong.");
        }
        
    });

    
});    


</script>