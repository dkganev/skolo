<style>
    @media screen and (max-width: 1700px) {
    #rouletteHistory_modal {
        overflow: scroll;
    }
}
</style>
@include('statistics.modals.Slot-modal')

<div class="container">
    <div class=""> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">@lang('messages.Bingo')</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li> -->
               <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">@lang('messages.Blackjack')</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">@lang('messages.Roulette') 1</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette2')}}')">@lang('messages.Roulette') 2</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historySlots')}}')">@lang('messages.Slots') </a></li>
            </ul>
        </div>
    </div>
    <div class=""> 
        <div class="" style="">
            
            <ul class="breadcrumb " >  
                <li class="dropdown"  >
                    <a href="" data-toggle="dropdown">
                        <strong class="nav-secondary">@lang('messages.Slot') :</strong>
                        <strong class="nav-secondary">{{ $page['gamesDescription'] }}</strong>
                        <span class="caret"></span> 
                    </a>

                    <!-- Secondary Navigation -->
                    <ul class="dropdown-menu" role="menu" style=" background-color: #333;">
                        @foreach($games as $val)
                            <li >
                              <a href="#"  onclick="changeSlotGame2({{$val->gameid}})">

                                  {{$val->description}}
                              </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>    
        </div>
    </div>
    
    <div class="row" >
        <div class="col-md-12" style="">

            <div class="panel panel-default" id="SlotBody">
                <div class="panel-heading">
                    <div>
                        <!--<div class=" form-group-sm col-md-3" style="padding-left: 0%;  display: block;">
                            <div class="">
                                <select id = "SlotGame" name="bonus_type" class="form-control imput-sm " onchange="changeSlotGame()">
                                    @foreach($games as $val)
                                        @if (!in_array($val->gameid, $discard) )
                                            <option {{ $val->gameid == $page['slotID'] ? 'selected="true"' : '' }} value="{{$val->gameid}}" >{{$val->description}}</option>
                                        @endif
                                    @endforeach
                                </select>    
                            </div>
                            
                        </div> 
                        --> 
                                       
                                    
                        
                        <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                            @lang('messages.Slot') - {{ $page['gamesDescription'] }}
                        </h2>
                        <a class="btn btn-warning  pull-right" onclick="export2excelSlot();">
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                            @lang('messages.Export')
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a  class="btn btn-warning  pull-right" onclick="ExportToPNGSlotTable();">
                            @lang('messages.Export to PNG')
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
                                        <a onclick="changeRowsPerPageSlot(20)">20</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageSlot(50)">50</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageSlot(100)">100</a>
                                    </li>
                                </ul>
                            </span>
                            <span style="color: #fff">@lang('messages.rows per page')</span> 
                        </span>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="pagination" style="margin: 0px; ">
                    <input id="pageReload" type="hidden" val="" data-page="{{$historys->currentPage()}}" data-slotId="{{$page['slotID']}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/historySlots')}}" data-excel-url="{{ route('export2excelR2') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$historys->lastPage()  )
                            <li class="page-number active" >
                                <a onclick="changePageNumSlot(1)">1</a>
                            </li>
                        @endif
                        @if ( $historys->lastPage() != 1  )
                            @if ($historys->lastPage() < 6) 
                                @for ($i = 1; $i <= $historys->lastPage() ; $i++)
                                    <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                        <a onclick="changePageNumSlot({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $historys->currentPage() > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNumSlot({{ $historys->currentPage()-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $historys->currentPage() >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNumSlot(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif

                                @if ( $historys->currentPage() == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumSlot({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == 2 || $historys->currentPage() == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumSlot({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $historys->currentPage() > 3 && $historys->currentPage() < $historys->lastPage() - 2  )
                                    @for ($i = $historys->currentPage() - 2 ; $i < $historys->currentPage() + 3; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}" >
                                            <a onclick="changePageNumSlot({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == $historys->lastPage() - 1 || $historys->currentPage() == $historys->lastPage() - 2)
                                    @for ($i = $historys->lastPage() - 5 ; $i < $historys->lastPage() + 1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }} " >
                                            <a onclick="changePageNumSlot({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $historys->currentPage() == $historys->lastPage())
                                    @for ($i = $historys->lastPage() - 4 ; $i < $historys->lastPage()+1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumSlot({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() < $historys->lastPage() - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNumSlot({{ $historys->lastPage() }})" >{{ $historys->lastPage()}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $historys->currentPage() < $historys->lastPage())
                                    <li class="page-next">
                                        <a onclick="changePageNumSlot({{ $historys->currentPage() + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNumSlot({{ $historys->currentPage() }})" >{{$historys->currentPage()}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                
                    
                    <div class="keep-open btn-group open pull-right" >
                        <!--<a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}?page=2&rowsPerPage=50')" class="btn btn-success RouletteSort" >test</a> -->
                        <a class="btn btn-success RouletteSort" style="display: none;" onclick="changePageSortMenuSlot();"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-default RouletteSort" style="display: none;" onclick="cleanSortFunctionSlot();"><i class="fa fa-close" aria-hidden="true"></i></a> 
                        <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuSlot();">
                           @lang('messages.Sort Menu')
                           <span class="caret"></span>
                        </button>
                    </div>
                    
                </div>
                <div class="panel-body" id="tableRoulette" >
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
                            <tr >
                                <th  class="RouletteSort col-md-2"  style="display: none; ">
                                   <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" onclick="datetimepicker44(); ">
                                                <div class='input-group date' id='datetimepicker4'>

                                                    <input id='datetimepicker4I' class="form-control" size="16" type="text" value="{{$page['FromGameTs'] == "" ? "" : $page['FromGameTs']}}" onchange='datetimepicker4Close();' >
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
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" onclick="datetimepicker55(); ">
                                                <div class='input-group date' id='datetimepicker5' style="margin-top: 3px;" >
                                                    <input id='datetimepicker5I' class="form-control"  type='text' size="16" value="{{$page['ToGameTs'] == "" ? "" : $page['ToGameTs']}}" onchange='datetimepicker5Close();' >
                                                    <span class="add-on"><i class="icon-remove"></i></span>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center RouletteSort" style="display: none;" data-field="id202" ><input class="form-control" type='number' style="color: #333" value="{{$page['game_sequence'] == "" ? "" : $page['game_sequence']}}" id='GameSeq' ></th>
                                <th class="text-center RouletteSort" style="display: none;" data-field="id203" ><input class="form-control" type='number' style="color: #333" value="{{$page['ps_id'] == "" ? "" : $page['ps_id']}}" id='PSID' ></th>
                                <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameBet'] == "" ? "" : $page['FromGameBet']}}" id='FromGameBet' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameBet'] == "" ? "" : $page['ToGameBet']}}" id='ToGameBet' >
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameWin'] == "" ? "" : $page['FromGameWin']}}" id='FromGameWin' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameWin'] == "" ? "" : $page['ToGameWin']}}" id='ToGameWin' >
                                            </div>
                                        </div>
                                    </div>
                                </th>    
                                <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameJackpot'] == "" ? "" : $page['FromGameJackpot']}}" id='FromGameJackpot' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameJackpot'] == "" ? "" : $page['ToGameJackpot']}}" id='ToGameJackpot' >
                                            </div>
                                        </div>
                                    </div>
                                </th>    
                                <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameGamble'] == "" ? "" : $page['FromGameGamble']}}" id='FromGameGamble' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameGamble'] == "" ? "" : $page['ToGameGamble']}}" id='ToGameGamble' >
                                            </div>
                                        </div>
                                    </div>
                                </th>    
                                <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.From'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="">
                                                <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameGambleWin'] == "" ? "" : $page['FromGameGambleWin']}}" id='FromGameGambleWin' >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-3'>
                                            @lang('messages.To'):
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="" style="margin-top: 3px;">
                                                <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameGambleWin'] == "" ? "" : $page['ToGameGambleWin']}}" id='ToGameGambleWin' >
                                            </div>
                                        </div>
                                    </div>
                                </th>    
                            </tr>
                            <tr>
                                <th class="text-center" data-field="date" data-field="id101" data-sortable="true"  onclick="changePageSortSlot('timestamp', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Time')<i class="fa {{ $page['OrderQuery'] == 'timestamp' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id102" data-sortable="true" onclick="changePageSortSlot('game_sequence', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Game') #<i class="fa {{ $page['OrderQuery'] == 'game_sequence' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id103" data-sortable="true" onclick="changePageSortSlot('ps_id', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.PS ID')<i class="fa {{ $page['OrderQuery'] == 'ps_id' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id105" data-sortable="true" onclick="changePageSortSlot('bet', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Total Bet')<i class="fa {{ $page['OrderQuery'] == 'bet' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id106" data-sortable="true" onclick="changePageSortSlot('paytable_win', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Total Win')<i class="fa {{ $page['OrderQuery'] == 'paytable_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id107" data-sortable="true" onclick="changePageSortSlot('jackpot_win', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Jackpot')<i class="fa {{ $page['OrderQuery'] == 'jackpot_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id107" data-sortable="true" onclick="changePageSortSlot('gamble_attempts', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Gamble Attempts')<i class="fa {{ $page['OrderQuery'] == 'gamble_attempts' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-align="right" data-field="id107" data-sortable="true" onclick="changePageSortSlot('gamble_win', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Gamble Win')<i class="fa {{ $page['OrderQuery'] == 'gamble_win' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->ps_id }}' data-psid='{{ $history->ps_id }}' 
                                        data-timestamp='{{ $history->timestamp }}' 
                                        data-game_sequence='{{$history->game_sequence }}' 
                                        data-bet='{{ number_format($history->bet / 100, 2 ) }}' 
                                        data-paytable-win='{{ number_format($history->paytable_win / 100, 2 ) }}' 
                                        class="disableTextSelect offline bootstrap-modal-form-open rowsSlot tr-class" data-toggle="modal" data-target="#SlotHistory_modal" >
                                    <td class="text-center"><?php echo date("Y-m-d H:i:s", strtotime($history->timestamp)); ?></td>
                                    <td class="text-right">{{ $history->game_sequence }}</td>
                                    <td class="text-right">{{ $history->ps_id }}</td>
                                    <td class="text-right">{{ number_format($history->bet / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->paytable_win / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->jackpot_win / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->gamble_attempts / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->gamble_win / 100, 2 ) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    
    
    
    
    
</div>
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script> -->

<script >
//sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.RouletteSort').hide(); }, 200);
    sortMenuRV = 0;
}    
//$("#rouletteHistory_modal").css({'overflow': 'scroll'});
</script>