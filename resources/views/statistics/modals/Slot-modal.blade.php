
<div class="row">
    <div class="modal fade" id="SlotHistory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="left: 50px; top: 50px;">
        <div  id="DivBingo" style="display: show; min-width: 1400px; min-height: 300px; border: 1px solid #000000; text-align: left;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">@lang('messages.Slot'): </span>
                <span id='SlotHead' style="font-size: 16px; ">{{$page['gamesDescription']}}</span>
                <span style="font-size: 16px; ">@lang('messages.PS ID'): </span>
                <span id='SlotHead1' style="font-size: 16px; "></span>
                <span style="font-size: 16px; ">@lang('messages.Time'): </span>
                <span id='SlotHead2' style="font-size: 16px; "></span>
            </div>
            <div class="modal-body" >
                <div style="display: table-cell;vertical-align: top; padding-right: 20px; width: 400px">
                    <div>
                        @lang('messages.Wins'):
                        <b id='Wins'></b>
                    </div>
                    <div>
                        @lang('messages.Lines Win'):
                        <b id='LinesWin'></b>
                    </div>
                    <div style="vertical-align: central; ">
                        
                        <span style="bottom: 15px; position: relative; display: inline-block;">@lang('messages.Lines') <b id='Lines'></b>: </span>
                            <div style="background-image: url('images/Slots/10_36.png'); background-position: 76px 0; width: 38px;  height: 36px; position: relative; display: inline-block; "></div>
                            <div style="background-image: url('images/Slots/10_36.png'); background-position: 114px 0; width: 38px;  height: 36px; position: relative; display: inline-block; "></div>
                            <div style="background-image: url('images/Slots/10_36.png'); background-position: 152px 0; width: 36px;  height: 36px; position: relative; display: inline-block;"></div>
                        
                        <b id='totalBet3'></b>
                    </div>
                    <hr />
                    <div>
                        @lang('messages.Lines Played'):
                        <b id='totalLinesPlayed'></b>
                    </div>
                    <div>
                        @lang('messages.Bet per Line'):
                        <b id='totalBetPerLine'></b>
                    </div>
                    <div>
                        @lang('messages.Denomination'):
                        <b id='totalDenomination'></b>
                    </div>
                    <div>
                        @lang('messages.Total Bet'):
                        <b id='totalBet'></b>
                    </div>
                    <div>
                        @lang('messages.Total Win'):
                        <b id='totalWin'></b>
                    </div>
                </div>
                
              
                <div style="display: table-cell;">
                    <div id="SlotWin1" style="background-image: url('images/Slots/10_115.png'); background-position: 0px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin2" style="background-image: url('images/Slots/10_115.png'); background-position: 121px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin3" style="background-image: url('images/Slots/10_115.png'); background-position: 243px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin4" style="background-image: url('images/Slots/10_115.png'); background-position: 365px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin5" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <br />
                    <div id="SlotWin6" style="background-image: url('images/Slots/10_115.png'); background-position: 609px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin7" style="background-image: url('images/Slots/10_115.png'); background-position: 731px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin8" style="background-image: url('images/Slots/10_115.png'); background-position: 853px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin9" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin10" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <br />
                    <div id="SlotWin11" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin12" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block; "></div>
                    <div id="SlotWin13" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin14" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <div id="SlotWin15" style="background-image: url('images/Slots/10_115.png'); background-position: 487px 0; width: 122px;  height: 115px; position: relative; display: inline-block;"></div>
                    <!--
                    <div style="background-image: url('images/Slots/10_115.png'); width: 122px;  height: 115px; position: relative; "></div>
                    <div class="rlt_board"  aria-hidden="false" style="background-image: url('images/BJ/ebj_mg_bgr.png'); background-size: 1200px; height: 750px; position: relative; width: 1200px;">
                        <div class="lucky_chip ng-scope"  style="left: 30px; top: 315px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 270px; top: 410px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 525px; top: 445px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 790px; top: 410px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 1020px; top: 315px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <span id='BJcards'></span>
                    </div>
                   -->
                </div>
                <br />
                <div style='text-align: center;'>
                    <input id='next-prev' type="hidden" data-table='' data-ts='' >
                    <a style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;<i id='prevArrow' class="fa fa-angle-left" style="color: #333; font-size: 20px;" onclick='changeModalWindow("Prev");'></i>&nbsp;&nbsp;</a>
                    @lang('messages.Game'): <span id="gameIDArrow">&nbsp;&nbsp;&nbsp;</span>
                    <a style="text-decoration: none;">&nbsp;&nbsp;<i id='nextArrow' class="fa fa-angle-right" style="color: #333; font-size: 20px;" onclick='changeModalWindow("Next");'></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div> 
            
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick='ExportToPNGSlot();'>@lang('messages.Export to PNG')</button>
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close') <i class="glyphicon glyphicon-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
<div class='faSpinnerBJ' style="display: none; left: 800px; top: 490px; position: absolute; z-index: 10000;">
    <i class="fa fa-spinner fa-spin" style="font-size:24px; color: #ffffff;"></i>
</div>

<script>
    var token = '{{ Session::token() }}';
    
</script>
    