
<div class="row">
    <div class="modal fade" id="BJHistory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; min-width: 1400px; min-height: 300px; border: 1px solid #000000; text-align: left; left: 100px; top: 100px;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span id='BJHead' style="font-size: 16px; ">PS: 2, Time: 2016-09-12 14:19:43</span>
            </div>
            <div class="modal-body" >
                <div style="display: table-cell;vertical-align: top; padding-right: 20px; width: 200px">
                    <div>
                        Total Bet:
                        <b id='totalBet'></b>
                    </div>
                    <div>
                        Total Win:
                        <b id='totalWin'></b>
                    </div>
                </div>
                
              
                <div style="display: table-cell;">
                    <div class="rlt_board"  aria-hidden="false" style="background-image: url('images/BJ/ebj_mg_bgr.png'); background-size: 1200px; height: 750px; position: relative; width: 1200px;">
                        <div class="lucky_chip ng-scope"  style="left: 30px; top: 315px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 270px; top: 410px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 525px; top: 445px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 790px; top: 410px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <div class="lucky_chip ng-scope"  style="left: 1020px; top: 315px; background-image: url('images/BJ/ebj_mg_player_status_a.png'); background-size: 150px; height: 135px; position: absolute;width: 150px;"></div>
                        <span id='BJcards'></span>
                    </div>
                   
                </div>
                <br />
                <div style='text-align: center;'>
                    <input id='next-prev' type="hidden" data-table='' data-ts='' >
                    <a><i id='prevArrow' class="fa fa-angle-left" style="color: #333; font-size: 20px;" onclick='changeModalWindow("Prev");'></i></a>
                    &nbsp;&nbsp;Game: <span id="gameIDArrow">&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;
                    <a><i id='nextArrow' class="fa fa-angle-right" style="color: #333; font-size: 20px;" onclick='changeModalWindow("Next");'></i></a>
                </div>
            </div> 
            
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick='ExportToPNGBJ();'>Export to PNG</button>
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">Close <i class="glyphicon glyphicon-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
<div class='faSpinnerBJ' style="display: none; left: 800px; top: 490px; position: absolute; z-index: 10000;">
    <i class="fa fa-spinner fa-spin" style="font-size:24px; color: #ffffff;"></i>
</div>

<script>
    var token = '{{ Session::token() }}';
    var add_machine = '{{ route('add.machine') }}';
</script>
    