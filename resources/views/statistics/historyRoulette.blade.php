<style>
    @media screen and (max-width: 1700px) {
    #rouletteHistory_modal {
        overflow: scroll;
    }
}
</style>
@include('statistics.modals.rouletteHistory-modal')

<div class="container">
    <div class=""> 
        <div class="" style="">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">@lang('messages.Bingo')</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li> -->
               <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">@lang('messages.Blackjack')</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">@lang('messages.Roulette') 1</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette2')}}')">@lang('messages.Roulette') 2</a></li>
              <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
              <li><a href="javascript:ajaxLoad('{{url('statistics/historySlots')}}')">@lang('messages.Slots') </a></li>
            </ul>
        </div>
        
    </div>
    <div class=" "> 
        <div class="" style="">
            <ul class="breadcrumb">
                <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">@lang('messages.Roulette History Statistics')</a></li>
                <li><a href="javascript:ajaxLoad('{{url('statistics/winRTL1')}}')">@lang('messages.Wheel Statistics') </a></li>
                <!--<li><a href="javascript:ajaxLoad('#')">Lucky Circle</a></li>-->
                <!--<li><a href="javascript:ajaxLoad('#')">Slots </a></li>-->
            </ul>
        </div>
    </div>
    

<div class="row" >
    <div class="col-md-12" style="width: 1000px">

        <div class="panel panel-default" id="panelRContend">
            <div class="panel-heading">
                <div>
                    <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 20%;">
                        @lang('messages.Roulette History Statistics')
                    </h2>
                    <a class="btn btn-warning  pull-right" onclick="export2excelR();">
                        <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                        @lang('messages.Export')
                    </a>
                    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                    <a  class="btn btn-warning  pull-right" onclick="ExportToPNGRTable();">
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
                                    <a onclick="changeRowsPerPageFR(20)">20</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageFR(50)">50</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageFR(100)">100</a>
                                </li>
                            </ul>
                        </span>
                        <span style="color: #fff">@lang('messages.rows per page')</span> 
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pagination" style="margin: 0px; ">
                    <input id="pageReload" type="hidden" val="" data-page="{{$historys->currentPage()}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}" data-excel-url="{{ route('export2excelR') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$historys->lastPage()  )
                            <li class="page-number active" >
                                <a onclick="changePageNumR(1)">1</a>
                            </li>
                        @endif
                        @if ( $historys->lastPage() != 1  )
                            @if ($historys->lastPage() < 6) 
                                @for ($i = 1; $i <= $historys->lastPage() ; $i++)
                                    <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                        <a onclick="changePageNumR({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $historys->currentPage() > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNumR({{ $historys->currentPage()-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $historys->currentPage() >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNumR(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif

                                @if ( $historys->currentPage() == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumR({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == 2 || $historys->currentPage() == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumR({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $historys->currentPage() > 3 && $historys->currentPage() < $historys->lastPage() - 2  )
                                    @for ($i = $historys->currentPage() - 2 ; $i < $historys->currentPage() + 3; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}" >
                                            <a onclick="changePageNumR({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == $historys->lastPage() - 1 || $historys->currentPage() == $historys->lastPage() - 2)
                                    @for ($i = $historys->lastPage() - 5 ; $i < $historys->lastPage() + 1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }} " >
                                            <a onclick="changePageNumR({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $historys->currentPage() == $historys->lastPage())
                                    @for ($i = $historys->lastPage() - 4 ; $i < $historys->lastPage()+1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumR({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() < $historys->lastPage() - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNumR({{ $historys->lastPage() }})" >{{ $historys->lastPage()}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $historys->currentPage() < $historys->lastPage())
                                    <li class="page-next">
                                        <a onclick="changePageNumR({{ $historys->currentPage() + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNumR({{ $historys->currentPage() }})" >{{$historys->currentPage()}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!--<button class="btn btn-danger btn-sm bootstrap-modal-form-open" style="visibility: hidden"> Add Machine </button> -->
                <div class="keep-open btn-group open pull-right" >
                    <a class="btn btn-success RouletteSort" style="display: none;" onclick="changePageSortMenuR()"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-default RouletteSort" style="display: none;" onclick="cleanSortFunctionR()"><i class="fa fa-close" aria-hidden="true"></i></a> 
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuR();">
                       @lang('messages.Sort Menu')
                       <span class="caret"></span>
                    </button>
                </div>
                <!--  -->
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
                            <th class="text-center RouletteSort" style="display: none;" data-field="id202" ><input class="form-control" type='number' style="color: #333" value="{{$page['GameSort'] == "" ? "" : $page['GameSort']}}" id='GameSortR' ></th>
                            <th class="text-center RouletteSort" style="display: none;" data-field="id203" ><input class="form-control" type='number' style="color: #333" value="{{$page['PSID'] == "" ? "" : $page['PSID']}}" id='PSIDR' ></th>
                            <th class="text-center RouletteSort" style="display: none;" data-field="id203" ><input class="form-control" type='number' style="color: #333" value="{{$page['SeatID'] == "" ? "" : $page['SeatID']}}" id='SeatIDR' ></th>
                            <th class="text-center RouletteSort" style="display: none;" data-field="id204" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.From'):
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameNum'] == "" ? "" : $page['FromGameNum']}}" id='FromGameNumR' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.To'):
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" style="margin-top: 3px;">
                                            <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameNum'] == "" ? "" : $page['ToGameNum']}}" id='ToGameNumR' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.From'):
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' size="6" style="color: #333" value="{{$page['FromGameBet'] == "" ? "" : $page['FromGameBet']}}" id='FromGameBetR' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.To'):
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" style="margin-top: 3px;">
                                            <input class="form-control" type='number'  size="6" style="color: #333" value="{{$page['ToGameBet'] == "" ? "" : $page['ToGameBet']}}" id='ToGameBetR' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.From'):
                                    </div>
                                    <div class='col-md-12'>
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['FromGameWin'] == "" ? "" : $page['FromGameWin']}}" id='FromGameWinR' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.To'):
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['ToGameWin'] == "" ? "" : $page['ToGameWin']}}" id='ToGameWinR' >
                                    </div>
                                </div>
                            </th>
                            <th class="text-center  RouletteSort" style="display: none;" >
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.From'):
                                    </div>
                                    <div class='col-md-12'>
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['FromGameJack'] == "" ? "" : $page['FromGameJack']}}" id='FromGameJackR' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        @lang('messages.To'):
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" value="{{$page['ToGameJack'] == "" ? "" : $page['ToGameJack']}}" id='ToGameJackR' >
                                    </div>
                                </div>
                            </th>
                            <th class="RouletteSort" style="display: none;"></th>
                        </tr>
                        <tr>
                            <th class="text-center" data-field="date" data-field="id101" data-sortable="true" onclick="changePageSortR('ts', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Time')<i class="fa {{ $page['OrderQuery'] == 'ts' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id102" data-sortable="true" onclick="changePageSortR('rlt_seq', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Game') #<i class="fa {{ $page['OrderQuery'] == 'rlt_seq' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id103" data-sortable="true" onclick="changePageSortR('psid', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.PS ID')<i class="fa {{ $page['OrderQuery'] == 'psid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id103" data-sortable="true" onclick="changePageSortR('seatid', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Seat ID')<i class="fa {{ $page['OrderQuery'] == 'seatid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id104" data-sortable="true" onclick="changePageSortR('win_num', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Win<br />Number')<i class="fa {{ $page['OrderQuery'] == 'win_num' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id105" data-sortable="true" onclick="changePageSortR('bet', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Total Bet')<i class="fa {{ $page['OrderQuery'] == 'bet' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id106" data-sortable="true" onclick="changePageSortR('win_val', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Total Win')<i class="fa {{ $page['OrderQuery'] == 'win_val' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id107" data-sortable="true" onclick="changePageSortR('jackpot', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Jackpot')<i class="fa {{ $page['OrderQuery'] == 'jackpot' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-align="right" data-field="id108" data-sortable="true" >@lang('messages.No Spin Game')</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                <tr id='Row{{ $history->rlt_seq }}' data-id='{{ $history->rlt_seq }}' data-ts='{{ $history->ts }}' data-Ids='{{ $history->psid }}' class="disableTextSelect offline bootstrap-modal-form-open rowsR tr-class" data-toggle="modal" data-target="#rouletteHistory_modal" >
                       
                                    <td class="text-center"><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                    <td class="text-right">{{ $history->rlt_seq }}</td>
                                    <td class="text-right">{{ $history->psid }} <!--{{$server_ps->where('psid', $history->psid)->count() ? $server_ps->where('psid', $history->psid)->first()->seatid : "Missing saitid"}}--></td>
                                    <td class="text-right">{{ $history->seatid }}</td>
                                    <td class="text-right">{{ $history->win_num }}</td>
                                    <td class="text-right">{{ number_format($history->bet / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->win_val / 100, 2 ) }}</td>
                                    <td class="text-right">{{ number_format($history->jackpot / 100, 2 ) }}</td>
                                    <td class="text-right">{{ $history->no_spin }}</td>
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