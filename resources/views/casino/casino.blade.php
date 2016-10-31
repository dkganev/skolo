@include('modals.casinoTerminalInfo-modals')
<link rel="stylesheet" href="/css/casinoProview.css">

<div class="container-full">
<div class="row">
     <!--  page header -->
    <div class="col-lg-12">
        <h2 style="margin-top: 0px;" class="page-header">Casino</h2>
    </div>
     <!-- end  page header -->
</div>
</div>

<div class="container-full">
<div class="row" style="user-select: none;">
    <div class="col-md-12 "> 
        <!-- Start Panel-->
        <div  class="panel panel-default">
            <div id="test123" class="panel-heading">
                <div class="row" >
                    <div class="col-md-1 "></div>
                    <div class="col-md-2 "> 
                        <label class="switch">
                            <input id="GridDrag" type="checkbox" checked >
                            <div class="slider round"></div>
                        </label>
                        <span style="vertical-align: top; line-height: 2.00;"> Grid</span>
                    </div>
                    <div class="col-md-2 "> 
                        <label class="switch">
                            <input id="GridColor" type="checkbox" >
                            <div class="slider round"></div>
                        </label>
                        <span style="vertical-align: top; line-height: 2.00;"> Games Colors</span>
                    </div>
                    <div class="col-md-1 "></div>
                    <div class="col-md-2 "> 
                        <label class="switch">
                            <input id="GridBingoFeed" type="checkbox" >
                            <div class="slider round"></div>
                        </label>
                        <span  style="vertical-align: top; line-height: 2.00;"> Bingo Feed</span>
                    </div>    
                </div>
                <div class="row" >
                    <div class="col-md-12 ">
                <button class="btn btn-info btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible;  ">
                    Free
                    <span id="BtnFree" class="badge ng-binding" style="background-color: #303030;color: #fff;"> {{$PsSettingsFree}} </span>
                </button>
                <button class="btn-success btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible; ">
                    Active
                    <span id="BtnActive" class="badge ng-binding" style="background-color: #303030;color: #fff;"> {{$PsSettingsActive}} </span>
                </button>
                <button class="btn  btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible; background-color: #ccb2ff; ">
                    Call Attend
                    <span id="BtnCallAttend" class="badge ng-binding" style="background-color: #303030;color: #fff;"> {{$PsSettingsAttendant}} </span>
                </button>
                <button class="btn btn-warning btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible; ">
                    Cash Out
                    <span class="badge ng-binding" style="background-color: #303030;color: #fff;"> 14 </span>
                </button>
                <button class="btn btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible; background-color: #9c9c9c; ">
                    Offline
                    <span id="BtnOffline" class="badge ng-binding" style="background-color: #303030;color: #fff;"> {{$PsSettingsOffline}} </span>
                </button>
                <button class="btn btn-danger btn-sm bootstrap-modal-form-open" data-toggle="modal" data-target="#addMachineModal" style="visibility: visible; ">
                    <i class="glyphicon glyphicon-remove"></i>
                    Errors
                    <span id="BtnErrors" class="badge ng-binding" style="background-color: #303030;color: #fff;"> {{$PsSettingsError}} </span>
                </button>
                <button class="btn btn-default btn-sm bootstrap-modal-form-open" data-toggle="modal"  data-target="#addMachineModal" style="visibility: visible; ">
                    <i class="glyphicon glyphicon-user"></i>
                    Players
                    <span class="badge ng-binding" style="background-color: #303030;color: #fff;"> 14 </span>
                </button>

                    </div>
                </div>
            </div>
            <div class="panel-body" style="background: #283048; /* fallback for old browsers */
                    background: -webkit-linear-gradient(to left, #283048 , #859398); /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to left, #283048 , #859398); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */border: 1px solid #d1d1e0; border-radius:5px;  min-height: 400px">

                <div id="casinoPreview" ondrop="drop(event)" ondragover="allowDrop(event)" style="height: 650px; " >  
                    @foreach($server_ps as $ps)    
                        <div class="" >
                            <div  id="box{{ $ps->psid }}" data_boxStatus="{{ $ps->boxStatus }}" draggable="folse" ondragstart="drag(event)"  class="box disableTextSelect offline bootstrap-modal-form-open" data-toggle="modal" data-target="#casinoTerminalInfo"  onclick="boxModalWindow({{ $ps->psid }})"   data-id="{{ $ps->psid }}" style=" height: 66px; width: 66px; -moz-user-select: text; left: {{ $ps->leftP }}px; top: {{ $ps->topP }}px;background-color: {{$ps->boxColor}} ">
                                <div class="ps_title shortNameColor" style="background-color: {{$ps->current_game_color !== null ? $ps->current_game_color : 'inherit'}}">
                                    <span class="shortName ng-binding" >{{$ps->current_game}}</span>
                                    <span class="ng-binding" > {{ $ps->seatid }} </span>
                                    <i class="glyphicon glyphicon-asterisk ng-hide" style="color: red; display: none;" aria-hidden="true"></i>
                                    <i class="glyphicon glyphicon-user"  aria-hidden="false"></i>
                                </div>
                                <div class="ps_body" style="font-size: 11px;" aria-hidden="false">
                                    <div class="ps_text pull-left">Credit: </div>
                                    <div class="ng-binding boxCdredit" style="line-height: 16px;font-size: 11px;" ><?php echo number_format($ps->ps_status->current_credit / 100, 2 ); ?></div>
                                    <div class="ps_text pull-left" style="line-height: 16px;">
                                        Bet:
                                        <span class="bold ng-binding boxBet" ><?php echo number_format($ps->ps_status->current_bet / 100, 2 ); ?></span>
                                    </div>
                                </div>
                                <div class="ps_body ng-hide" style="font-size: 11px;  display: none;" aria-hidden="true">
                                    <div class="ps_text ng-binding" >Lobby</div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach   
                </div>    
            </div>
        </div>
        <!-- End Panel-->
    </div> 
</div>
<div id="DivColor" style="display: none; width: 250px; border: 1px solid #000000; text-align: center; position: absolute; top: 400px; left: 1200px; z-index: 1000; color: black; background-color: #ffffff;">
    <h4 style="text-align: center; line-height: 3;">Casino colors.</h4>
    
    @foreach($games as $game)
        <div gameID = "{{ $game->gameid}}" style="height: 20px; background-color: {{ $game->color}}" > {{ $game->client_game_ids->client_game_name }}---{{ $game->short_name}} </div>
    @endforeach
   
    
</div>
<div  id="DivBingoFeed" style="display: none; width: 250px; border: 1px solid #000000; text-align: left; position: absolute; top: 400px; left: 1200px; z-index: 1000; color: black; background-color: #ffffff; padding-left: 20px;">
    <h4 style="text-align: center; line-height: 3;">Bingo Live Feed</h4>
    <div class="">
        <div class="">
            <span class="">
                <span class="" style=" line-height: 3;">Bingo Live Feed</span>
            </span>
        </div>
    </div>
    <div class="" layout="column" style=" line-height: 0.5;">
        <p class="ng-binding">Ticket Value: 0.03</p>
        <p class="ng-binding">Tickets Sold: 0</p>
        <p class="ng-binding">Active Players: 0</p>
        <p class="ng-binding">Bingo Prize: 0.00</p>
        <p class="ng-binding">Bingo Line: 0.00</p>
        <p class="ng-binding">Jackpot Bingo: 23.30</p>
        <p class="ng-binding">Jackpot Bingo Max Ball Value: </p>
        <p class="ng-binding">Jackpot Line Prize: 13.29</p>
        <p class="ng-binding">Jackpot Line Max Ball: </p>
        <p class="ng-binding">My Bonus Prize: 0.85</p>
        <p class="ng-binding">Bonus Bingo Prize: 1.93</p>
        <p class="ng-binding">Bonus Bingo Max Ball: </p>
        <p class="ng-binding">Bonus Line Prize: 1.32</p>
        <p class="ng-binding">Bonus Line Max Ball: </p>
    </div>
</div>
</div>

