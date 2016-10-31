<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="rouletteHistory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; min-width: 1400px; min-height: 300px; border: 1px solid #000000; text-align: left; left: 100px; top: 100px;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span id='rouletteHead' style="font-size: 16px; ">PS: 2, Time: 2016-09-12 14:19:43</span>
            </div>
            <div class="modal-body" >
                <div style="display: table-cell;vertical-align: top;padding-right: 20px;">
                    <div>
                        Win Number
                        <b id='winNumber'>1</b>
                    </div>
                    <br>
                    <div>
                        Total Bet:
                        <b id='totalBet'>110.00</b>
                    </div>
                    <div>
                        Total Win:
                        <b id='totalWin'>0.00</b>
                    </div>
                    <div class="ng-hide" ng-show="hist.rlt_row.jackpot > 0" aria-hidden="true">
                        Jackpot Won:
                        <b id='jackpotWon'>0.00</b>
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
            </div>    
            <div class="modal-footer">
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">Close <i class="glyphicon glyphicon-arrow-right"></i></button>
        
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_machine = '{{ route('add.machine') }}';
</script>
