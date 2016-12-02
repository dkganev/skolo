<div class="container">
<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default" id="panelEventsContend">
            <div class="panel-heading">
                <div>
                    <h2 class='text-center' style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                         Events
                    </h2>
                    <a class="btn btn-warning  pull-right" onclick="export2excelEvents();">
                        <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> Export
                    </a>
                    <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                    <a  class="btn btn-warning  pull-right" onclick="ExportToPNGEventsTable();">
                        Export to PNG
                    </a>
                </div> <br />
               
                <div class="pull-left pagination-detail">
                    <span class="page-list">
                        <span class="btn-group dropup">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="page-size">{{$page['rowsPerPage']}}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{$page['rowsPerPage'] == 20 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageEvents(20)">20</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageEvents(50)">50</a>
                                </li>
                                <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                    <a onclick="changeRowsPerPageEvents(100)">100</a>
                                </li>
                            </ul>
                        </span>
                        rows per page
                    </span>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="pagination" style="margin: 0px; "> 
                    <input id="pageReload" type="hidden" val="" data-page="{{$historys->currentPage()}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('casino/events')}}" data-excel-url="{{ route('export2excelEvents') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                    <ul class="pagination" style="margin: 0px;">
                        @if ( !$historys->lastPage()  )
                            <li class="page-number active" >
                                <a onclick="changePageNumEvents(1)">1</a>
                            </li>
                        @endif
                        @if ( $historys->lastPage() != 1  )
                            @if ($historys->lastPage() < 6) 
                                @for ($i = 1; $i < $historys->lastPage(); $i++)
                                    <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                        <a onclick="changePageNumEvents({{ $i }})">{{ $i }}</a>
                                    </li>
                                @endfor
                            @else 
                            
                            
                                @if ( $historys->currentPage() > 1  )
                                    <li class="page-pre">
                                        <a onclick="changePageNumEvents({{ $historys->currentPage()-1}})" >‹</a>
                                    </li>
                                @endif
                                @if ( $historys->currentPage() >= 4)
                                     <li class="page-number">
                                        <a onclick="changePageNumEvents(1)">1</a>
                                    </li>
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                @endif

                                @if ( $historys->currentPage() == 1 )
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumEvents({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == 2 || $historys->currentPage() == 3)
                                    @for ($i = 1; $i < 6; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumEvents({{ $i }})">{{ $i }}</a>
                                        </li>
                                    @endfor
                                @endif 
                                
                                @if ( $historys->currentPage() > 3 && $historys->currentPage() < $historys->lastPage() - 2  )
                                    @for ($i = $historys->currentPage() - 2 ; $i < $historys->currentPage() + 3; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}" >
                                            <a onclick="changePageNumEvents({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() == $historys->lastPage() - 1 || $historys->currentPage() == $historys->lastPage() - 2)
                                    @for ($i = $historys->lastPage() - 5 ; $i < $historys->lastPage() + 1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }} " >
                                            <a onclick="changePageNumEvents({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                
                                
                                @if ( $historys->currentPage() == $historys->lastPage())
                                    @for ($i = $historys->lastPage() - 4 ; $i < $historys->lastPage()+1; $i++)
                                        <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                            <a onclick="changePageNumEvents({{ $i }})">{{ $i}}</a>
                                        </li>
                                    @endfor
                                @endif
                                
                                @if ( $historys->currentPage() < $historys->lastPage() - 2 )
                                     <li class="page-last-separator disabled">
                                        <a href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-number">
                                        <a onclick="changePageNumEvents({{ $historys->lastPage() }})" >{{ $historys->lastPage()}}</a>
                                    </li>
                                    
                                @endif
                                @if ( $historys->currentPage() < $historys->lastPage())
                                    <li class="page-next">
                                        <a onclick="changePageNumEvents({{ $historys->currentPage() + 1 }})" >›</a>
                                    </li>
                                @endif
                                
                            @endif
                       @else
                            <li class="page-number active">
                                <a onclick="changePageNumEvents({{ $historys->currentPage() }})" >{{$historys->currentPage()}}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!--<button class="btn btn-danger btn-sm bootstrap-modal-form-open" style="visibility: hidden"> Add Machine </button> -->
                <div class="keep-open btn-group open pull-right" title="Columns">
                    <a class="btn btn-success EventsSort" style="display: none;" onclick="changePageSortMenuEvents()"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a class="btn btn-default EventsSort" style="display: none;" onclick="cleanSortFunctionEvents()"><i class="fa fa-close" aria-hidden="true"></i></a> 
                    <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuEvents();">
                       Sort Menu
                       <span class="caret"></span>
                    </button>
                </div>
            </div>    
            <div class="panel-body" style="border: 1px solid #d1d1e0; border-radius:5px">
                <table  class="table table-striped table-bordered table-hover data-table-table" id="terminals-table" role="grid"
                            data-toggle="table"
                            data-sortable="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            data-page-list="[3, 5, 10, 15]"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th class="EventsSort " style="display: none;" data-sortable="true"><input class="form-control" type='number' style="color: #333" value="{{$page['PSID'] == "" ? "" : $page['PSID']}}" id='PSID' ></th>
                            <th class="EventsSort " style="display: none;" data-sortable="true"><input class="form-control" type='number' style="color: #333" value="{{$page['ErrorCode'] == "" ? "" : $page['ErrorCode']}}" id='ErrorCode' ></th>
                            <th class="EventsSort " style="display: none;" data-sortable="true"><input class="form-control" type='text' style="color: #333" value="{{$page['ErrorText'] == "" ? "" : $page['ErrorText']}}" id='ErrorText' ></th>
                            <th class="EventsSort " style="display: none;">
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
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
                                        To:
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
                        </tr>
                        <tr>
                            <th class="text-center col-lg-1" data-sortable="true" onclick="changePageSortEvents('psid', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">PS ID<i class="fa {{ $page['OrderQuery'] == 'psid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center col-lg-1" data-sortable="true" onclick="changePageSortEvents('err_code', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Error Code<i class="fa {{ $page['OrderQuery'] == 'err_code' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center" data-sortable="true" onclick="changePageSortEvents('error', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Error Text<i class="fa {{ $page['OrderQuery'] == 'error' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            <th class="text-center col-lg-3" data-sortable="true" onclick="changePageSortEvents('time', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">Time<i class="fa {{ $page['OrderQuery'] == 'time' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historys as $history)
                            <tr class="tr-class">
                                <td class="text-right">{{ $history->psid }}</td>
                                <td class="text-right">{{ $history->err_code }}</td>
                                <td>{{ $history->error }}</td>
                                <td class="text-center col-lg-3" >{{ $history->time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- End Body-->
        </div><!-- End Panel-->
    </div><!-- End Col-->
</div><!-- End Row-->

</div><!-- End Container-->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script> -->
<script>
pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.EventsSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.EventsSort').hide(); }, 200);
}    

    
</script>