@include('modals.BJHistory-modal')
<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li ><a id="historyRoulette" href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
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
<div class="row">
    <div class='col-md-3'>
        From:
    </div>
    <div class='col-md-9'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>    
<div class="row">
    <div class='col-md-3'>
        To:
    </div>
    <div class='col-md-9'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
                <!--  -->
            </div>

                <div class="panel-body " id="tableBJ">
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
                            <th class="text-center" data-field="date" >
                            
                            
                            </th>
                            <th class="text-center"  ><input type='text' style="color: #333" id='GameSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input type='text' style="color: #333" id='TableSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input type='text' ></th>
                            <th class="text-center"  ><input type='text' ></th>
                            <th class="text-center"  ><input  type='submit' value="submit" style="color: #333" onclick='alert("test");'></th>
                        </tr>
                        <tr>
                            <th class="text-center" data-field="date" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-sortable="true">Game #</th>
                            <th class="text-center" data-align="right" data-sortable="true">Table ID</th>
                            <th class="text-center" data-align="right" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Bet</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Win</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->game_seq }}' data-id='{{ $history->game_seq }}' data-ts='{{ $history->ts }}' data-table='{{$history->table_idx }}' class="disableTextSelect offline bootstrap-modal-form-open rowsBJ" data-toggle="modal" data-target="#BJHistory_modal" >
                       
                                    <td><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                    <td>{{ $history->game_seq }}</td>
                                    <td>{{$history->table_idx + 1}}</td>
                                    <td><?php 
                                            $totalSeat_idArray = $history->getArraySeat_id();
                                            $n = 0;
                                            foreach ($totalSeat_idArray as $key => $val){
                                                if ($val != 0){
                                                    if ($n == 0){
                                                        $n = 1;
                                                    }else {
                                                        print (", ");
                                                    }
                                                    print  ($val);
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td><?php
                                            $totalBetArray = $history->getArrayBet();
                                            $dblArray = $history->getArrayDbl();
                                            $totalDblArray = array();
                                            foreach ($dblArray as $key => $val){
                                                foreach ($val as $keySub => $valSub){
                                                    if ($valSub == 1){
                                                        if (empty($totalDblArray[$key])){
                                                            $totalDblArray[$key] = $totalBetArray[$key];
                                                        }else{
                                                            $totalDblArray[$key] += $totalBetArray[$key];
                                                        }
                                                    }
                                                }
                                            }
                                            $insuranceArray = $history->getArrayInsurance();
                                            $totalInsuranceArray  = array();
                                            foreach ($insuranceArray as $key => $val){
                                                if ($val == 1){
                                                    $totalInsuranceArray[$key] = $totalBetArray[$key] / 2;
                                                }
                                            }
                                            $totalCards = $history->getArrayCards();
                                            $totalSplitArray = array();
                                            foreach ($totalCards as $keyP2 => $valP2){
                                                foreach ($valP2 as $keyP => $valP){
                                                    foreach ($valP as $key => $val){
                                                        if ($val != 0){
                                                            if ($keyP == 1){
                                                                $totalSplitArray[$keyP2] = $totalBetArray[$keyP2] ;    
                                                            }else{
                                                                //$totalSplitArray[$keyP2] = 0;
                                                            }
                                                        }
                                                    }
                                                }
                                            }    
       
                                            
                                            $totalBet = array_sum($totalBetArray) + array_sum($totalDblArray) + array_sum($totalInsuranceArray)  + array_sum($totalSplitArray);
                                            print (number_format($totalBet / 100, 2));
                                        ?>
                                    </td>
                                    <td><?php 
                                            $totalWinArray = $history->getArrayWin();
                                            $totalWin = array_sum($totalWinArray);
                                            print (number_format($totalWin / 100, 2));
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
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/datetimepicker/latest/DateTimePicker.min.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/datetimepicker/latest/DateTimePicker.min.js"></script>
<script >
var sortTimer;
function sortFunction(sValue, sColumn) {
    clearTimeout(sortTimer);
    sortTimer = setTimeout(function(){ 
        $(".faSpinnerBJ").show();
        $('#BJcards').hide();
        token = $('meta[name="csrf-token"]').attr('content');
        GameSort = $('#GameSort').val();
        TableSort = $('#TableSort').val();
        $.ajax({
            type:'POST',
            url:'ajax_sortBJHistory',
            dataType: "json",
            data:{'GameSort':  GameSort, 'TableSort':  TableSort, _token: token},
            success:function(data){
                if (data.success == "success"){
                    $('#tableBJ').html(data.html);
                    $('#GameSort').val(GameSort);
                    $('#TableSort').val(TableSort);
                   
                    
                }
                $(".faSpinnerBJ").hide();
            },
            error: function (error) {
                alert ("Unexpected wrong.");
                $(".faSpinnerBJ").hide();
            
            }
        
        });
        //alert(sColumn );
        //var href = $('#historyRoulette').attr('href') + "?val=test";
         
        //window.location.href = href; 
    
    }, 500);
    
    
}
    $('#datetimepicker6').on("click", function(){alert("test")});
    /*$('#datetimepicker').data("DateTimePicker").FUNCTION();
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });*/


</script>