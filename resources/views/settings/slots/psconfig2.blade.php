<form id="registerSubmit">
    @foreach($results as $conf)
        <div class="col-lg-4">
            <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Gamble'):</h3>
            <hr style="margin: 7px 0 12px 0;">
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="bonus_type">@lang('messages.Gamble Type'):</label><br>
                <div class="input-group" style="width:100%; display: inline-block;">
                    <select name="bonus_type" class="form-control imput-sm  col-lg-12" '>
                            <option {{ $conf->bonus_type == 0 ? 'selected="true"' : '' }} value="0" >Red/Black</option>
                            <option {{ $conf->bonus_type == 1 ? 'selected="true"' : '' }} value="1" >5 Cards</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="gamblemaxamount">@lang('messages.Max Ammount'):</label><br>
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="gamblemaxamount" style=" " value="{{ $conf->gamblemaxamount ? $conf->gamblemaxamount : ''}}" type="text" class="form-control text-center " placeholder="Max Ammount" aria-describedby="sizing-addon2">
                </div> 
            </div>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="gamblemaxattempt">@lang('messages.Max Attempt'):</label><br>
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="gamblemaxattempt"   style=" "  value="{{ $conf->gamblemaxattempt ? $conf->gamblemaxattempt : ''}}" type="text" class="form-control text-center " placeholder="Max Attempt" aria-describedby="sizing-addon2">
                </div> 
            </div> 
            <br />
            
            <label for="bonus_type" style="margin: 15px 0px 0px 0px;">@lang('messages.Bet Buttons multipliers')<br/>(@lang('messages.per line, credits') )</label><br />
            <hr style="margin: 7px 0 12px 0;">
            <label for="button1value">@lang('messages.Button') 1:</label>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="button1value" style=";"  value="{{$conf->button1value }}" type="text" class="form-control text-center buttonvalue" placeholder="Min Lines of play" aria-describedby="sizing-addon2">
                </div> 
            </div>
            <label for="bonus_type">@lang('messages.Button') 2:</label><br>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="button2value" style=""  value="{{$conf->button2value }}" type="text" class="form-control text-center buttonvalue" placeholder="Min Lines of play" aria-describedby="sizing-addon2">
                </div> 
            </div>
            <label for="bonus_type">@lang('messages.Button') 3:</label><br>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="button3value" style=""  value="{{$conf->button3value }}" type="text" class="form-control text-center buttonvalue" placeholder="Min Lines of play" aria-describedby="sizing-addon2">
                </div> 
            </div>
            <label for="bonus_type">@lang('messages.Button') 4:</label><br>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="button4value" style=""  value="{{$conf->button4value }}" type="text" class="form-control text-center buttonvalue" placeholder="Min Lines of play" aria-describedby="sizing-addon2">
                </div> 
            </div>
            <label for="bonus_type">@lang('messages.Button') 5:</label><br>
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name="button5value" style=""  value="{{$conf->button5value }}" type="text" class="form-control text-center buttonvalue" placeholder="Min Lines of play" aria-describedby="sizing-addon2">
                </div> 
            </div>
            
            <br />
            
            
        </div>    
    <div class="col-lg-4">
        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations'):</h3>
        <hr style="margin: 7px 0 12px 0;">

        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="denomination_1_idx">@lang('messages.Denomination') #1:</label><br>
            <div class="input-group" style="width:100%; display: inline-block;">
                <select id="denom1" name="denomination_1_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="1">
                    <?php $idxNum = 0; ?>
                    @foreach ($denominations as $val)
                        <option {{ $conf->denomination_1_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                        <?php $idxNum += 1; ?>
                    @endforeach
                </select>
            </div>
        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_2_idx">@lang('messages.Denomination') #2:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom2" name="denomination_2_idx" class="form-control imput-sm col-lg-12 denom" style='display: block; ' data-id="2">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_2_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_3_idx">@lang('messages.Denomination') #3:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom3" name="denomination_3_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="3">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_3_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_4_idx">@lang('messages.Denomination') #4:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom4" name="denomination_4_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="4">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_4_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_5_idx">@lang('messages.Denomination') #5:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom5" name="denomination_5_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="5">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_5_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_6_idx">@lang('messages.Denomination') #6:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom6" name="denomination_6_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="6">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_6_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_7_idx">@lang('messages.Denomination') #7:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom7" name="denomination_7_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="7">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_7_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_8_idx">@lang('messages.Denomination') #8:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom8" name="denomination_8_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="8">
                                    <?php $idxNum = 0; ?>
                                    @foreach ($denominations as $val)
                                        <option {{ $conf->denomination_8_idx == $val->idx ? 'selected="true"' : '' }} value="{{$val->idx}}" data_sort="{{$idxNum}}">{{ $val->valuemoney == 0 ? "None" : number_format($val->valuemoney/100, 2)}}</option>
                                        <?php $idxNum += 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
            <!--<h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Min Lines of play'):</h3>-->
            <label for="bonus_type">@lang('messages.Min Lines of play'):</label><br>
            <!--<hr style="margin: 7px 0 12px 0;"> -->
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <select name="minlines" class="form-control imput-sm col-lg-12 " style='display: block;'>
                        <?php $idxNum = 0; ?>
                        @foreach ($minLine as $val)
                            <option {{ $conf->minlines == $val ? 'selected="true"' : '' }} value="{{$val}}" >{{ $val }}</option>
                            <?php $idxNum += 1; ?>
                        @endforeach
                    </select>
                </div>
            </div>
                                        
    </div>    
    <div class="col-lg-4">
        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations') RTP:</h3>
        <hr style="margin: 7px 0 12px 0;">

            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom1_idx" style="margin-top: 0px;">@lang('messages.Denominations') RTP 1:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom1_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom1_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom2_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 2:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom2_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom2_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom3_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 3:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom3_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom3_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom4_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 4:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom4_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom4_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom5_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 5:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom5_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom5_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom6_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 6:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom6_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom6_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom7_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 7:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom7_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom7_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom8_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 8:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom8_idx" class="form-control imput-sm " >
                        @foreach($denomRTP as $key => $val)
                            <option {{ $conf->mathdenom8_idx == $key ? 'selected="true"' : '' }} value="{{$key}}" data_sort="1">{{ number_format($val / 100, 2 ) }}</option>
                        @endforeach
                    </select>    
                </div> 
            </div> 


    </div>    
    <input id="formUdate" name="_token" value="1234" type="hidden" data-table="psconf"    />
    <input id="gameUdate" name="gameid" value="1234" type="hidden" data-table="psconf"    />
    <input name="ps_id" value="{{ $conf->ps_id }}" type="hidden" data-table="psconf"    />
@endforeach
    @if ( isset($conf->ps_id))
        @if ( $conf->ps_id == 0 )
            <a  onclick="UpdateAllGame();"
                style="width:315px; margin: 0px 10px 10px 17px; position: relative; bottom: 0px; right: 5px" 
                class="btn btn-danger pull-right ps-config-submit"
            >
                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                @lang('messages.Update to All')
            </a>


            @else
            <a  onclick="UpdateGame();"
                style="width:315px; margin: 10px 10px 10px 17px; position: relative; bottom: 0px; right: 5px;" 
                class="btn btn-danger pull-right ps-config-submit"
            >
                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                @lang('messages.Update')
            </a>
        @endif
    @endif
</form>

<script>
    var denomPrev = new Array("0", $('#denom1').val(), $('#denom2').val(), $('#denom3').val(), $('#denom4').val(), $('#denom5').val(), $('#denom6').val(), $('#denom7').val(), $('#denom8').val()); //$('#denom1').attr('data-prev', denom[1]);
    var denom = new Array("0", $('#denom1').find(":selected").attr("data_sort"), $('#denom2').find(":selected").attr("data_sort"), $('#denom3').find(":selected").attr("data_sort"), $('#denom4').find(":selected").attr("data_sort"), $('#denom5').find(":selected").attr("data_sort"), $('#denom6').find(":selected").attr("data_sort"), $('#denom7').find(":selected").attr("data_sort"), $('#denom8').find(":selected").attr("data_sort")); //$('#denom1').attr('data-prev', denom[1]);
 
    $( ".buttonvalue" ).change(function() {
        value = Math.abs(Math.round($(this).val()));
        $(this).val(value);
    });
    $('select.denom').on('change', function() {
        denomID =  parseInt($(this).attr("data-id"));
        denomNew = parseInt($(this).find(":selected").attr("data_sort"));
        denomNewVal = parseInt($(this).val());
            if (denomID != 9){
                if ((denom[1] != denomNew && denom[2] != denomNew  && denom[3] != denomNew  && denom[4] != denomNew) || denomNew == 0 ){
                    if (denomID == 1 && ((denom[2] > denomNew && denomNew != 0) || (denom[2] == 0 && denomNew != 0))){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                    }else if (denomID == 2 && (((denom[3] > denomNew || denom[3] == 0) && denom[1] < denomNew) || denomNew == 0 )){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom3').val('26').change();
                        }
                    }else if (denomID == 3 && (((denom[4] > denomNew || denom[4] == 0) && denom[2] < denomNew && denom[2] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom4').val('26').change();
                        }
                    }else if (denomID == 4 && (((denom[5] > denomNew || denom[5] == 0) && denom[3] < denomNew && denom[3] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom5').val('26').change();
                        }
                    }else if (denomID == 5 && (((denom[6] > denomNew || denom[6] == 0) && denom[4] < denomNew && denom[4] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom6').val('26').change();
                        }
                    }else if (denomID == 6 && (((denom[7] > denomNew || denom[7] == 0) && denom[5] < denomNew && denom[5] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom7').val('26').change();
                        }
                    }else if (denomID == 7 && (((denom[8] > denomNew || denom[8] == 0) && denom[6] < denomNew && denom[6] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom8').val('26').change();
                        }
                    }else if (denomID == 8 && ((denom[7] < denomNew && denom[7] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                    }else{
                        thisVal = denomPrev[denomID];
                        $(this).val(thisVal).change();
                    }
                }else{
                    thisVal = denomPrev[denomID];
                    $(this).val(thisVal).change(function() {
                        //alert("previous"); //I have previous value 
                    });
                }
            }
    
    
    });
</script>    