@include('modals.rouletteHistory-modal')
<div class="col-md-12 "> 
        <div class="page-header" style="padding-left:15px; margin-top: 0px; margin-right: -15px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
              <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">Bingo</a></li>
              <li><a href="javascript:ajaxLoad('#')">Casino Battle</a></li>
              <li class="active"><a href="javascript:ajaxLoad('{{url('statistics/historyRoulette')}}')">Roulette</a></li>
              <li><a href="javascript:ajaxLoad('{{url('statistics/historyBlackjack')}}')">Blackjack</a></li>
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

        <h1 style="margin-top: 0px; color:white;" class="page-header">Roulette History Statistics</h1>

    </div>
     <!-- end  page header -->
</div>

<div class="row" >
    <div class="col-md-12">

        <div class="panel panel-default" >
            <div class="panel-heading">
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
                            <th class="text-center" data-field="date" data-sortable="true">Time</th>
                            <th class="text-center" data-align="right" data-sortable="true">Game #</th>
                            <th class="text-center" data-align="right" data-sortable="true">PS ID</th>
                            <th class="text-center" data-align="right" data-sortable="true">Win Number</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Bet</th>
                            <th class="text-center" data-align="right" data-sortable="true">Total Win</th>
                            <th class="text-center" data-align="right" data-sortable="true">Jackpot</th>
                            <th class="text-center" data-align="right" data-sortable="true">No Spin Game</th>
                        </tr>
                    </thead>

                        <tbody>
                            @foreach($historys as $history)
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


</script>