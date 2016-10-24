<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="casinoTerminalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; width: 1280px; min-height: 300px; border: 1px solid #000000; text-align: left; left: 200px; top: 100px;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">Bingo</span>
            </div>
            <div class="modal-body" >
               <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>PS ID</th>
                            <th>Total tickets</th>
                            <th>Ticket cost</th>
                            <th>Amount Won</th>
                            <th>Action</th>
                        </tr>
                        <tr class="ng-scope" ng-repea   ng-app=""t="list in ::hbm.psList">
                            <td class="ng-binding">1</td>
                            <td class="ng-binding">240</td>
                            <td class="ng-binding">0.03</td>
                            <td class="ng-binding">19.31</td>
                            <td>
                                <button class="btn btn-primary btn-xs" type="button" ng-click="hbm.showTickets(list.unique_game_seq, list.psid, list.seatid)" style="float: left;" tabindex="0">
                                    <i class="glyphicon glyphicon-open"></i>
                                    Show Tickets
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table> 
               
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
