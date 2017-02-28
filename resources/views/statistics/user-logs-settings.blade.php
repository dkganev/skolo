<div class="container">
    <div class=" "> 
        <div class="" style="">
            <!-- Secondary Navigation javascript:ajaxLoad('http://dkganev.com:8000/statistics/user-logs')-->
            <ul class="breadcrumb">
              <li><a href="javascript:ajaxLoad('{{url('statistics/user-logs')}}')">@lang('messages.All')</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/user-logs-system')}}')">@lang('messages.System')</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/user-logs-settings')}}')">@lang('messages.Settings')</a></li>
            </ul>
        </div>
        
    </div>
</div>
<div class="container">
    <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" id="panelGameContend">
                <div class="panel-heading" id="panel-heading">
                    <div>
                        <!--<a href="{{ route('export2excelGamesStatistics') }}" class="btn btn-primary  pull-left">
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                            @lang('messages.Export')
                        </a>-->

                        <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 25%;">
                            @lang('messages.Settings User Logs')
                        </h2>
                        <a class="btn btn-warning  pull-right" onclick="export2excelAll();"> 
                            <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                            @lang('messages.Export')
                        </a>
                        <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                        <a class="btn btn-warning  pull-right" onclick="ExportToPNGAllable();">
                            @lang('messages.Export to PNG')
                        </a>
                    </div><br />
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
                                        <a onclick="changeRowsPerPageAll(20)">20</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 50 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageAll(50)">50</a>
                                    </li>
                                    <li class="{{$page['rowsPerPage'] == 100 ? 'active' : '' }}">
                                        <a onclick="changeRowsPerPageAll(100)">100</a>
                                    </li>
                                </ul>
                            </span>
                            <span style="color: #fff">@lang('messages.rows per page')</span> 
                        </span>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="pagination" style="margin: 0px; ">
                          <input id="pageReload" type="hidden" val="" data-page="{{$historys->currentPage()}}" data-rowsPerPage="{{$page['rowsPerPage']}}" data-URL="javascript:ajaxLoad('{{url('statistics/user-logs-settings')}}" data-excel-url="{{ route('export2excelSettings') }}" data-OrderQuery="{{ $page['OrderQuery']}}" data-desc="{{ $page['OrderDesc']}}" data-sortMenuOpen="{{ $page['sortMenuOpen']}}"> 
                          <ul class="pagination" style="margin: 0px;">
                              @if ( !$historys->lastPage()  )
                                  <li class="page-number active" >
                                      <a onclick="changePageNumAll(1)">1</a>
                                  </li>
                              @endif
                              @if ( $historys->lastPage() != 1  )
                                  @if ($historys->lastPage() < 6) 
                                      @for ($i = 1; $i <= $historys->lastPage() ; $i++)
                                          <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                              <a onclick="changePageNumAll({{ $i }})">{{ $i }}</a>
                                          </li>
                                      @endfor
                                  @else 


                                      @if ( $historys->currentPage() > 1  )
                                          <li class="page-pre">
                                              <a onclick="changePageNumAll({{ $historys->currentPage()-1}})" >‹</a>
                                          </li>
                                      @endif
                                      @if ( $historys->currentPage() >= 4)
                                           <li class="page-number">
                                              <a onclick="changePageNumAll(1)">1</a>
                                          </li>
                                           <li class="page-last-separator disabled">
                                              <a href="javascript:void(0)">...</a>
                                          </li>
                                      @endif

                                      @if ( $historys->currentPage() == 1 )
                                          @for ($i = 1; $i < 6; $i++)
                                              <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                                  <a onclick="changePageNumAll({{ $i }})">{{ $i }}</a>
                                              </li>
                                          @endfor
                                      @endif

                                      @if ( $historys->currentPage() == 2 || $historys->currentPage() == 3)
                                          @for ($i = 1; $i < 6; $i++)
                                              <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                                  <a onclick="changePageNumAll({{ $i }})">{{ $i }}</a>
                                              </li>
                                          @endfor
                                      @endif 

                                      @if ( $historys->currentPage() > 3 && $historys->currentPage() < $historys->lastPage() - 2  )
                                          @for ($i = $historys->currentPage() - 2 ; $i < $historys->currentPage() + 3; $i++)
                                              <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}" >
                                                  <a onclick="changePageNumAll({{ $i }})">{{ $i}}</a>
                                              </li>
                                          @endfor
                                      @endif

                                      @if ( $historys->currentPage() == $historys->lastPage() - 1 || $historys->currentPage() == $historys->lastPage() - 2)
                                          @for ($i = $historys->lastPage() - 5 ; $i < $historys->lastPage() + 1; $i++)
                                              <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }} " >
                                                  <a onclick="changePageNumAll({{ $i }})">{{ $i}}</a>
                                              </li>
                                          @endfor
                                      @endif



                                      @if ( $historys->currentPage() == $historys->lastPage())
                                          @for ($i = $historys->lastPage() - 4 ; $i < $historys->lastPage()+1; $i++)
                                              <li class="page-number {{$historys->currentPage() == $i ? "active" : "" }}">
                                                  <a onclick="changePageNumAll({{ $i }})">{{ $i}}</a>
                                              </li>
                                          @endfor
                                      @endif

                                      @if ( $historys->currentPage() < $historys->lastPage() - 2 )
                                           <li class="page-last-separator disabled">
                                              <a href="javascript:void(0)">...</a>
                                          </li>
                                          <li class="page-number">
                                              <a onclick="changePageNumAll({{ $historys->lastPage() }})" >{{ $historys->lastPage()}}</a>
                                          </li>

                                      @endif
                                      @if ( $historys->currentPage() < $historys->lastPage())
                                          <li class="page-next">
                                              <a onclick="changePageNumAll({{ $historys->currentPage() + 1 }})" >›</a>
                                          </li>
                                      @endif

                                  @endif
                             @else
                                  <li class="page-number active">
                                      <a onclick="changePageNumAll({{ $historys->currentPage() }})" >{{$historys->currentPage()}}</a>
                                  </li>
                              @endif
                          </ul>
                      </div>
                    <div class="keep-open btn-group open pull-right" >
                        <a class="btn btn-success MenuSort" style="display: none;" onclick="changePageSortMenuAll()"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-default MenuSort" style="display: none;" onclick="cleanSortFunctionAll()"><i class="fa fa-close" aria-hidden="true"></i></a> 
                        <button class="btn btn-default " type="button" id="hide-column" data-method="hideColumn"  aria-expanded="true" onclick="sortMenuAll();">
                        @lang('messages.Sort Menu')
                        <span class="caret"></span>
                        </button>
                    </div>
                </div>

                <div class="panel-body" >
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                        data-toggle="table"
                        data-locale="en-US"
                        data-sortable="true"
                        data-pagination="true"
                        data-side-pagination="client"
                        data-page-list="[20, 40, 100]"
                        data-classes="table-condensed"
                    >
                        <thead class="w3-dark-grey">
                            <tr >
                                <th  class="MenuSort col-md-2"  style="display: none; ">
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
                                <th class="text-center MenuSort" style="display: none;" data-field="id202" ><input class="form-control" type='number' style="color: #333" value="{{$page['PSID'] == "" ? "" : $page['PSID']}}" id='PSID' ></th>
                                <th class="text-center MenuSort" style="display: none;" data-field="id202" ><input class="form-control" type='text' style="color: #333" value="{{$page['Message'] == "" ? "" : $page['Message']}}" id='Message' ></th>
                                <th class="text-center MenuSort" style="display: none;" data-field="id202" ><input class="form-control" type='text' style="color: #333" value="{{$page['UserName'] == "" ? "" : $page['UserName']}}" id='UserName' ></th>
                                <th class="text-center MenuSort" style="display: none;" data-field="id202" ><input class="form-control" type='text' style="color: #333" value="{{$page['ip'] == "" ? "" : $page['ip']}}" id='ip' ></th>
                            </tr>
                            <tr>
                                <th class="text-center" data-sortable="true" onclick="changePageSortAll('created_at', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Time')<i class="fa {{ $page['OrderQuery'] == 'created_at' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-sortable="true" onclick="changePageSortAll('psid', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.PS ID')<i class="fa {{ $page['OrderQuery'] == 'psid' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-sortable="true" onclick="changePageSortAll('message', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.Description')<i class="fa {{ $page['OrderQuery'] == 'message' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-sortable="true" onclick="changePageSortAll('user_name', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.User') (@lang('messages.Username'))<i class="fa {{ $page['OrderQuery'] == 'user_name' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                                <th class="text-center" data-sortable="true" onclick="changePageSortAll('ip', '{{ $page['OrderDesc'] == 'asc' ? 'desc' : 'asc' }}');">@lang('messages.IP Adress')<i class="fa {{ $page['OrderQuery'] == 'ip' ? ( $page['OrderDesc'] == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort' }} pull-right" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historys as $val)
                                <tr class="tr-class">
                                    <td class="text-center"><?php echo date("Y-m-d H:i:s", strtotime($val->created_at)); ?></td>
                                    <td class="text-center">{{ $val->psid }}</td>
                                    <td class="text-center">{{ $val->message }}</td>
                                    <td class="text-center">{{ $val->user_name }}</td>
                                    <td class="text-center">{{ $val->ip }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--End Panel Body -->
            </div><!--End Panel -->
        </div>
    </div> <!--End Row -->

</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script>-->
<script >
//sortTimer123 = setTimeout(function(){ $('.MenuSort').hide(); }, 200);
pageSortMenuOpen =  $('#pageReload').attr('data-sortMenuOpen');    
if (pageSortMenuOpen == 1){
    sortTimer123 = setTimeout(function(){ $('.MenuSort').show(); }, 200);
}else{
    sortTimer123 = setTimeout(function(){ $('.MenuSort').hide(); }, 200);
    sortMenuRV = 0;
}    
//$("#rouletteHistory_modal").css({'overflow': 'scroll'});
</script><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

