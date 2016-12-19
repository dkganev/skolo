<!-- Casino Terminal Info --> 
<div class="row">
    <div class="modal fade" id="bingoHistory_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"style="left: 100px; top: 100px;">
        <div  id="DivBingo" style="display: show; width: 1280px; min-height: 300px; border: 1px solid #000000; text-align: left; position: absolute; color: black; background-color: #ffffff; ">
            <div class="modal-header" style="background: #428bca none repeat scroll 0 0;  color: #ffffff;">
                <!--<button type="button" style="font-size: 26px; " >×</button>-->
                <a href="#" class=" pull-right" style="font-size: 16px; right: 15px !important;  color: #ffffff;" onclick="$('#ModalClose').click();">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                <span style="font-size: 16px; ">@lang('messages.Bingo')</span>
            </div>
            <div class="modal-body" >
               <table class="table table-striped" id='bingoPurchase_History'>
                    <tbody>
                        <tr>
                            <th>@lang('messages.PS ID')</th>
                            <th>@lang('messages.Total tickets')</th>
                            <th>@lang('messages.Ticket cost')</th>
                            <th>@lang('messages.Amount Won')</th>
                            <th>@lang('messages.Action')</th>
                        </tr>
                        
                    </tbody>
                </table> 
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick='ExportToPNGBingo();'>@lang('messages.Export to PNG')</button>
                <button id="ModalClose" type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.Close') <i class="glyphicon glyphicon-arrow-right"></i></button>
        
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{ Session::token() }}';
    
</script>
