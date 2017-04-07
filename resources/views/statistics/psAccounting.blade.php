<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" id="panelPsAccounting">
            <div class="panel-heading" id="socketConect">
                <h2 style="display: inline; color:#fff; font-family: 'italic';  padding-left: 35%;">
                    @lang('messages.PS Accounting')
                </h2>

                <a class="btn btn-warning  pull-right" onclick="export2excelPsAccounting();">
                    <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> 
                    @lang('messages.Export')
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a  class="btn btn-warning  pull-right" onclick="ExportToPNGpsAccounting();">
                    @lang('messages.Export to PNG')
                </a>
                <!--<span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a id="socketConectRealtime" class="btn btn-warning  pull-right" onclick="socketConect();">
                    @lang('messages.Start Real Time')
                </a>-->
            </div>
                <div class="panel-body" >
                                <div class="row tbleGame col-md-5">
                                    <div class='col-md-2' style="margin-top: 5px;">
                                        @lang('messages.From'):
                                    </div>
                                    <div class='col-md-10'>
                                        <div class="" onclick="datetimepicker22(); ">
                                            <div class='input-group date' id='datetimepicker2'>
                                                
                                                <input id='datetimepicker2I' class="form-control" size="10" type="text" value="{{$page['startDate'] == "" ? "" : $page['startDate']}}" onchange='datetimepicker2Close();' readonly>
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="row col-md-5">
                                    <div class='col-md-2' style="margin-top: 5px;">
                                        @lang('messages.To'):
                                    </div>
                                    <div class='col-md-10'>
                                        <div class="" onclick="datetimepicker33(); ">
                                            <div class='input-group date' id='datetimepicker3'  >
                                                <input id='datetimepicker3I' class="form-control"  type='text' size="16" value="{{$page['endDate'] == "" ? "" : $page['endDate']}}" onchange='datetimepicker3Close();' readonly />
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                    <div class="row col-md-2">
                        <a  class="btn btn-default  pull-right" onclick="searchPsAccounting();">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            @lang('messages.Search')
                        </a>
                    </div>
                    <br /><br /><br />
                    <input id="pageReload" type="hidden" val="" data-URL="javascript:ajaxLoad('{{url('statistics/psAccounting')}}" data-excel-url="{{ route('export2excelPsAccounting') }}" data-OrderQuery="" data-desc="" > 
                    <table class="table table-striped table-bordered table-hover data-table-table" role="grid"
                            data-toggle="table"
                            data-locale="en-US"
                            data-sortable="true"
                            data-classes="table-condensed"
                    >
                    <thead class="w3-dark-grey">
                        <tr>
                            <th data-sortable="true" >@lang('messages.PS ID')</th>
                            <th data-sortable="true" >@lang('messages.Dallas ID')</th>
                            <th data-sortable="true" >@lang('messages.Total In') (@lang('messages.dollar'))</th>
                            <th data-sortable="true" >@lang('messages.Total Out') (@lang('messages.dollar'))</th>
                            <th data-sortable="true" >@lang('messages.Total Bet') (@lang('messages.dollar'))</th>
                            <th data-sortable="true" >@lang('messages.Total Win') (@lang('messages.dollar'))</th>
                            <th data-sortable="true" >@lang('messages.Total Credit') (@lang('messages.dollar'))</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($counters as $c)
                            <tr class="tr-class" id="tr{{$c['psid']}}">
                                <td class="text-center">{{ $c['psid'] }}</td>
                                <td class="text-center">{{ $c['dallasid'] }}</td>
                                <td class="text-right" id="TotalIn{{$c['psid']}}">{{ number_format($c['total_in']/100, 2) }}</td>
                                <td class="text-right" id="TotalOut{{$c['psid']}}">{{ number_format($c['total_out']/100, 2) }}</td>
                                <td class="text-right" id="TotalBet{{$c['psid']}}">{{ number_format($c['total_bet']/100, 2) }}</td>
                                <td class="text-right" id="TotalWin{{$c['psid']}}">{{ number_format($c['total_win']/100, 2) }}</td>
                                <td class="text-right" id="TotalCredit{{$c['psid']}}">{{ number_format($c['total_credit']/100, 2) }}</td>

                            </tr>
                        @endforeach
                        <tr class="danger">
                            <td class="text-center" colspan="2"><strong style="color:black;">@lang('messages.TOTAL')</strong></td>
                            <td class="text-right" id="TotalIn" data-total="{{$totals['totalIn']}}">{{ number_format($totals['totalIn']/100, 2) }}</td>
                            <td class="text-right" id="TotalOut" data-total="{{$totals['totalOut']}}">{{ number_format($totals['totalOut']/100, 2) }}</td>
                            <td class="text-right" id="TotalBet" data-total="{{$totals['totalBet']}}">{{ number_format($totals['totalBet']/100, 2) }}</td>
                            <td class="text-right" id="TotalWin" data-total="{{$totals['totalWin']}}">{{ number_format($totals['totalWin']/100, 2) }}</td>
                            <td class="text-right" id="TotalCredit" data-total="{{$totals['totalCredit']}}">{{ number_format($totals['totalCredit']/100, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!--End Panel Body -->
        </div><!--End Panel -->
    </div>
</div><!--End Row -->
</div><!--End Container -->

<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<!--<script src="bootstrap-table/bootstrap-table.js"></script>-->

