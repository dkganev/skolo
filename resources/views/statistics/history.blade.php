<style>
    @media screen and (max-width: 1400px) {
    #bingoHistory_modal {
        overflow: scroll;
    }
    #bingoHistory2_modal {
        overflow: scroll;
    }
}
</style>
@include('statistics.modals.bingoHistory-modal')
@include('statistics.modals.bingoHistory2-modal')
<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>-->
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Slots </a></li>-->
            </ul>
        </div>
        
    </div>
</div>
<div class="container-fluid">

<div class="row" >
    <div class="col-md-12">

        <div class="panel panel-default" id="panelBingoContend">
            <div class="panel-heading">
                <div>
                    <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                        Bingo History Statistics
                    </h2>
                    
                    <a class="btn btn-warning  pull-right" onclick="export2excelBingo();"> 
                        <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                    </a>
                    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                    <a  class="btn btn-warning  pull-right" onclick="ExportToPNGBingoTable();">
                        Export to PNG
                    </a>
                </div> <br />
                
                <div class="pull-left pagination-detail" > 
                     <!-- <span class="pagination-info">Showing 1 page</span> -->
                    <span class="page-list">
                        <span class="btn-group dropup">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="page-size">{{$page['rowsPerPage']}}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{$page['rowsPerPage'] == 20 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageFBingo(20)">20</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageFBingo(50)">50</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageFBingo(100)">100</a>
                                </li>
                            </ul>
                        </span>
                        rows per page
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pagination" style="margin: 0px; ">           <!--$historys->currentPage()  $historys->lastPage()-->
                    <input id="pageReload" type="hidden" val="" data-page="{{$page['current']}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/history')}}" data-excel-url="{{ route('export2excelBingo') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$page['last']  )
                            <li class="page-number active" >
                                <a onclick="changePageNumBingo(1)">1</a>
                            </li>
                        @endif
                        @if ( $page['last'] != 1  )
                            @if ($page['last'] < 6) 
                                @for ($i = 1; $i <= $page['last']; $i++)
                                    <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                        <a onclick="changePageNumBingo({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $page['current'] > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNumBingo({{ $page['current']-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $page['current'] >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNumBingo(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif
                                    
                            
                            
                            
                                @if ( $page['current'] == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNumBingo({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] == 2 || $page['current'] == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNumBingo({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $page['current'] > 3 && $page['current'] < $page['last'] - 2  )
                                    @for ($i = $page['current'] - 2 ; $i < $page['current'] + 3; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}" >
                                            <a onclick="changePageNumBingo({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] == $page['last'] - 1 || $page['current'] == $page['last'] - 2)
                                    @for ($i = $page['last'] - 5 ; $i < $page['last'] + 1; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }} " >
                                            <a onclick="changePageNumBingo({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $page['current'] == $page['last'])
                                    @for ($i = $page['last'] - 4 ; $i < $page['last']+1; $i++)
                                        <li class="page-number {{$page['current'] == $i ? "active" : "" }}">
                                            <a onclick="changePageNumBingo({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $page['current'] < $page['last'] - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNumBingo({{ $page['last'] }})" >{{ $page['last']}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $page['current'] < $page['last'])
                                    <li class="page-next">
                                        <a onclick="changePageNumBingo({{ $page['current'] + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNumBingo({{ $page['current'] }})" >{{$page['current']}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <!--<a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page=2&rowsPerPage=50')" class="btn btn-success RouletteSort" >test</a> -->
                    <a class="btn btn-success RouletteSort" style="display: none;" onclick="changePageSortMenuBingo();"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-default RouletteSort" style="display: none;" onclick="cleanSortFunctionBingo();"><i class="fa fa-close" aria-hidden="true"></i></a> 
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuBingo();">
                       Sort Menu
                       <span class="caret"></span>
                    </button>
                </div>
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="ShowHide();">
                       <i class="glyphicon glyphicon-th icon-th"></i>
                       <span class="caret"></span>
                    </button>
                    <ul id="ShowHideUl" class="dropdown-menu" role="menu" style="display: none;"  onclick="ShowHideBingo();">
                        <li>
                            <label>&nbsp;
                                <input id="checkbox1" value="0" {{ $page['tableTh1'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Time
                                <br>
                            </label>
                        </li>
                        <li>
                            <label>&nbsp;
                                <input id="checkbox2" value="0" {{ $page['tableTh2'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Game 
                                <br>
                            </label>
                        </li>
                        <li>
                            <label>&nbsp;
                                <input id="checkbox3" value="0" {{ $page['tableTh3'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Ticket Cost
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkbox4" value="0" {{ $page['tableTh4'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Players
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkbox5" value="0" {{ $page['tableTh5'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Tickets
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxLine" value="0" {{ $page['tableLine'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Line
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxBingo" value="0" {{ $page['tableBingo'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Bingo
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxMyBonus" value="0" {{ $page['tableMyBonus'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    My Bonus
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxBonusLine" value="0" {{ $page['tableBonusLine'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Bonus Line
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxBonusBingo" value="0" {{ $page['tableBonusBingo'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Bonus Bingo
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxJackpotLine" value="0" {{ $page['tableJackpotLine'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Jackpot Line
                                <br>
                            </label>
                        </li> 
                        <li>
                            <label>&nbsp;
                                <input id="checkboxJackpotBingo" value="0" {{ $page['tableJackpotBingo'] == 1 ? 'checked="checked"' : '' }} type="checkbox">
                                    Jackpot Bingo
                                <br>
                            </label>
                        </li>
                    </ul>
                </div>
               
                <!--  -->
            </div>

                <div class="panel-body" >
                    <table id="example" class="table table-striped table-bordered table-hover" role="grid">
                    <thead class="w3-dark-grey">
                        <tr>
                            <th colspan="5" class="text-center GameInfo" style='text-align: center !Important; '>Game Info</th>
                            <th colspan="2" class="text-center Line">Line</th>
                            <th colspan="2" class="text-center Bingo">Bingo</th>
                            <th colspan="2" class="text-center MyBonus">My Bonus</th>
                            <th colspan="2" class="text-center BonusLine">Bonus Line</th>
                            <th colspan="2" class="text-center BonusBingo">Bonus Bingo</th>
                            <th colspan="2" class="text-center JackpotLine">Jackpot Line</th>
                            <th colspan="2" class="text-center JackpotBingo">Jackpot Bingo</th>
                            <th rowspan="1" class="text-center" ></th>
                        </tr>
                        <tr class="RouletteSort">
                            <th colspan="1"  class="text-center tableTh1"  data-field="test">
                                <div class="row tbleGame">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker22(); ">
                                            <div class='input-group date' id='datetimepicker2'>
                                                
                                                <input id='datetimepicker2I' class="form-control" size="10" type="text" value="{{$page['FromGameTs'] == "" ? "" : $page['FromGameTs']}}" onchange='datetimepicker2Close();' readonly>
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
                                        <div class="" onclick="datetimepicker33(); ">
                                            <div class='input-group date' id='datetimepicker3' style="margin-top: 3px;" >
                                                <input id='datetimepicker3I' class="form-control"  type='text' size="16" value="{{$page['ToGameTs'] == "" ? "" : $page['ToGameTs']}}" onchange='datetimepicker3Close();' readonly />
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th colspan="1" class="text-center tableTh2" data-field="id22"><input class="form-control" type='number' style="color: #333" value="{{$page['GameSort'] == "" ? "" : $page['GameSort']}}" id='GameSort' ></th>
                            <th colspan="1" class="text-center tableTh3" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromTicketCost'] == "" ? "" : $page['FromTicketCost']}}" id='FromTicketCost' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToTicketCost'] == "" ? "" : $page['ToTicketCost']}}" id='ToTicketCost' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center tableTh4">
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromPlayers'] == "" ? "" : $page['FromPlayers']}}" id='FromPlayers' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToPlayers'] == "" ? "" : $page['ToPlayers']}}" id='ToPlayers' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center tableTh5" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromTickets'] == "" ? "" : $page['FromTickets']}}" id='FromTickets' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToTickets'] == "" ? "" : $page['ToTickets']}}" id='ToTickets' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-centert Line" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromLine'] == "" ? "" : $page['FromLine']}}" id='FromLine' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToLine'] == "" ? "" : $page['ToLine']}}" id='ToLine' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center Line" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromLineVal'] == "" ? "" : $page['FromLineVal']}}" id='FromLineVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToLineVal'] == "" ? "" : $page['ToLineVal']}}" id='ToLineVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center Bingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBingo'] == "" ? "" : $page['FromBingo']}}" id='FromBingo' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBingo'] == "" ? "" : $page['ToBingo']}}" id='ToBingo' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center Bingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBingoVal'] == "" ? "" : $page['FromBingoVal']}}" id='FromBingoVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBingoVal'] == "" ? "" : $page['ToBingoVal']}}" id='ToBingoVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center MyBonus" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromMybonus'] == "" ? "" : $page['FromMybonus']}}" id='FromMybonus' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToMybonus'] == "" ? "" : $page['ToMybonus']}}" id='ToMybonus' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center MyBonus" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromMybonusVal'] == "" ? "" : $page['FromMybonusVal']}}" id='FromMybonusVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToMybonusVal'] == "" ? "" : $page['ToMybonusVal']}}" id='ToMybonusVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center BonusLine" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBonusLine'] == "" ? "" : $page['FromBonusLine']}}" id='FromBonusLine' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBonusLine'] == "" ? "" : $page['ToBonusLine']}}" id='ToBonusLine' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center BonusLine" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBonusLineVal'] == "" ? "" : $page['FromBonusLineVal']}}" id='FromBonusLineVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBonusLineVal'] == "" ? "" : $page['ToBonusLineVal']}}" id='ToBonusLineVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center BonusBingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBonusBingo'] == "" ? "" : $page['FromBonusBingo']}}" id='FromBonusBingo' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBonusBingo'] == "" ? "" : $page['ToBonusBingo']}}" id='ToBonusBingo' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center BonusBingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromBonusBingoVal'] == "" ? "" : $page['FromBonusBingoVal']}}" id='FromBonusBingoVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToBonusBingoVal'] == "" ? "" : $page['ToBonusBingoVal']}}" id='ToBonusBingoVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center JackpotLine" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromJackpotLine'] == "" ? "" : $page['FromJackpotLine']}}" id='FromJackpotLine' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToJackpotLine'] == "" ? "" : $page['ToJackpotLine']}}" id='ToJackpotLine' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center JackpotLine" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromJackpotLineVal'] == "" ? "" : $page['FromJackpotLineVal']}}" id='FromJackpotLineVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToJackpotLineVal'] == "" ? "" : $page['ToJackpotLineVal']}}" id='ToJackpotLineVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center JackpotBingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromJackpotBingo'] == "" ? "" : $page['FromJackpotBingo']}}" id='FromJackpotBingo' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToJackpotBingo'] == "" ? "" : $page['ToJackpotBingo']}}" id='ToJackpotBingo' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center JackpotBingo" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['FromJackpotBingoVal'] == "" ? "" : $page['FromJackpotBingoVal']}}" id='FromJackpotBingoVal' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <br/>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" value="{{$page['ToJackpotBingoVal'] == "" ? "" : $page['ToJackpotBingoVal']}}" id='ToJackpotBingoVal' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th rowspan="1" class="text-center">
                                
                            </th>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center tableTh1"   data-field="id1" data-sortable="true" onclick="changePageSortBingo('tstamp', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Time<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'tstamp' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center tableTh2" data-align="right" data-field="id2" data-sortable="true" onclick="changePageSortBingo('bingo_seq', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Game #<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'bingo_seq' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center tableTh3" data-align="right" data-field="id3" data-sortable="true" onclick="changePageSortBingo('ticket_cost', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Ticket<br/>Cost<i class="fa {{ $page['OrderQuery'] == 'ticket_cost' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center tableTh4" data-align="right" data-field="id4" data-sortable="true" onclick="changePageSortBingo('players', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Players<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'players' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center tableTh5" data-align="right" data-field="id5" data-sortable="true" onclick="changePageSortBingo('tickets', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Tickets<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'tickets' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center Line" data-align="right" data-field="id6" data-sortable="true" onclick="changePageSortBingo('line', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'line' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center Line" data-align="right" data-field="id7" data-sortable="true" onclick="changePageSortBingo('line_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'line_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center Bingo" data-align="right" data-field="id8" data-sortable="true" onclick="changePageSortBingo('bingo', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'bingo' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center Bingo" data-align="right" data-field="id9" data-sortable="true" onclick="changePageSortBingo('bingo_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'bingo_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center MyBonus" data-align="right" data-field="id10" data-sortable="true" onclick="changePageSortBingo('mybonus', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'mybonus' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center MyBonus" data-align="right" data-field="id11" data-sortable="true" onclick="changePageSortBingo('mybonus_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'mybonus_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center BonusLine" data-align="right" data-field="id12" data-sortable="true" onclick="changePageSortBingo('bonus_line', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'bonus_line' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center BonusLine" data-align="right" data-field="id13" data-sortable="true" onclick="changePageSortBingo('bonus_line_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'bonus_line_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center BonusBingo" data-align="right" data-field="id14" data-sortable="true" onclick="changePageSortBingo('bonus_bingo', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'bonus_bingo' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center BonusBingo" data-align="right" data-field="id15" data-sortable="true" onclick="changePageSortBingo('bonus_bingo_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'bonus_bingo_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center JackpotLine" data-align="right" data-field="id16" data-sortable="true" onclick="changePageSortBingo('jackpot_line', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'jackpot_line' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center JackpotLine" data-align="right" data-field="id17" data-sortable="true" onclick="changePageSortBingo('jackpot_line_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'jackpot_line_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center JackpotBingo" data-align="right" data-field="id18" data-sortable="true" onclick="changePageSortBingo('jackpot_bingo', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">at<br/>ball<i class="fa {{ $page['OrderQuery'] == 'jackpot_bingo' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th> 
                            <th class="text-center JackpotBingo" data-align="right" data-field="id19" data-sortable="true" onclick="changePageSortBingo('jackpot_bingo_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">$<br/>&nbsp;&nbsp;<i class="fa {{ $page['OrderQuery'] == 'jackpot_bingo_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th rowspan="1" class="text-center" data-field="id20" data-sortable="true" >Game<br/>Cancelled</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->bingo_seq }}' data-id='{{ $history->bingo_seq }}' data-unique='{{ $history->unique_game_seq }}'  class="disableTextSelect offline bootstrap-modal-form-open rows tr-class" data-toggle="modal" data-target="#bingoHistory_modal" >
                       
                                    <td class="text-center text-ri tableTh1"><?php echo date("Y-m-d H:i:s", strtotime($history->tstamp)); ?></td>
                                    <td class="text-right tableTh2">{{ $history->bingo_seq }}</td>
                                    <td class="text-right tableTh3">{{$history->ticket_cost}}</td>
                                    <td class="text-right tableTh4">{{ $history->players }}</td>
                                    <td class="text-right tableTh5">{{ $history->tickets }}</td>
                                    <td class="text-right Line">{{ $history->line }}</td>
                                    <td class="text-right Line">{{ $history->line_val }}</td>
                                    <td class="text-right Bingo">{{ $history->bingo }}</td>
                                    <td class="text-right Bingo">{{ $history->bingo_val }}</td>
                                    <td class="text-right MyBonus">{{ $history->mybonus }}</td>
                                    <td class="text-right MyBonus">{{ $history->mybonus_val }}</td>
                                    <td class="text-right BonusLine">{{ $history->bonus_line }}</td>
                                    <td class="text-right BonusLine">{{ $history->bonus_line_val }}</td>
                                    <td class="text-right BonusBingo">{{ $history->bonus_bingo }}</td>
                                    <td class="text-right BonusBingo">{{ $history->bonus_bingo_val }}</td>
                                    <td class="text-right JackpotLine">{{ $history->jackpot_line }}</td>
                                    <td class="text-right JackpotLine">{{ $history->jackpot_line_val }}</td>
                                    <td class="text-right JackpotBingo">{{ $history->jackpot_bingo }}</td>
                                    <td class="text-right JackpotBingo">{{ $history->jackpot_bingo_val }}</td>
                                    <td class="text-right ">{{ $history->cancel_val }}</td>
                              
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
<!--<script src="bootstrap-table/bootstrap-table.js"></script>-->

<script >
ShowHideI = 0;
ShowHideBingo()

pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
}       

socket.disconnect();
sockStatus = 0;
/*var ShowHideI = 0;
$('#show-column, #hide-column').click(function () {
    if (ShowHideI == 0) {
        $('#ShowHideUl').show();
        ShowHideI = 1;
        $('#example').bootstrapTable("hideColumn", 'id');
        $('.GameInfo').attr("colspan", 4);
        $('.tbleGame').hide();
        if ($('#checkbox1').is(':checked')){
            alert('test');
        }
        
    }else{
        $('#ShowHideUl').hide();
        $('#example').bootstrapTable("showColumn", 'id');
        $('.GameInfo').attr("colspan", 5);
        $('.tbleGame').show();
        ShowHideI = 0;
    }*/
    /*$('#example').bootstrapTable('mergeCells', {
                    tabindex: 0,
                    field: 'id2',
                    colspan: 4
                })
        alert('test12');
        
         //document.getElementById(".id2").colSpan = "4";
         $('.id2').attr("colspan", 7);
        alert('test3');
        
            //$('#tbleGame').hide();
    }else{
        $('#ShowHideUl').hide();
        $('#example').bootstrapTable("showColumn", 'id');
       // $('#tbleLine').attr("colspan", 5);
        //$('#tbleGame').show();
        ShowHideI = 0;
    }
    $("#example tr th").each(function(){
        if ($(this).attr('data-field') == "id2"){
            alert($(this).attr('data-field'));
            $(this).attr("colspan", 4);
        }
    //alert($(this).data('method'));
   // $('#example').bootstrapTable("hideColumn", 'id');
});*/

//function ShowHide() {
 /*   //alert(ShowHideI);
    if (ShowHideI == 0) {
        $('#ShowHideUl').show();
        //$('#ShowHideUl').show();
        ShowHideI = 1;
    }else{
        $('#ShowHideUl').hide();
        ShowHideI = 0;
    }
    /*$('#table-methods').next().click(function () {
            $(this).hide();
            var id = 0,
                getRows = function () {
                    var rows = [];

                    for (var i = 0; i < 10; i++) {
                        rows.push({
                            id: id,
                            name: 'test' + id,
                            price: '$' + id
                        });
                        id++;
                    }
                    return rows;
                },
                // init tab
    $table = $('#example').bootstrapTable({
                    data: getRows()
                });
    $('#show-column, #hide-column').click(function () {            
    $table.bootstrapTable($(this).data('method'), 'id');
    });
    });
    $('#example').bootstrapTable($(this).data('method'), 'id');*/
//}
</script>