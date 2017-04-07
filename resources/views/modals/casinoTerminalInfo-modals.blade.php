<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="casinoTerminalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; width: 250px; min-height: 600px; border: 1px solid #000000; text-align: left; position: absolute; top: 90px; right: 14px; z-index: 1000; color: black; background-color: #ffffff; border-radius: 5px;">
            <div class="panel-heading" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">PS ID: </span><span id="ModalBoxID" style="font-size: 16px; ">20</span>
            </div>
            <div class="modal-body" >
                <!--<div style="font-size: 16px; padding-bottom: 10px;">
                    <div class="ng-scope" ng-if="(psinfo.cashout === 1 || (psinfo.credit > 0 && psinfo.online === false && psinfo.current_bet == 0)) && psinfo.error_cnt === 0">
                        <button class="btn btn-warning btn-sm" type="button" ng-click="preview.cashOut()" tabindex="0">
                            <i class="glyphicon glyphicon-download-alt"></i>
                            Cash Out
                        </button>
                    </div>
                </div> -->
                <div class="aside-credit">
                    <div class="list-group">
                        <table id="example" class="table table-striped table-bordered table-hover" role="grid">
                            <thead class="w3-dark-grey">
                                <tr>
                                    <th class="text-center GameInfo" style='text-align: center !Important; '> @lang('messages.Playstation Info') </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                         @lang('messages.Status'): <span id="ModalStatus">Offline</span>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         @lang('messages.Credit'): <span id="ModalCredit">777.87</span> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--<a class="list-group-item panel-heading table-hover" href=""> Playstation Info </a>
                        <div class="list-group-item ng-binding"> Status: <span id="ModalStatus">Offline</span>  </div>
                        <div class="list-group-item ng-binding"> Credit: <span id="ModalCredit">777.87</span> </div>-->
                    </div>
                    <!--
                    <div class="aside-psinfo-player" ng-show="psinfo.card_info" aria-hidden="false">
                        <hr>
                        <div class="panel-group" role="tablist">
                            <div class="panel panel-default">
                                <div id="playersInfoHeadeing" class="panel-heading" role="tab">
                                    <div class="pointer" data-toggle="collapse" data-target="#playersInfo">
                                        Player Info
                                        <i class="glyphicon glyphicon-collapse-down"></i>
                                    </div>
                                </div>
                                <div id="playersInfo" class="panel-collapse collapse" aria-labelledby="playersInfoHeadeing" role="tabpanel">
                                    <ul class="list-group">
                                        <li class="list-group-item ng-hide" ng-show="psinfo.card_info.name" aria-hidden="true">
                                            Name:
                                            <strong class="ng-binding"></strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-group" role="tablist">
                            <div class="panel panel-default">
                                <div id="playerGamesHeading" class="panel-heading" role="tab">
                                    <div class="pointer" data-toggle="collapse" data-target="#playerGames">
                                        Player Bets by game
                                        <i class="glyphicon glyphicon-collapse-down"></i>
                                    </div>
                                </div>
                                <div id="playerGames" class="panel-collapse collapse" aria-labelledby="playerGamesHeading" role="tabpanel">
                                    <ul class="list-group">
                                        <li class="list-group-item ng-binding ng-scope" ng-repeat="game in playerInfo.items.gamestats track by $index" ng-if="game.bet > 0">
                                            Bingo 1 -> Bet:
                                            <strong class="ng-binding">2,591.30</strong>
                                        </li>
                                        <li class="list-group-item ng-binding ng-scope" ng-repeat="game in playerInfo.items.gamestats track by $index" ng-if="game.bet > 0">
                                            Slot Burning Hot -> Bet:
                                            <strong class="ng-binding">2,278.90</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                -->    
                <div class="aside-credit">
                    <canvas id="photoCanvas"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">Close <i class="glyphicon glyphicon-arrow-right"></i></button>
        
            </div>
        </div>
    </div>
</div>

