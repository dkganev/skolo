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
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9'>
                                        <div class="" onclick="datetimepicker66(); ">
                                            <div class='input-group date' id='datetimepicker6'>
                                                
                                                <input id='datetimepicker6I' class="form-control" size="16" type="text" value="" onchange='datetimepicker6Close();' >
                                                <span class="add-on"><i class="icon-remove"></i></span>
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
                                                <input id='datetimepicker7I' class="form-control"  type='text' size="16" value="" onchange='datetimepicker7Close();' />
                                                <span class=" add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center"  ><input class="form-control" type='number' style="color: #333" id='GameSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input class="form-control" type='number' style="color: #333" id='TableSort' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  ><input class="form-control" type='number' style="color: #333" id='PSID' oninput='sortFunction($(this).val(), $(this).attr("id") );'></th>
                            <th class="text-center"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-9' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-9' >
                                        <input class="form-control" type='number' style="color: #333" id='FromGameWin' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-9' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" id='ToGameWin' oninput='sortFunction($(this).val(), $(this).attr("id") );'>
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
                                <?php
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
                                            //print (number_format($totalBet / 100, 2));
                                        
                                            $totalWinArray = $history->getArrayWin();
                                            $totalWin = array_sum($totalWinArray);
                                            //print (number_format($totalWin / 100, 2));
                                            $totalSeat_idArray = $history->getArraySeat_id();
                                            $n = 0;
                                            $totalSeat_idStr = "";
                                            foreach ($totalSeat_idArray as $key => $val){
                                                if ($val != 0){
                                                    if ($n == 0){
                                                        $n = 1;
                                                    }else {
                                                        //print (", ");
                                                        $totalSeat_idStr .= ", ";
                                                    }
                                                    //print  ($val);
                                                    $totalSeat_idStr .= $val ;
                                                }
                                            }
                                ?>
                                @if (($totalWin >= $dataArray['FromGameWin'] &&  ($totalWin <= $dataArray['ToGameWin'] || $dataArray['ToGameWin'] == 0)) && 
                                     ($totalBet >= $dataArray['FromGameBet'] &&  ($totalBet <= $dataArray['ToGameBet'] || $dataArray['ToGameBet'] == 0)) &&
                                     (in_array($dataArray['PSID'], $totalSeat_idArray) || $dataArray['PSID'] == 0))
                                <tr id='Row{{ $history->game_seq }}' data-id='{{ $history->game_seq }}' data-ts='{{ $history->ts }}' data-table='{{$history->table_idx }}' class="disableTextSelect offline bootstrap-modal-form-open rowsBJ" data-toggle="modal" data-target="#BJHistory_modal" >
                       
                                    <td><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                    <td>{{ $history->game_seq }}</td>
                                    <td>{{$history->table_idx + 1}}</td>
                                    <td>{{$totalSeat_idStr}}</td>
                                    <td>{{number_format($totalBet / 100, 2)}}</td>
                                    <td>{{number_format($totalWin / 100, 2)}}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                </table>
                <link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
                <script src="bootstrap-table/bootstrap-table.js"></script>
                