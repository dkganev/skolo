<form id="registerSubmit">
    @foreach($results as $conf)
        <div class="col-lg-4">
            <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Gamble'):<br/>&nbsp;</h3>
            <hr style="margin: 7px 0 12px 0;">
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="bonus_type">@lang('messages.Gamble Type'):</label><br>
                <div class="input-group" style="width:100%; display: inline-block;">
                    <select name="bonus_type" class="form-control imput-sm  col-lg-12" '>
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
                    <select name="betsbuttonsidx" class="form-control imput-sm col-lg-12" '>
                        <option {{ $conf->betsbuttonsidx == 0 ? 'selected="true"' : '' }} value="0" data_sort="1">1|2|3|4|5</option>
                        <option {{ $conf->betsbuttonsidx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">1|2|3|5|10</option>
                        <option {{ $conf->betsbuttonsidx == 2 ? 'selected="true"' : '' }} value="2" data_sort="1">1|2|5|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 3 ? 'selected="true"' : '' }} value="3" data_sort="1">1|2|5|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 66 ? 'selected="true"' : '' }} value="66" data_sort="1">1|5|10|10|40</option>
                        <option {{ $conf->betsbuttonsidx == 4 ? 'selected="true"' : '' }} value="4" data_sort="1">1|5|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 5 ? 'selected="true"' : '' }} value="5" data_sort="1">1|5|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 65 ? 'selected="true"' : '' }} value="65" data_sort="1">1|10|20|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 6 ? 'selected="true"' : '' }} value="6" data_sort="1">1|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 7 ? 'selected="true"' : '' }} value="7" data_sort="1">1|20|50|100|200</option>
                        <option {{ $conf->betsbuttonsidx == 8 ? 'selected="true"' : '' }} value="8" data_sort="1">1|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 9 ? 'selected="true"' : '' }} value="9" data_sort="1">1|50|100|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 10 ? 'selected="true"' : '' }} value="10" data_sort="1">1|50|100|300|500</option>
                        <option {{ $conf->betsbuttonsidx == 11 ? 'selected="true"' : '' }} value="11" data_sort="1">2|2|3|4|5</option>
                        <option {{ $conf->betsbuttonsidx == 12 ? 'selected="true"' : '' }} value="12" data_sort="1">2|2|3|4|10</option>
                        <option {{ $conf->betsbuttonsidx == 13 ? 'selected="true"' : '' }} value="13" data_sort="1">2|2|5|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 14 ? 'selected="true"' : '' }} value="14" data_sort="1">2|2|5|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 15 ? 'selected="true"' : '' }} value="15" data_sort="1">2|5|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 16 ? 'selected="true"' : '' }} value="16" data_sort="1">2|5|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 17 ? 'selected="true"' : '' }} value="17" data_sort="1">2|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 18 ? 'selected="true"' : '' }} value="18" data_sort="1">2|20|50|100|200</option>
                        <option {{ $conf->betsbuttonsidx == 19 ? 'selected="true"' : '' }} value="19" data_sort="1">2|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 20 ? 'selected="true"' : '' }} value="20" data_sort="1">2|50|100|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 21 ? 'selected="true"' : '' }} value="21" data_sort="1">2|50|100|300|500</option>
                        <option {{ $conf->betsbuttonsidx == 22 ? 'selected="true"' : '' }} value="22" data_sort="1">3|3|3|4|5</option>
                        <option {{ $conf->betsbuttonsidx == 23 ? 'selected="true"' : '' }} value="23" data_sort="1">3|3|3|5|10</option>
                        <option {{ $conf->betsbuttonsidx == 24 ? 'selected="true"' : '' }} value="24" data_sort="1">3|3|5|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 25 ? 'selected="true"' : '' }} value="25" data_sort="1">3|3|5|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 26 ? 'selected="true"' : '' }} value="26" data_sort="1">3|5|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 27 ? 'selected="true"' : '' }} value="27" data_sort="1">3|5|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 28 ? 'selected="true"' : '' }} value="28" data_sort="1">3|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 29 ? 'selected="true"' : '' }} value="29" data_sort="1">3|20|50|100|200</option>
                        <option {{ $conf->betsbuttonsidx == 30 ? 'selected="true"' : '' }} value="30" data_sort="1">3|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 31 ? 'selected="true"' : '' }} value="31" data_sort="1">3|50|100|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 32 ? 'selected="true"' : '' }} value="32" data_sort="1">3|50|100|300|500</option>
                        <option {{ $conf->betsbuttonsidx == 33 ? 'selected="true"' : '' }} value="33" data_sort="1">4|4|4|4|5</option>
                        <option {{ $conf->betsbuttonsidx == 34 ? 'selected="true"' : '' }} value="34" data_sort="1">4|4|4|5|10</option>
                        <option {{ $conf->betsbuttonsidx == 35 ? 'selected="true"' : '' }} value="35" data_sort="1">4|4|5|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 36 ? 'selected="true"' : '' }} value="36" data_sort="1">4|4|5|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 37 ? 'selected="true"' : '' }} value="37" data_sort="1">4|5|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 38 ? 'selected="true"' : '' }} value="38" data_sort="1">4|5|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 39 ? 'selected="true"' : '' }} value="39" data_sort="1">4|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 40 ? 'selected="true"' : '' }} value="40" data_sort="1">4|20|50|100|200</option>
                        <option {{ $conf->betsbuttonsidx == 41 ? 'selected="true"' : '' }} value="41" data_sort="1">4|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 42 ? 'selected="true"' : '' }} value="42" data_sort="1">4|50|100|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 43 ? 'selected="true"' : '' }} value="43" data_sort="1">4|50|100|300|500</option>
                        <option {{ $conf->betsbuttonsidx == 44 ? 'selected="true"' : '' }} value="44" data_sort="1">5|5|5|5|5</option>
                        <option {{ $conf->betsbuttonsidx == 45 ? 'selected="true"' : '' }} value="45" data_sort="1">5|5|5|5|10</option>
                        <option {{ $conf->betsbuttonsidx == 46 ? 'selected="true"' : '' }} value="46" data_sort="1">5|5|5|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 47 ? 'selected="true"' : '' }} value="47" data_sort="1">5|5|5|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 48 ? 'selected="true"' : '' }} value="48" data_sort="1">5|5|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 49 ? 'selected="true"' : '' }} value="49" data_sort="1">5|5|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 50 ? 'selected="true"' : '' }} value="50" data_sort="1">5|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 51 ? 'selected="true"' : '' }} value="51" data_sort="1">5|10|20|50|200</option>
                        <option {{ $conf->betsbuttonsidx == 52 ? 'selected="true"' : '' }} value="52" data_sort="1">5|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 53 ? 'selected="true"' : '' }} value="53" data_sort="1">5|20|50|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 54 ? 'selected="true"' : '' }} value="54" data_sort="1">5|20|50|300|500</option>
                        <option {{ $conf->betsbuttonsidx == 55 ? 'selected="true"' : '' }} value="55" data_sort="1">10|10|10|10|10</option>
                        <option {{ $conf->betsbuttonsidx == 56 ? 'selected="true"' : '' }} value="56" data_sort="1">10|10|10|10|20</option>
                        <option {{ $conf->betsbuttonsidx == 57 ? 'selected="true"' : '' }} value="57" data_sort="1">10|10|10|10|30</option>
                        <option {{ $conf->betsbuttonsidx == 58 ? 'selected="true"' : '' }} value="58" data_sort="1">10|10|10|20|40</option>
                        <option {{ $conf->betsbuttonsidx == 59 ? 'selected="true"' : '' }} value="59" data_sort="1">10|10|10|30|50</option>
                        <option {{ $conf->betsbuttonsidx == 60 ? 'selected="true"' : '' }} value="60" data_sort="1">10|10|20|50|100</option>
                        <option {{ $conf->betsbuttonsidx == 61 ? 'selected="true"' : '' }} value="61" data_sort="1">10|20|50|100|200</option>
                        <option {{ $conf->betsbuttonsidx == 62 ? 'selected="true"' : '' }} value="62" data_sort="1">10|20|50|100|300</option>
                        <option {{ $conf->betsbuttonsidx == 63 ? 'selected="true"' : '' }} value="63" data_sort="1">10|50|100|200|400</option>
                        <option {{ $conf->betsbuttonsidx == 64 ? 'selected="true"' : '' }} value="64" data_sort="1">10|50|100|300|500</option>
                    </select>    
                </div> 
            </div> 
            
            <br /><br /><br />
            <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Min Lines of play'):</h3>
            <hr style="margin: 7px 0 12px 0;">
            
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <div class="input-group" style="width:100%; display: inline-block;">
                    <input name=""   style=" "  value="{{ isset($conf->minlines) ? $conf->minlines : ''}}" type="text" class="form-control text-center " placeholder="Game Min Bet" aria-describedby="sizing-addon2">
                </div> 
            </div> 
        </div>    
    <div class="col-lg-4">
        <h3 style="margin: 0; padding: 0; text-align: center; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations'):<br/>&nbsp;</h3>
        <hr style="margin: 7px 0 12px 0;">

        <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
            <label for="denomination_1_idx">@lang('messages.Denomination') #1:</label><br>
            <div class="input-group" style="width:100%; display: inline-block;">
                <select id="denom1" name="denomination_1_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="1">
                    <option {{ $conf->denomination_1_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom2" name="denomination_2_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="2">
                                    <option {{ $conf->denomination_2_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom3" name="denomination_3_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="3">
                                    <option {{ $conf->denomination_3_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom4" name="denomination_4_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="4">
                                    <option {{ $conf->denomination_4_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom5" name="denomination_5_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="5">
                                    <option {{ $conf->denomination_5_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                            <label for="denomination_6_idx">@lang('messages.Denomination') #6:</label><br>
                            <div class="input-group" style="width:100%; display: inline-block;">
                                <select id="denom6" name="denomination_6_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="6">
                                    <option {{ $conf->denomination_6_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom7" name="denomination_7_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="7">
                                    <option {{ $conf->denomination_7_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                                <select id="denom8" name="denomination_8_idx" class="form-control imput-sm col-lg-12 denom" style='display: block;' data-id="8">
                                    <option {{ $conf->denomination_8_idx == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
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
                <label for="mathdenom2_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 2:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom2_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom2_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom2_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom3_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 3:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom3_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom3_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom3_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom4_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 4:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom4_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom4_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom4_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom5_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 5:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom5_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom5_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom5_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom6_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 6:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom6_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom6_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom6_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom7_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 7:</label><br>
                <div class="input-group" >
                    <span class="input-group-addon"  >%</span>
                    <select name="mathdenom7_idx" class="form-control imput-sm " >
                        <option {{ $conf->mathdenom7_idx == 0 ? 'selected="true"' : '' }} value="1" data_sort="1">96.45</option>
                        <option {{ $conf->mathdenom7_idx == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">93.98</option>
                    </select>    
                </div> 
            </div> 
            <div class="form-group form-group-sm" style="width:100%; display: inline-block;">
                <label for="mathdenom8_idx" style="margin-top: 6px;">@lang('messages.Denominations') RTP 8:</label><br>
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
    @if ( isset($conf->ps_id))
        @if ( $conf->ps_id == 0 )
            <a  onclick="UpdateAllGame();"
                style="width:315px; margin: 55px 10px 10px 17px; position: relative; bottom: 0px; right: 5px" 
                class="btn btn-danger pull-right ps-config-submit"
            >
                <span id="OK" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                <span id="remove" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                @lang('messages.Update to All')
            </a>


            @else
            <a  onclick="UpdateGame();"
                style="width:315px; margin: 55px 10px 10px 17px; position: relative; bottom: 0px; right: 5px" 
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
                            $('#denom3').val('0').change();
                        }
                    }else if (denomID == 3 && (((denom[4] > denomNew || denom[4] == 0) && denom[2] < denomNew && denom[2] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom4').val('0').change();
                        }
                    }else if (denomID == 4 && (((denom[5] > denomNew || denom[5] == 0) && denom[3] < denomNew && denom[3] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom5').val('0').change();
                        }
                    }else if (denomID == 5 && (((denom[6] > denomNew || denom[6] == 0) && denom[4] < denomNew && denom[4] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom6').val('0').change();
                        }
                    }else if (denomID == 6 && (((denom[7] > denomNew || denom[7] == 0) && denom[5] < denomNew && denom[5] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom7').val('0').change();
                        }
                    }else if (denomID == 7 && (((denom[8] > denomNew || denom[8] == 0) && denom[6] < denomNew && denom[6] != 0) || denomNew == 0) ){
                        denom[denomID] = denomNew;
                        denomPrev[denomID] = denomNewVal;
                        if (denomNew == 0){
                            $('#denom8').val('0').change();
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