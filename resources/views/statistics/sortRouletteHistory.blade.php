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
                        
                        <tr class="RouletteSortRow">
                            <th  class='col-md-2 RouletteSort'>
                               <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" onclick="datetimepicker44(); ">
                                            <div class='input-group date' id='datetimepicker4'>
                                                
                                                <input id='datetimepicker4I' class="form-control" size="16" type="text" value="" onchange='datetimepicker4Close();' >
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
                                                <input id='datetimepicker5I' class="form-control"  type='text' size="16" value="" onchange='datetimepicker5Close();' >
                                                <span class="add-on"><i class="icon-remove"></i></span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort"  ><input class="form-control" type='number' style="color: #333" id='GameSortR' ></th>
                            <th class="text-center RouletteSort"  ><input class="form-control" type='number' style="color: #333" id='PSIDR' ></th>
                            <th class="text-center RouletteSort"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' size="6" style="color: #333" id='FromGameNumR' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' >
                                        <div class="" style="margin-top: 3px;">
                                            <input class="form-control" type='number'  size="6" style="color: #333" id='ToGameNumR' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="">
                                            <input class="form-control" type='number' size="6" style="color: #333" id='FromGameBetR' >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12'>
                                        <div class="" style="margin-top: 3px;">
                                            <input class="form-control" type='number'  size="6" style="color: #333" id='ToGameBetR' >
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <input class="form-control" type='number' style="color: #333" id='FromGameWinR' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" id='ToGameWinR' >
                                    </div>
                                </div>
                            </th>
                            <th class="text-center RouletteSort"  >
                                <div class="row">
                                    <div class='col-md-3'>
                                        From:
                                    </div>
                                    <div class='col-md-12'>
                                        <input class="form-control" type='number' style="color: #333" id='FromGameJackR' >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-3'>
                                        To:
                                    </div>
                                    <div class='col-md-12' style="margin-top: 3px;">
                                        <input class="form-control" type='number' style="color: #333" id='ToGameJackR' >
                                    </div>
                                </div>
                            </th>
                            <th class="RouletteSort"></th>
                        </tr>
                        <tr>
                            <th class="text-center" data-field="date" data-field="id101" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-field="id102" data-sortable="true">Game #</th>
                            <th class="text-center" data-align="right" data-field="id103" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-field="id104" data-sortable="true">Win<br />Number</th>
                            <th class="text-center" data-align="right" data-field="id105" data-sortable="true">Total Bet</th>
                            <th class="text-center" data-align="right" data-field="id106" data-sortable="true">Total Win</th>
                            <th class="text-center" data-align="right" data-field="id107" data-sortable="true">Jackpot</th>
                            <th class="text-center" data-align="right" data-field="id108" data-sortable="true">No Spin Game</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
                                @if ($server_ps->where('psid', $history->psid)->where('seatid', $dataSeat_ID)->count() || $dataSeat_ID == 0 )
                                    <tr id='Row{{ $history->rlt_seq }}' data-id='{{ $history->rlt_seq }}' data-ts='{{ $history->ts }}' data-Ids='{{ $history->psid }}' class="disableTextSelect offline bootstrap-modal-form-open rowsR" data-toggle="modal" data-target="#rouletteHistory_modal" >
                       
                                        <td><?php echo date("Y-m-d H:i:s", strtotime($history->ts)); ?></td>
                                        <td>{{ $history->rlt_seq }}</td>
                                        <td>{{$server_ps->where('psid', $history->psid)->count() ? $server_ps->where('psid', $history->psid)->first()->seatid : "Missing saitid"}}</td>
                                        <td>{{ $history->win_num }}</td>
                                        <td>{{ number_format($history->bet / 100, 2 ) }}</td>
                                        <td>{{ number_format($history->win_val / 100, 2 ) }}</td>
                                        <td>{{ number_format($history->jackpot / 100, 2 ) }}</td>
                                        <td>{{ $history->ho_spin }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                </table>
<link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">
<script src="bootstrap-table/bootstrap-table.js"></script>
