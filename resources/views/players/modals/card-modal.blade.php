<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="cardTransactions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"style="left: 10px; top: 30px;">
        <div  id="DivBingo" style="display: show; width: 99%; min-height: 400px; border: 1px solid #000000; text-align: left; position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">@lang('messages.Transaction History')</span>
            </div>
            <div class="modal-body" >
               <table class="table table-striped" id='bingoPurchase_History'>
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
                <button type="button" class="btn btn-warning" onclick='ExportToExcel();'> <i class="fa fa-btn fa-file-excel-o fa-lg" aria-hidden="true"></i> @lang('messages.Export')</button>
                <button type="button" class="btn btn-warning" onclick='ExportToPNGBingo();'>@lang('messages.Export to PNG')</button>
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close') <i class="glyphicon glyphicon-arrow-right"></i></button>
        
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{ Session::token() }}';
    
</script>
