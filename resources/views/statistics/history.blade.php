@include('modals.bingoHistory-modal')
@include('modals.bingoHistory2-modal')

<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>-->
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <!--<li><a href="javascript:ajaxLoad('#')">Slots </a></li>-->
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
                <div class="pagination" style="margin: 0px; ">
                    <input id="pageReload" type="hidden" val="" data-page="{{$historys->currentPage()}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/history')}}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$historys->lastPage()  )
                            <li class="page-number active" >
                                <a onclick="changePageNum(1)">1</a>
                            </li>
                        @endif
                        @if ( $historys->lastPage() != 1  )
                            @if ($historys->lastPage() < 6) 
                                @for ($i = 1; $i < $historys->lastPage(); $i++)
                                    <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                        <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $historys->currentPage() > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNum({{ $historys->currentPage()-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $historys->currentPage() >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNum(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif
                                    
                            
                            
                            
                                @if ( $historys->currentPage() == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == 2 || $historys->currentPage() == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $historys->currentPage() > 3 && $historys->currentPage() < $historys->lastPage() - 2  )
                                    @for ($i = $historys->currentPage() - 2 ; $i < $historys->currentPage() + 3; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}" >
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == $historys->lastPage() - 1 || $historys->currentPage() == $historys->lastPage() - 2)
                                    @for ($i = $historys->lastPage() - 5 ; $i < $historys->lastPage() + 1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }} " >
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $historys->currentPage() == $historys->lastPage())
                                    @for ($i = $historys->lastPage() - 4 ; $i < $historys->lastPage()+1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNum({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() < $historys->lastPage() - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNum({{ $historys->lastPage() }})" >{{ $historys->lastPage()}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $historys->currentPage() < $historys->lastPage())
                                    <li class="page-next">
                                        <a onclick="changePageNum({{ $historys->currentPage() + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNum({{ $historys->currentPage() }})" >{{$historys->currentPage()}}</a>
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
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="ShowHide();">
                       <i class="glyphicon glyphicon-th icon-th"></i>
                       <span class="caret"></span>
                    </button>
                    <ul id="ShowHideUl" class="dropdown-menu" role="menu" style="display: none;"  onclick="ShowHideBingo();">
                        <li>
                            <label>
                                <input id="checkbox1" value="0" checked="checked" type="checkbox">
                                    Time
                                <br>
                            </label>
                        </li>
                         <li>
                            <label>
                                <input id="checkbox2" value="0" checked="checked" type="checkbox">
                                    Game
                                <br>
                            </label>
                        </li>
                         <li>
                            <label>
                                <input id="checkbox3" value="0" checked="checked" type="checkbox">
                                    Ticket Cost
                                <br>
                            </label>
                        </li> <li>
                            <label>
                                <input id="checkbox4" value="0" checked="checked" type="checkbox">
                                    Players
                                <br>
                            </label>
                        </li> <li>
                            <label>
                                <input id="checkbox5" value="0" checked="checked" type="checkbox">
                                    Tickets
                                <br>
                            </label>
                        </li> <li>
                            <label>
                                <input id="checkbox6" value="0" checked="checked" type="checkbox">
                                    Time
                                <br>
                            </label>
                        </li>
                    </ul>
                </div>    
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
                        <tr>
                            <th colspan="1"  class="text-center tbleGame"  data-field="test">
                                <div class="row tbleGame">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker66(); ">
                                            <div class='input-group date' id='datetimepicker6'>
                                                
                                                <input id='datetimepicker6I' class="form-control" size="10" type="text" value="" onchange='datetimepicker6Close();' readonly>
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
                            <th colspan="1" class="text-center tableTh2" data-field="id22"><input class="form-control" type='number' style="color: #333" id='GameSort' ></th>
                            <th colspan="1" class="text-center tableTh3" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
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
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
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
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-centert tableTh6" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' style="color: #333" id='FromGameBet' >
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
                                            <input class="form-control" type='number' style="color: #333" id='ToGameBet' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th rowspan="1" class="text-center">
                                <div class="row">
                                    <div class='col-md-3'>
                                        
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <a class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        
                                    </div>
                                    <br/>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <div class="">
                                             <a class="btn btn-default"><i class="fa fa-close" aria-hidden="true"></i></a> 
                                        </div>
                                    </div>
                                </div>
                            </th>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center"   data-field="id1" data-sortable="true">Time<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id2" data-sortable="true"   data-sort-order="asc">Game #<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id3" data-sortable="true" >Ticket<br/>Cost</th>
                            <th class="text-center" data-align="right" data-field="id4" data-sortable="true">Players<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id5" data-sortable="true">Tickets<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id6" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id7" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id8" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id9" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id10" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id11" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id12" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id13" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id14" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id15" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id16" data-sortable="true">at<br/>ball</th>
                            <th class="text-center" data-align="right" data-field="id17" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th class="text-center" data-align="right" data-field="id18" data-sortable="true">at<br/>ball</th> 
                            <th class="text-center" data-align="right" data-field="id19" data-sortable="true">$<br/>&nbsp;&nbsp;</th>
                            <th rowspan="1" class="text-center" data-field="id20" data-sortable="true" >Game<br/>Cancelled</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->bingo_seq }}' data-id='{{ $history->bingo_seq }}' data-unique='{{ $history->unique_game_seq }}'  class="disableTextSelect offline bootstrap-modal-form-open rows" data-toggle="modal" data-target="#bingoHistory_modal" >
                       
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