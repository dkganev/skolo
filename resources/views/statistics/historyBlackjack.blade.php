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
                            <th  >
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9'>
                                        <div class="" onclick="datetimepicker66(); ">
                                            <div class='input-group date' id='datetimepicker6'>
                                                
                                                <input id='datetimepicker6I' class="form-control" size="16" type="text" value="" onchange='datetimepicker6Close();' readonly>
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
                                        <div class="" onclick="datetimepicker77(); ">
                                            <div class='input-group date' id='datetimepicker7' style="margin-top: 3px;" >
                                                <input id='datetimepicker7I' class="form-control"  type='text' size="16" value="" onchange='datetimepicker7Close();' readonly />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center"  ><input type='number' style="color: #333" id='GameSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input type='number' style="color: #333" id='TableSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input type='number' style="color: #333" id='PSID' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9'>
                                        <div class="">
                                            <input type='number' style="color: #333" id='FromGameBet' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-9'>
                                        <div class="">
                                            <input type='number' style="color: #333" id='ToGameBet' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9'>
                                        <input type='number' style="color: #333" id='FromGameWin' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-9'>
                                        <input type='number' style="color: #333" id='ToGameWin' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                    </div>
                                </div>
                            </th>
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

<script >
var sortTimer;
function sortFunction(sValue, sColumn) {
    clearTimeout(sortTimer);
    sortTimer = setTimeout(function(){ 
        $(".faSpinnerBJ").show();
        $('#BJcards').hide();datetimepicker6I
        FromGameTs = $('#datetimepicker6I').val();
        ToGameTs = $('#datetimepicker7I').val();
        GameSort = $('#GameSort').val();
        TableSort = $('#TableSort').val();
        PSID = $('#PSID').val();
        FromGameBet = $('#FromGameBet').val();
        ToGameBet = $('#ToGameBet').val();
        FromGameWin = $('#FromGameWin').val();
        ToGameWin = $('#ToGameWin').val();
        token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'ajax_sortBJHistory',
            dataType: "json",
            data:{'FromGameTs': FromGameTs, 'ToGameTs': ToGameTs, 'GameSort':  GameSort, 'TableSort':  TableSort, 'PSID':  PSID, 'FromGameBet': FromGameBet, 'ToGameBet': ToGameBet, 'FromGameWin': FromGameWin, 'ToGameWin': ToGameWin, _token: token},
            success:function(data){
                if (data.success == "success"){
                    $('#tableBJ').html(data.html);
                    $('#datetimepicker6I').val(FromGameTs);
                    $('#datetimepicker7I').val(ToGameTs);
                    //$('#datetimepicker6').datetimepicker('setStartDate', FromGameTs);
                    $('#GameSort').val(GameSort);
                    $('#TableSort').val(TableSort);
                    $('#PSID').val(PSID);
                    $('#FromGameBet').val(FromGameBet);
                    $('#ToGameBet').val(ToGameBet);
                    $('#FromGameWin').val(FromGameWin);
                    $('#ToGameWin').val(ToGameWin);
                    
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
    
    //$('#datetimepicker6').on("click", function(){alert("test")});
    //$('#datetimepicker').data("DateTimePicker").FUNCTION();
    /*$(function () {
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
    //$(".form_datetime").datetimepicker({
        
    //datepicker: true

    //});
    //$(document).ready(function() {
     //   $('.form_datetime').datetimepicker();
    //});
            //$('#datetimepicker6').datetimepicker();
    
    function datetimepicker66() {
        $('.switch').attr('colspan', 5);
        $('#datetimepicker6').datetimepicker('show');
    }
    function datetimepicker77() {
        $('.switch').attr('colspan', 5);
        $('#datetimepicker7').datetimepicker('show');
    }
    
    function datetimepicker6Close() {
        $('#datetimepicker6').datetimepicker('hide');
        //$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        sortFunction(1, "datetimepicker6I");
       //alert(e.date);
        //$("#datetimepicker6").click();
    }
    
    function datetimepicker7Close() {
        $('#datetimepicker7').datetimepicker('hide');
        //sortFunction(1, "datetimepicker7I");
        //alert("test");
        //$("#datetimepicker6").click();
    }
    
    
    
/*$('#datetimepicker7I').on('change', function(ev){
    alert ("test");
//if (ev.date.valueOf() < date-start-display.valueOf()){
    //    ....
    //}
});
        $("#datetimepicker6").on("dp.change", function (e) {
            //$('#datetimepicker6').hide();
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            //$('#datetimepicker7').datetimepicker('hide');
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
  */
    $("#datetimepicker6").datetimepicker({
        //format: "dd MM yyyy - hh:ii",
        //autoclose: true,
        //todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
    });
    $('#datetimepicker7').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        //format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        //startDate: "2013-02-14 10:00",
        minuteStep: 10
    });
           
</script>            

