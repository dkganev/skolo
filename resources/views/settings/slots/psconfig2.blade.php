<form id="registerSubmit">
@foreach($results as $conf)
    <div class="col-lg-4">
        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Gamble'):<br/>&nbsp;</h3>
        <hr style="margin: 7px 0 12px 0;">
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="bonus_type">@lang('messages.Gamble Type'):</label><br>
            <div class="input-group" style="width:100%; display: inline-block;">
                <select name="bonus_type" class="col-lg-12" '>
                        <option {{ $conf->bonus_type == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">Red/Black</option>
                        <option {{ $conf->bonus_type == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">5 Cards</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="gamblemaxamount">@lang('messages.Max Ammount'):</label><br>
            <div class="input-group" style="width:100%; display: inline-block;">
                <input name="gamblemaxamount" style=" " value="{{ $conf->gamblemaxamount ? $conf->gamblemaxamount : ''}}" type="text" class="form-control text-center " placeholder="Game Min Bet" aria-describedby="sizing-addon2">
            </div> 
        </div>
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="gamblemaxattempt">@lang('messages.Max Attempt'):</label><br>
            <div class="input-group" style="width:100%; display: inline-block;">
                <input name="gamblemaxattempt"   style=" "  value="{{ $conf->gamblemaxattempt ? $conf->gamblemaxattempt : ''}}" type="text" class="form-control text-center " placeholder="Game Min Bet" aria-describedby="sizing-addon2">
            </div> 
        </div> 
        <br /><br /><br />
        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Bet Buttons multipliers')<br/>(@lang('messages.per line, credits') ):</h3>
        <hr style="margin: 7px 0 12px 0;">
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <div class="input-group" style="width:100%; display: inline-block;">
                <select name="betsbuttonsidx" class="col-lg-12" '>
                    <option {{ $conf->betsbuttonsidx == 0 ? 'selected="true"' : '' }} value="0" data_sort="1">1|2|3|4|5</option>
                    <option {{ $conf->betsbuttonsidx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">1|2|3|5|10</option>
                    <option {{ $conf->betsbuttonsidx == 2 ? 'selected="true"' : '' }} value="2" data_sort="1">1|2|5|10|20</option>
                    <option {{ $conf->betsbuttonsidx == 3 ? 'selected="true"' : '' }} value="3" data_sort="1">1|2|5|10|30</option>
                    <option {{ $conf->betsbuttonsidx == 4 ? 'selected="true"' : '' }} value="4" data_sort="1">1|5|10|20|40</option>
                    <option {{ $conf->betsbuttonsidx == 5 ? 'selected="true"' : '' }} value="5" data_sort="1">1|5|10|30|50</option>
                    <option {{ $conf->betsbuttonsidx == 6 ? 'selected="true"' : '' }} value="6" data_sort="1">1|10|20|50|100</option>
                </select>    
            </div> 
        </div> 
    </div>    
<div class="col-lg-4">
    <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations'):<br/>&nbsp;</h3>
    <hr style="margin: 7px 0 12px 0;">
    
    <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
        <label for="denomination_1_idx">@lang('messages.Denomination') #1:</label><br>
        <div class="input-group" style="width:100%; display: inline-block;">
            <select name="denomination_1_idx" class="col-lg-12" style='display: block;'>
                <option {{ $conf->denomination_1_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                <option {{ $conf->denomination_1_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                <option {{ $conf->denomination_1_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                <option {{ $conf->denomination_1_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                <option {{ $conf->denomination_1_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                <option {{ $conf->denomination_1_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                <option {{ $conf->denomination_1_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                <option {{ $conf->denomination_1_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                <option {{ $conf->denomination_1_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                <option {{ $conf->denomination_1_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                <option {{ $conf->denomination_1_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                <option {{ $conf->denomination_1_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                <option {{ $conf->denomination_1_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                <option {{ $conf->denomination_1_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                <option {{ $conf->denomination_1_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                <option {{ $conf->denomination_1_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                <option {{ $conf->denomination_1_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                <option {{ $conf->denomination_1_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                <option {{ $conf->denomination_1_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                <option {{ $conf->denomination_1_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                <option {{ $conf->denomination_1_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                <option {{ $conf->denomination_1_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                <option {{ $conf->denomination_1_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                <option {{ $conf->denomination_1_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                <option {{ $conf->denomination_1_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                <option {{ $conf->denomination_1_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
            </select>
        </div>
    </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_2_idx">@lang('messages.Denomination') #2:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_2_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_2_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_2_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_2_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_2_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_2_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_2_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_2_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_2_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_2_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_2_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_2_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_2_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_2_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_2_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_2_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_2_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_2_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_2_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_2_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_2_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_2_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_2_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_2_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_2_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_2_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_2_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_3_idx">@lang('messages.Denomination') #3:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_3_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_3_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_3_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_3_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_3_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_3_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_3_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_3_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_3_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_3_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_3_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_3_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_3_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_3_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_3_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_3_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_3_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_3_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_3_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_3_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_3_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_3_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_3_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_3_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_3_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_3_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_3_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_4_idx">@lang('messages.Denomination') #4:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_4_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_4_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_4_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_4_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_4_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_4_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_4_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_4_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_4_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_4_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_4_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_4_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_4_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_4_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_4_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_4_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_4_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_4_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_4_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_4_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_4_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_4_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_4_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_4_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_4_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_4_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_4_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_5_idx">@lang('messages.Denomination') #5:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_5_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_5_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_5_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_5_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_5_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_5_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_5_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_5_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_5_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_5_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_5_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_5_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_5_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_5_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_5_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_5_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_5_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_5_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_5_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_5_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_5_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_5_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_5_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_5_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_5_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_5_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_5_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_7_idx">@lang('messages.Denomination') #6:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_7_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_6_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_6_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_6_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_6_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_6_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_6_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_6_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_6_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_6_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_6_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_6_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_6_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_6_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_6_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_6_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_6_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_6_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_6_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_6_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_6_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_6_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_6_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_6_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_6_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_6_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_6_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_7_idx">@lang('messages.Denomination') #7:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_7_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_7_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_7_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_7_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_7_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_7_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_7_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_7_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_7_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_7_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_7_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_7_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_7_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_7_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_7_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_7_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_7_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_7_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_7_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_7_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_7_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_7_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_7_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_7_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_7_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_7_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_7_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                            <label for="denomination_8_idx">@lang('messages.Denomination') #8:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select name="denomination_8_idx" class="col-lg-12" style='display: block;'>
                                    <option {{ $conf->denomination_8_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                    <option {{ $conf->denomination_8_idx == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                    <option {{ $conf->denomination_8_idx == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                    <option {{ $conf->denomination_8_idx == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                    <option {{ $conf->denomination_8_idx == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                    <option {{ $conf->denomination_8_idx == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                    <option {{ $conf->denomination_8_idx == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                    <option {{ $conf->denomination_8_idx == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                    <option {{ $conf->denomination_8_idx == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                    <option {{ $conf->denomination_8_idx == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                    <option {{ $conf->denomination_8_idx == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                    <option {{ $conf->denomination_8_idx == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                    <option {{ $conf->denomination_8_idx == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                    <option {{ $conf->denomination_8_idx == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                    <option {{ $conf->denomination_8_idx == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                    <option {{ $conf->denomination_8_idx == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                    <option {{ $conf->denomination_8_idx == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                    <option {{ $conf->denomination_8_idx == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                    <option {{ $conf->denomination_8_idx == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                    <option {{ $conf->denomination_8_idx == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                    <option {{ $conf->denomination_8_idx == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                    <option {{ $conf->denomination_8_idx == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                    <option {{ $conf->denomination_8_idx == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                    <option {{ $conf->denomination_8_idx == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                    <option {{ $conf->denomination_8_idx == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                    <option {{ $conf->denomination_8_idx == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                </select>
                            </div>
                        </div>
    
                                        
</div>    
<div class="col-lg-4">
    <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations') RTP:<br/>&nbsp;</h3>
    <hr style="margin: 7px 0 12px 0;">
    
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom1_idx" style="margin-top: 0px;">@lang('messages.Denominations') RTP 1:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom1_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom1_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom1_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom2_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 2:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom2_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom2_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom2_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom3_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 3:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom3_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom3_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom3_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom4_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 4:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom4_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom4_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom4_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom5_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 5:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom5_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom5_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom5_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom6_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 6:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom6_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom6_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom6_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom7_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 7:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom7_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom7_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom7_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="mathdenom8_idx" style="margin-top: 8px;">@lang('messages.Denominations') RTP 8:</label><br>
            <div class="input-group" >
                <span class="input-group-addon"  >%</span>
                <select name="mathdenom8_idx" class="form-control imput-sm " >
                    <option {{ $conf->mathdenom8_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                    <option {{ $conf->mathdenom8_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                </select>    
            </div> 
        </div> 
        
    
</div>    
<input id="formUdate" name="_token" value="1234" type="hidden" data-table="psconf"    />
<input id="gameUdate" name="gameid" value="1234" type="hidden" data-table="psconf"    />
<input name="ps_id" value="{{ $conf->ps_id }}" type="hidden" data-table="psconf"    />
@endforeach
    <a  onclick="UpdateGame();"
        style="width:315px; margin: 55px 10px 10px 17px; position: relative; bottom: 0px; right: 5px" 
        class="btn btn-danger pull-right ps-config-submit"
    >
        @lang('messages.Update')
    </a>
</form>