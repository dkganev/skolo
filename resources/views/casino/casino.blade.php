<link rel="stylesheet" href="/css/casinoProview.css">

<div class="container-full">

<div id="casinoPreview" class="row" style="user-select: none;">
    <div class="col-md-12">
        <div class="panel panel-default" style="margin-right: 30px">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2"> 
                        <label class="switch">
                            <input id="GridDrag" type="checkbox" checked >
                            <div class="slider round"></div>
                        </label>
                        <span style="vertical-align: top; line-height: 2.00;"> Grid</span>
                    </div>
                    <div class="col-md-2"> 
                        <label class="switch">
                            <input id="GridColor" type="checkbox" >
                            <div class="slider round"></div>
                        </label>
                        <span style="vertical-align: top; line-height: 2.00;"> Games Colors</span>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2"> 
                        <label class="switch">
                            <input id="GridBingoFeed" type="checkbox" >
                            <div class="slider round"></div>
                        </label>
                        <span style="vertical-align: top; line-height: 2.00;">Bingo Feed</span>
                    </div>  

                     <button type="button" style="margin-right: 15px;" class="btn btn-warning pull-right" onclick='ExportToPNGPreview();'>Export to PNG</button>  
                </div>

                <div class="row">
                    <div class="col-md-12 ">
                        <button class="btn btn-info">
                            Free
                            <span id="BtnFree" class="badge" style="background-color: #303030;color: #fff;"> {{$statuses['free']}}</span>
                        </button>
                        <button class="btn-success btn-sm">
                            Active
                            <span id="BtnActive" class="badge" style="background-color: #303030;color: #fff;">{{$statuses['active']}}</span>
                        </button>
                        <button class="btn btn-sm" style="background-color: #ccb2ff;">
                            Call Attend
                            <span id="BtnCallAttend" class="badge" style="background-color: #303030;color: #fff;">{{$statuses['attendant']}}</span>
                        </button>
                        <button class="btn btn-warning btn-sm">
                            Cash Out
                            <span class="badge" style="background-color: #303030;color: #fff;"> 14 </span>
                        </button>
                        <button class="btn btn-sm" style="background-color: #9c9c9c;">
                            Offline
                            <span id="BtnOffline" class="badge" style="background-color: #303030;color: #fff;">{{$statuses['offline']}}</span>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i>
                            Errors
                            <span id="BtnErrors" class="badge" style="background-color: #303030;color: #fff;">{{$statuses['error']}}</span>
                        </button>
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>

            <div class="panel-body" id="casino-panel-body">

                <div id="casinoPreview" ondrop="drop(event)" ondragover="allowDrop(event)" style="height: 650px;">  
                    @foreach($server_ps as $ps)
                        <div id="box{{ $ps->psid }}" data_boxStatus="{{ $ps->boxStatus }}" draggable="folse" ondragstart="drag(event)"  class="box disableTextSelect offline bootstrap-modal-form-open" data-toggle="modal" data-target="#casinoTerminalInfo"  onclick="boxModalWindow({{ $ps->psid }})" data-id="{{ $ps->psid }}" 
                            style="height: 66px; width: 66px; -moz-user-select: text; left: {{ $ps->leftP }}px; top: {{ $ps->topP }}px;background-color: {{$ps->boxColor}}"
                        >
                            <div class="ps_title shortNameColor" style="background-color: {{$ps->current_game_color !== null ? $ps->current_game_color : 'inherit'}}">
                                <span class="shortName">{{ $ps->current_game }}</span>
                                <span>{{ $ps->seatid }}</span>
                                <i class="glyphicon glyphicon-user"></i>
                            </div>

                            <div class="ps_body" style="font-size: 11px;">

                                <div class="ps_text pull-left">Credit:</div>
                                <div class="boxCdredit" style="line-height: 16px;font-size: 11px;">
                                    {{ number_format($ps->ps_status->current_credit / 100, 2 ) }}
                                </div>

                                <!--<div class="ps_text pull-left" style="line-height: 16px;">
                                    Bet:
                                    <span class="bold boxBet">
                                        {{ number_format($ps->ps_status->current_bet / 100, 2 ) }}
                                    </span>
                                </div> -->
                            </div>
                        </div>
                    @endforeach   
                </div>    
            </div><!-- End Panel Body-->
        </div><!-- End Panel-->
    </div> 
</div>

</div>

<div id="DivColor">
    <h4 style="text-align: center; line-height: 3;">Casino colors.</h4>
    @foreach($games as $game)
        <div style="height: 20px; background-color: {{ $game->color}}">
            {{ $game->client_game_ids->client_game_name }}---{{ $game->short_name}}
        </div>
    @endforeach
</div>

<div id="DivBingoFeed">
    <h4 style="text-align: center; line-height: 3;">Bingo Live Feed</h4>
    <span style="line-height: 3;">Bingo Live Feed</span>
    <div style="line-height: 0.5;">
        <p>Ticket Value: {{$MainConfig->bingo_ticket_cost}}</p>
        <p>Tickets Sold: {{count($psTickets) ? $psTickets->sum('num_tickets') : 0 }}</p>
        <p>Active Players: {{count($psTickets) ? count($psTickets) : 0 }}</p>
        <p>Bingo Prize: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->bingo_cost_bingo : 0 }}</p>
        <p>Bingo Line: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->bingo_cost_line1 : 0 }}</p>
        <p>Jackpot Bingo: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->jackpot_bingo_max_ball : 0 }}</p>
        <p>Jackpot Bingo Max Ball Value: {{$MainConfig->bingo_cost_line1}}</p>
        <p>Jackpot Line Prize: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->jackpot_line_pr_visible : 0 }}</p>
        <p>Jackpot Line Max Ball: {{$MainConfig->jackpot_line_max_ball}}</p>
        <p>My Bonus Prize: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->mybonus_pr_visible : 0 }}</p>
        <p>Bonus Bingo Prize: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->bonus_bingo_pr_visible : 0 }}</p>
        <p>Bonus Bingo Max Ball: {{$MainConfig->bonus_bingo_max_ball}}</p>
        <p>Bonus Line Prize: {{count($psTickets) ? $psTickets->sum('num_tickets') * $MainConfig->bingo_ticket_cost * $MainConfig->bonus_line_pr_visible : 0 }}</p>
        <p>Bonus Line Max Ball: {{$MainConfig->bonus_line_max_ball}}</p>
    </div>
</div>

</div>

<style>
    div#casino-panel-body {
        background: #283048; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #283048 , #859398); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #283048 , #859398); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        border: 1px solid #d1d1e0;
        border-radius:5px;
        min-height: 400px;
    }

    div#DivColor {
        display: none;
        width: 250px;
        border: 1px solid #000000;
        text-align: center;
        position: absolute;
        top: 400px;
        left: 1200px;
        z-index: 1000;
        color: black;
        background-color: #ffffff;
    }

    div#DivBingoFeed {
        display: none;
        width: 250px; border: 1px solid #000000;
        text-align: left;
        position: absolute;
        top: 400px;
        left: 1200px;
        z-index: 1000;
        color: black;
        background-color:#ffffff;
        padding-left: 20px;
    }
</style>

<script>
$( "#GridDrag" ).click(function() {
    if($("#GridDrag").is(':checked')){
        $( ".box" ).attr('draggable', "folse"); //bootstrap-modal-form-open
        $( ".box" ).attr("data-target",'#casinoTerminalInfo');
    }else{
        $( ".box" ).attr('draggable', "true");
        $( ".box" ).attr("data-target",'');
    }
});

$( "#GridColor" ).click(function() {
    if($("#GridColor").is(':checked'))
        $( "#DivColor" ).show();
    else
        $( "#DivColor" ).hide();    
});

$( "#GridBingoFeed" ).click(function() {
    if($("#GridBingoFeed").is(':checked'))
        $( "#DivBingoFeed" ).show();
    else
        $( "#DivBingoFeed" ).hide();    
});

//var number = 1234567.89;
//console.log(number.toLocaleString('en'));
</script>