@include('modals.BJHistory-modal')
<div class="container">
<div class=""> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li> -->
              <li ><a id="historyRoulette" href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li class="active"><a id="historyBlackjack" href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Slots </a></li>-->
            </ul>
        </div>
</div>


<div class="row" >
    <div class="col-md-12" style="width: 1000px">

        <div class="panel panel-default" >
            <div class="panel-heading">
                <div>
                    <h2 class='text-center' style="display: inline; color: #444649; font-family: 'italic';  padding-left: 20%;">
                        Blackjack History Statistics
                    </h2>
                    <a class="btn btn-warning  pull-right" onclick="export2excelBJ();">
                        <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                    </a>
                </div> <br />
                <div class="pull-left pagination-detail">
                     <!-- <span class="pagination-info">Showing 1 page</span> -->
                    <span class="page-list">
                        <span class="btn-group dropup">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="page-size">{{$page['rowsPerPage']}}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{$page['rowsPerPage'] == 20 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageF(20)">20</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageF(50)">50</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageF(100)">100</a>
                                </li>
                            </ul>
                        </span>
                        rows per page
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pagination" style="margin: 0px; "> <!--$page['current']  $historys->currentPage() $page['last'] $historys->lastPage()-->
                    <input id="pageReload" type="hidden" val="" data-page="{{$page['current']}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}" data-excel-url="{{ route('export2excelBJ') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$page['last']  )
                            <li class="page-number active" >
                                <a onclick="changePageNum(1)">1</a>
                            </li>
                        @endif
                        @if ( $page['last'] != 1  )
                            @if ($page['last'] < 6) 
                                @for ($i = 1; $i < $page['last']; $i++)
                                    <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                        <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $page['current'] > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNum({{ $page['current']-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $page['current'] >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNum(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif
                                    
                            
                            
                            
                                @if ( $page['current'] == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] == 2 || $page['current'] == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $page['current'] > 3 && $page['current'] < $page['last'] - 2  )
                                    @for ($i = $page['current'] - 2 ; $i < $page['current'] + 3; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}" >
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] == $page['last'] - 1 || $page['current'] == $page['last'] - 2)
                                    @for ($i = $page['last'] - 5 ; $i < $page['last'] + 1; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }} " >
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $page['current'] == $page['last'])
                                    @for ($i = $page['last'] - 4 ; $i < $page['last']+1; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] < $page['last'] - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNum({{ $page['last'] }})" >{{ $page['last']}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $page['current'] < $page['last'])
                                    <li class="page-next">
                                        <a onclick="changePageNum({{ $page['current'] + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNum({{ $page['current'] }})" >{{$page['current']}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!--<button class="btn btn-danger btn-sm bootstrap-modal-form-open" style="visibility: hidden"> Add Machine </button> -->
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <!--<a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page=2&rowsPerPage=50')" class="btn btn-success RouletteSort" >test</a> -->
                    <a class="btn btn-success RouletteSort" style="display: none;" onclick="changePageSortMenu();"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-default RouletteSort" style="display: none;" onclick="cleanSortFunction();"><i class="fa fa-close" aria-hidden="true"></i></a> 
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuBJ();">
                       Sort Menu
                       <span class="caret"></span>
                    </button>
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
                            data-page-list="[20, 50, 100]"
                            data-page-size="20"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        
                        <tr>
                            <th  class='text-center RouletteSort col-md-3' style="display: none;">
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker66(); ">
                                            <div class='input-group date' id='datetimepicker6'>
                                                
                                                <input id='datetimepicker6I' class="form-control" size="16" type="text" value="{{$page['FromGameTs'] == "" ? "" : $page['FromGameTs']}}"  onchange='datetimepicker6Close();' readonly>
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
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker77(); ">
                                            <div class='input-group date' id='datetimepicker7' style="margin-top: 3px;" >
                                                <input id='datetimepicker7I' class="form-control"  type='text' size="16" value="{{$page['ToGameTs'] == "" ? "" : $page['ToGameTs']}}"  onchange='datetimepicker7Close();' readonly />
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" id='GameSort' value="{{$page['GameSort'] == "" ? "" : $page['GameSort']}}" ></th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" id='TableSort' value="{{$page['TableSort'] == "" ? "" : $page['TableSort']}}" ></th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" value="{{$page['PSID'] == "" ? "" : $page['PSID']}}" id='PSID' ></th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" value="{{$page['SeatID'] == "" ? "" : $page['SeatID']}}" id='SeatID' ></th>
                            <th class="text-center RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromGameBet'] == "" ? "" : $page['FromGameBet']}}" id='FromGameBet' '>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToGameBet'] == "" ? "" : $page['ToGameBet']}}" id='ToGameBet'>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['FromGameWin'] == "" ? "" : $page['FromGameWin']}}" id='FromGameWin' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['ToGameWin'] == "" ? "" : $page['ToGameWin']}}" id='ToGameWin' >
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center" data-field="id101" data-sortable="true" onclick="changePageSort('ts', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Time<i class="fa {{ $page['OrderQuery'] == 'ts' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th> 
                            <th class="text-center" data-align="right" data-field="id102" data-sortable="true" onclick="changePageSort('game_seq', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}' );">Game # <i class="fa {{ $page['OrderQuery'] == 'game_seq' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id103" data-sortable="true" onclick="changePageSort('table_idx', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Table ID <i class="fa {{ $page['OrderQuery'] == 'table_idx' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id104" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-field="id104" data-sortable="true">Seat ID</th>
                            <th class="text-center" data-align="right" data-field="id105" data-sortable="true" onclick="changePageSort('total_bet', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Total Bet <i class="fa {{ $page['OrderQuery'] == 'total_bet' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id106" data-sortable="true" onclick="changePageSort('total_win', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Total Win <i class="fa {{ $page['OrderQuery'] == 'total_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->game_seq }}' data-id='{{ $history->game_seq }}' data-ts='{{ $history->ts }}' data-table='{{$history->table_idx }}' class="disableTextSelect offline bootstrap-modal-form-open rowsBJ" data-toggle="modal" data-target="#BJHistory_modal" >
                       
                                    <td class="text-center" ><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                    <td class="text-right">{{ $history->game_seq }}</td>
                                    <td class="text-right">{{$history->table_idx + 1}}</td>
                                    <td class="text-right">
                                        {{$history->ps_id1}}, 
                                        {{$history->ps_id2}}, 
                                        {{$history->ps_id3}}, 
                                        {{$history->ps_id4}},  
                                        {{$history->ps_id5}} 
                                        <?php 
                                            /*$totalSeat_idArray = $history->getArraySeat_id();
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
                                            }*/
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        {{$history->seat_id1}},
                                        {{$history->seat_id2}}, 
                                        {{$history->seat_id3}}, 
                                        {{$history->seat_id4}}, 
                                        {{$history->seat_id5}} 
                                     </td>    
                                    <td class="text-right"><?php
                                            /*$totalBetArray = $history->getArrayBet();
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
                                            print (number_format($totalBet / 100, 2));*/
                                        ?> 
                                        {{number_format($history->total_bet / 100, 2) }}
                                    </td>
                                    <td class="text-right">
                                        {{number_format($history->total_win / 100, 2)}} 
                                        <?php 
                                            /*$totalWinArray = $history->getArrayWin();
                                            $totalWin = array_sum($totalWinArray);
                                            print (number_format($totalWin / 100, 2));*/
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
<!--<script src="bootstrap-table/bootstrap-table.js"></script> -->
<script >
    //{{$page['sortMenuOpen'] == 1 ? '' : 'none'}}
    //data-sortMenuOpen
pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
}    


</script>

        

