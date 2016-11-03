<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="bingoHistory2_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div  id="DivBingo" style="display: show; width: 1280px; min-height: 300px; border: 1px solid #000000; text-align: left; left: 200px; top: 100px;  position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('.ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">Bingo - Tickets bought on PS </span><span id='ticketNumber'>1</span><span> for Game # </span><span id='gameNumber'></span>
            </div>
            <div class="modal-body" >
                <span id='balsHistory' style="font-size: 14px; ">Balls:  </span>
                <br/><br/>
                <span id='psTicketsArchive' style="font-size: 14px; font-weight: bold; ">My Bonus Numbers: </span>
                
                
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
                <button type="button" class="btn btn-default ModalClose" data-dismiss="modal">Close <i class="glyphicon glyphicon-arrow-right"></i></button>
        
            </div>
        </div>
    </div>
</div>
<div class='faSpinnerBingo' style="display: none; left: 800px; top: 400px; position: absolute; z-index: 10000;">
    <i class="fa fa-spinner fa-spin" style="font-size:24px; color: #ffffff;"></i>
</div>
<script>
    var token = '{{ Session::token() }}';
    var add_machine = '{{ route('add.machine') }}';
</script>
