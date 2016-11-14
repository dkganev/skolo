@include('modals.BJHistory-modal')
<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li ><a id="historyRoulette" href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li class="active"><a id="historyBlackjack" href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
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
    <div class="col-md-12" style="width: 800px">

        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="pull-left pagination-detail">
                     <!-- <span class="pagination-info">Showing 1 page</span> -->
                    <span class="page-list">
                        <span class="btn-group dropup">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="page-size">{{$page['rowsPerPage']}}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active">
                                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?rowsPerPage=20')">20</a>
                                </li>
                                <li>
                                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?rowsPerPage=50')">50</a>
                                </li>
                                <li>
                                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?rowsPerPage=100')">100</a>
                                </li>
                            </ul>
                        </span>
                        rows per page
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pagination" style="margin: 0px; ">
                    <ul class="pagination" style="margin: 0px;">
                        @if ( $historys->hasMorePages() )
                            @if ( $historys->currentPage() > 1 )
                                <li class="page-pre">
                                    <a href="javascript:void(0)">‹</a>
                                </li>
                                <li class="page-number active">
                                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page=1&rowsPerPage={{$page['rowsPerPage']}}')">1</a>
                                </li>
                            @else
                            
                            @endif
                            @if ( $historys->currentPage() > 3 && $historys->lastPage() > 6 )
                                <li class="page-last-separator disabled">
                                    <a href="javascript:void(0)">...</a>
                                </li>
                            @endif
                            @for ($i = $historys->currentPage(); $i < $historys->currentPage() + 5; $i++)
                                 <li class="page-number">
                                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page={{$i}}&rowsPerPage={{$page['rowsPerPage']}}')">{{ $i }}</a>
                                </li>
                            @endfor
                            @if ( $historys->currentPage() < $historys->lastPage())
                             <li class="page-last">
                                <a href="javascript:void(0)">25</a>
                            </li>
                            <li class="page-next">
                                <a href="javascript:void(0)">›</a>
                            </li>
                            @endif
                            
                        <!--<li class="page-pre">
                            <a href="javascript:void(0)">‹</a>
                        </li>
                        <li class="page-number active">
                            <a href="javascript:void(0)">{{$historys->currentPage()}}</a>
                        </li>
                        <li class="page-number">
                            <a href="javascript:void(0)">{{var_dump($historys->firstItem())}}</a>
                        </li>
                        <li class="page-last-separator disabled">
                            <a href="javascript:void(0)">...</a>
                        </li>
                        <li class="page-last">
                            <a href="javascript:void(0)">25</a>
                        </li>
                        <li class="page-next">
                            <a href="javascript:void(0)">›</a>
                        </li> -->
                        @else
                            <li class="page-number active">
                                <a href="javascript:void(0)">{{$historys->currentPage()}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <button class="btn btn-danger btn-sm bootstrap-modal-form-open" style="visibility: hidden"> Add Machine </button>
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page=2&rowsPerPage=50')" class="btn btn-success RouletteSort" >test</a>
                    <a class="btn btn-success RouletteSort" style="display: none;" onclick="sortFunction()"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-default RouletteSort" style="display: none;" onclick="cleanSortFunction()"><i class="fa fa-close" aria-hidden="true"></i></a> 
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuR();">
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
                            <th  class='text-center RouletteSort col-md-2' style="display: none;">
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker66(); ">
                                            <div class='input-group date' id='datetimepicker6'>
                                                
                                                <input id='datetimepicker6I' class="form-control" size="16" type="text" value="" onchange='datetimepicker6Close();' readonly>
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
                                                <input id='datetimepicker7I' class="form-control"  type='text' size="16" value="" onchange='datetimepicker7Close();' readonly />
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" id='GameSort' ></th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" id='TableSort' ></th>
                            <th class="text-center RouletteSort" style="display: none;" ><input class="form-control" type='number' style="color: #333" id='PSID' ></th>
                            <th class="text-center RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' '>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet'>
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
                                        <input class="form-control" type='number' style="color: #333" id='FromGameWin' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" id='ToGameWin' >
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center col-md-2" data-field="id101" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-field="id102" data-sortable="true">Game # {{$historys->total()}} -- {{$historys->nextPageUrl()}}</th>
                            <th class="text-center" data-align="right" data-field="id103" data-sortable="true">Table ID</th>
                            <th class="text-center" data-align="right" data-field="id104" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-field="id105" data-sortable="true">Total Bet</th>
                            <th class="text-center" data-align="right" data-field="id106" data-sortable="true">Total Win</th>
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
<!--<script src="bootstrap-table/bootstrap-table.js"></script> -->
<script >
sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);

</script>

        

