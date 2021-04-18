<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="rouletteHistory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="left: 50px; top: 50px; ">
        <div  style="display: show; min-width: 1400px; min-height: 300px; border: 1px solid #000000; text-align: left; position: absolute; color: black; background-color: #ffffff; overflow: hidden; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">PS: </span>
                <span id='rouletteHead' style="font-size: 16px; ">\</span>
                <span style="font-size: 16px; ">, @lang('messages.Time'): </span>
                <span id='rouletteHead1' style="font-size: 16px; "></span>
                
            </div>
            <div class="modal-body" >
                <div style="display: table-cell;vertical-align: top;padding-right: 20px; width: 200px">
                    <div>
                        @lang('messages.Win Number')
                        <b id='winNumber'></b>
                    </div>
                    <br>
                    <div>
                        @lang('messages.Total Bet'):
                        <b id='totalBet'></b>
                    </div>
                    <div>
                        @lang('messages.Total Win'):
                        <b id='totalWin'></b>
                    </div>
                    <div class="ng-hide" >
                        @lang('messages.Jackpot'):
                        <b id='jackpotWon'></b>
                    </div>
                </div>
                
              
                <div style="display: table-cell;">
                    <div id='roulettePic' class="rlt_board"  aria-hidden="false" style="background-image: url('images/roulette/roulette_table.png'); height: 534px; position: relative; width: 1440px;">
                        <div class="lucky_chip ng-scope"  style="left: 385px; top: 445px; background-image: url('images/roulette/lcc_mg_chips_small.png'); height: 63px; position: absolute;width: 63px;">
                            <div class="lucky_value ng-binding" style="color: #fff; font-weight: bold; padding-top: 22px; text-align: center">40.00</div>
                        </div>
                        <div class="lucky_chip ng-scope" style="left: 790px; top: 445px; background-image: url('images/roulette/lcc_mg_chips_small.png'); height: 63px; position: absolute;width: 63px;">
                            <div class="lucky_value ng-binding" style="color: #fff; font-weight: bold; padding-top: 22px; text-align: center">70.00</div>
                        </div>
                    </div>
                </div>
                <br />
                <div style='text-align: center;'>
                    <input id='next-prevR' type="hidden" data-id='' data-ts='' >
                    <a><i id='prevArrowR' class="fa fa-angle-left" style="color: #333; font-size: 20px;" onclick='changeModalWindowR("Prev");'></i></a>
                    &nbsp;&nbsp;@lang('messages.Game'): <span id="gameIDArrowR">&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;
                    <a><i id='nextArrowR' class="fa fa-angle-right" style="color: #333; font-size: 20px;" onclick='changeModalWindowR("Next");'></i></a>
                </div>
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick='ExportToPNGR();'>@lang('messages.Export to PNG')</button>
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close') <i class="glyphicon glyphicon-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{ Session::token() }}';
    
</script>
