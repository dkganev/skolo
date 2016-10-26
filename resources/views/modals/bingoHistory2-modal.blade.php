<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="bingoHistory2_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; width: 1280px; min-height: 300px; border: 1px solid #000000; text-align: left; left: 200px; top: 100px;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">Bingo - Tickets bought on PS </span><span id='ticketNumber'>1</span><span> for Game # </span><span id='gameNumber'>11066</span>
            </div>
            <div class="modal-body" >
                <span id='balsHistory' style="font-size: 14px; ">Balls: 31, 58, 18, 81, 28, 70, 52, 51, 14, 67, 29, 22, 13, 63, 86, 75, 71, 45, 90, 24, 74, 15, 21, 88, 64, 7, 57, 34, 76, 47, 23, 56, 8, 35, 85, 60, 11, 69, 73, 53, 39, 54, 49, 10, 50, 38, 19, 66, 72, 1, 25, 68, 55, 89, 32, 43, 83, 79, 61, 36, 48, 30, 46, 42, 77, 44, 20, 2, </span>
                <br/><br/>
                <span style="font-size: 14px; font-weight: bold; ">My Bonus Numbers: 29, 36, 53 </span>
                
                
                <table class="table table-striped" id='bingoTickets_History'>
                    <tbody>
                        <tr>
                            <th>PS ID</th>
                            <th>Total tickets</th>
                            <th>Ticket cost</th>
                            <th>Amount Won</th>
                            <th>Action</th>
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
