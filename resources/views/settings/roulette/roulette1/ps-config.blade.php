<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px;">
                <ul class="breadcrumb" style="margin-bottom: 10px;">

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">@lang('messages.Roulette') 1</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">@lang('messages.Roulette') 2</a></li>

                </ul>
            </div>
        </div>
    </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div style="padding-top:2px; margin-top: 0px; background-color: none;">
                <ul class="breadcrumb" style="margin-bottom: 10px;">

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">@lang('messages.Wheel Settings')</a></li>

                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelconfig')}}')">@lang('messages.Wheel Config')</a></li>

                    <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}')">@lang('messages.Terminals Config')</a></li>
  
                    <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/accconfig')}}')">@lang('messages.Accounting Config')</a></li>
                </ul>
            </div>
  	</div>
    </div><!-- End Row -->
</div><!-- End Container-->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="well" style="margin: 0; padding: 0; height:730px">
                <div class="col-lg-3">
                    <table class="table" style="width: 250px; margin-top: 50px;">
                        <thead class="w3-blue-grey">
                            <tr>
                                <th>@lang('messages.PS ID')</th>
                                <th>@lang('messages.Seat ID')</th>
                                <th>@lang('messages.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ps_conf as $conf)
                                <tr style="height: 20px">
                                    <td class = "td{{ $conf->ps_id }}">{{ $conf->ps_id }}</td>
                                    <td class = "td{{ $conf->ps_id }}">{{ $conf->seat_id }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs ps-config-toggle"
                                            type="submit"
                                            data-id="{{ $conf->ps_id }}"
                                        >
                                        @lang('messages.Edit')
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-9" id="psconfig">
                    @foreach($ps_conf as $conf)
                        @if ($conf->ps_id == $page['pageID'])
                            <form style="display: none" action="/settings/roulette1/psconfig/edit" 
                                  method="POST" role="form" id="ps-config-form-{{ $conf->ps_id }}"
                            >
                                <div class=" col-lg-12w3-blue-grey" id="heading" style="width: 100%;  height: 35px; margin-bottom: 15px;">
                                      <a style="margin:5px;" class="btn btn-warning btn-sm pull-right" onclick="ExportToPNG();">
                                                 @lang('messages.Export to PNG')
                                        </a>
                                    <h3 style="margin:0; padding: 0; color: #fff; font-family: sans-serif;">
                                        <strong><i style="margin:0 0 0 268px; position: relative; top: 5px">
                                            @if($conf->ps_id === 0)
                                                DEFAULT PS - Config
                                            @else
                                                PS ID {{ $conf->ps_id }} - Config
                                            @endif
                                        </i></strong>
                                    </h3>
                                </div>

                                <!-- MIN BETS -->
                                <div class="col-lg-3">
                                  <h4 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">@lang('messages.Min Bets') (@lang('messages.credits')):</h4>
                                  <hr style="margin: 7px 0 12px 0;">

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Game Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="game_min_bet" value="{{ $conf->game_min_bet }}" type="text" class="form-control text-center" placeholder="Game Min Bet" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Straight Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="straight_min" value="{{ $conf->straight_min }}" type="text" class="form-control text-center" placeholder="Straight Min Bet" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Split Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="split_min" value="{{ $conf->split_min }}" type="text" class="form-control text-center" placeholder="Split Min Bet" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Basket & Street Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="basket_a_street_bet_min" value="{{ $conf->basket_a_street_bet_min }}" type="text" class="form-control text-center" placeholder="Basket & Street Min Bet" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Corner Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="corner_bet_min" value="{{ $conf->corner_bet_min }}" type="text" class="form-control text-center" placeholder="Corner Bet Min" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Six Number Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="six_number_line_min" value="{{ $conf->six_number_line_min }}" type="text" class="form-control text-center" placeholder="Six Number Line Min" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Dozen Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="dozen_bet_min" value="{{ $conf->dozen_bet_min }}" type="text" class="form-control text-center" placeholder="Dozen Bet Min" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Even Min Bet'):</label><br>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                        <input name="even_bet_min" value="{{ $conf->even_bet_min }}" type="text" class="form-control text-center" placeholder="Even Bet Min" aria-describedby="sizing-addon2">
                                      </div>
                                    </div>

                                </div><!-- End Col -->


                                <!-- MAX BETS -->
                                <div class="col-lg-3">
                                  <h4 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Max Bets') (@lang('messages.credits')):</h4>
                                  <hr style="margin: 7px 0 12px 0;">

                                      <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Game Max Bet'):</label>
                                        <label class="updateForm" name="game_max_bet" style="color: red; display: none;">@lang('messages.Game Max Bet must be bigger than Game Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="game_max_bet" value="{{ $conf->game_max_bet }}" type="text" class="form-control text-center" placeholder="Game Max Bet" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Straight Max Bet'):</label>
                                        <label class="updateForm" name="straight_max" style="color: red; display: none;">@lang('messages.Straight Max Bet must be bigger than Straight Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="straight_max" value="{{ $conf->straight_max }}" type="text" class="form-control text-center" placeholder="Straight Max Bet" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Split Max Bet'):</label>
                                        <label class="updateForm" name="split_max" style="color: red; display: none;">@lang('messages.Split Max Bet must be bigger than Split Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="split_max" value="{{ $conf->split_max }}" type="text" class="form-control text-center" placeholder="Split Max Bet" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Basket & Street Max Bet'):</label>
                                        <label class="updateForm" name="basket_a_street_bet_max" style="color: red; display: none;">@lang('messages.Basket & Street Max Bet must be bigger than Basket & Street Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="basket_a_street_bet_max" value="{{ $conf->basket_a_street_bet_max }}" type="text" class="form-control text-center" placeholder="Basket & Street Max Bet" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Corner Max Bet'):</label>
                                        <label class="updateForm" name="corner_bet_max" style="color: red; display: none;">@lang('messages.Corner Max Bet must be bigger than Corner Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="corner_bet_max" value="{{ $conf->corner_bet_max }}" type="text" class="form-control text-center" placeholder="Corner Bet Max" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Six Number Max Bet'):</label>
                                        <label class="updateForm" name="six_number_line_max" style="color: red; display: none;">@lang('messages.Six Number Max Bet must be bigger than Six Number Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="six_number_line_max" value="{{ $conf->six_number_line_max }}" type="text" class="form-control text-center" placeholder="Six Number Line Max" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Dozen Max Bet'):</label>
                                        <label class="updateForm" name="dozen_bet_max" style="color: red; display: none;">@lang('messages.Dozen Max Bett must be bigger than Dozen Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="dozen_bet_max" value="{{ $conf->dozen_bet_max }}" type="text" class="form-control text-center" placeholder="Dozen Max Bet" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label style="color: #474747">@lang('messages.Even Max Bet'):</label>
                                        <label class="updateForm" name="even_bet_max" style="color: red; display: none;">@lang('messages.Even Max Bet must be bigger than Even Min Bet').</label><br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
                                            <input name="even_bet_max" value="{{ $conf->even_bet_max }}" type="text" class="form-control text-center" placeholder="Even Bet Max" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>

                                </div><!-- End Col -->
                                <div class="col-lg-6">

                                    <!-- Multipliers -->
                                      <div class="col-lg-5">

                                          <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Multipliers'): <br/>&nbsp;</h3>
                                        <hr style="margin: 7px 0 12px 0;">

                                          <div class="form-group form-group-sm">
                                            <label style="color: #474747">@lang('messages.Multiplier') #1:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult1" value="{{ $conf->mult1 }}" type="text" class="form-control text-center" placeholder="Multiplier #1" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                          <div class="form-group form-group-sm">
                                              <label style="color: #474747">@lang('messages.Multiplier') #2:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult2" value="{{ $conf->mult2 }}" type="text" class="form-control text-center" placeholder="Multiplier #2" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                          <div class="form-group form-group-sm">
                                              <label style="color: #474747">@lang('messages.Multiplier') #3:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult3" value="{{ $conf->mult3 }}" type="text" class="form-control text-center" placeholder="Multiplier #3" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                          <div class="form-group form-group-sm">
                                            <label style="color: #474747">@lang('messages.Multiplier') #4:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult4" value="{{ $conf->mult4 }}" type="text" class="form-control text-center" placeholder="Multiplier #4" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                          <div class="form-group form-group-sm">
                                              <label style="color: #474747">@lang('messages.Multiplier') #5:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult5" value="{{ $conf->mult5 }}" type="text" class="form-control text-center" placeholder="Multiplier #5" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                          <div class="form-group form-group-sm">
                                              <label style="color: #474747">@lang('messages.Multiplier') #6:</label><br>
                                            <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
                                              <input name="mult6" value="{{ $conf->mult6 }}" type="text" class="form-control text-center" placeholder="Multiplier #6" aria-describedby="sizing-addon2">
                                            </div>
                                          </div>

                                        </div><!-- End Col -->


                                    <!-- Denominations -->
                                      <div class="col-lg-6">

                                        <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Denominations'):<br/>&nbsp;</h3>
                                        <hr style="margin: 7px 0 12px 0;">

                                        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
                                            <label for="denom1">@lang('messages.Denomination') #1:</label><br>
                                            <select name="denom1" id="denom1" class="selectpicker" data-actions-box="true"  data-id="1" >
                                                <option {{ $conf->denom1 == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                                <option {{ $conf->denom1 == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                                <option {{ $conf->denom1 == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                                <option {{ $conf->denom1 == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                                <option {{ $conf->denom1 == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                                <option {{ $conf->denom1 == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                                <option {{ $conf->denom1 == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                                <option {{ $conf->denom1 == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                                <option {{ $conf->denom1 == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                                <option {{ $conf->denom1 == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                                <option {{ $conf->denom1 == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                                <option {{ $conf->denom1 == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                                <option {{ $conf->denom1 == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                                <option {{ $conf->denom1 == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                                <option {{ $conf->denom1 == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                                <option {{ $conf->denom1 == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                                <option {{ $conf->denom1 == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                                <option {{ $conf->denom1 == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                                <option {{ $conf->denom1 == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                                <option {{ $conf->denom1 == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                                <option {{ $conf->denom1 == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                                <option {{ $conf->denom1 == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                                <option {{ $conf->denom1 == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                                <option {{ $conf->denom1 == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                                <option {{ $conf->denom1 == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                                <option {{ $conf->denom1 == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                            </select>
                                        </div>

                                        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
                                            <label for="denom2">@lang('messages.Denomination') #2:</label><br>
                                            <select style="height: 40px; line-height:30px;" name="denom2" id="denom2" class="selectpicker" data-actions-box="true"  data-id="2" >
                                                <option {{ $conf->denom2 == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
                                                <option {{ $conf->denom2 == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                                <option {{ $conf->denom2 == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                                <option {{ $conf->denom2 == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                                <option {{ $conf->denom2 == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                                <option {{ $conf->denom2 == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                                <option {{ $conf->denom2 == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                                <option {{ $conf->denom2 == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                                <option {{ $conf->denom2 == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                                <option {{ $conf->denom2 == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                                <option {{ $conf->denom2 == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                                <option {{ $conf->denom2 == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                                <option {{ $conf->denom2 == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                                <option {{ $conf->denom2 == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                                <option {{ $conf->denom2 == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                                <option {{ $conf->denom2 == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                                <option {{ $conf->denom2 == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                                <option {{ $conf->denom2 == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                                <option {{ $conf->denom2 == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                                <option {{ $conf->denom2 == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                                <option {{ $conf->denom2 == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                                <option {{ $conf->denom2 == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                                <option {{ $conf->denom2 == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                                <option {{ $conf->denom2 == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                                <option {{ $conf->denom2 == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                                <option {{ $conf->denom2 == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                                <option {{ $conf->denom2 == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                            </select>
                                        </div>

                                         <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
                                            <label for="denom3">@lang('messages.Denomination') #3:</label><br>
                                            <select name="denom3" id="denom3" class="selectpicker" data-actions-box="true"  data-id="3">
                                                <option {{ $conf->denom3 == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
                                                <option {{ $conf->denom3 == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                                <option {{ $conf->denom3 == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                                <option {{ $conf->denom3 == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                                <option {{ $conf->denom3 == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                                <option {{ $conf->denom3 == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                                <option {{ $conf->denom3 == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                                <option {{ $conf->denom3 == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                                <option {{ $conf->denom3 == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                                <option {{ $conf->denom3 == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                                <option {{ $conf->denom3 == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                                <option {{ $conf->denom3 == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                                <option {{ $conf->denom3 == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                                <option {{ $conf->denom3 == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                                <option {{ $conf->denom3 == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                                <option {{ $conf->denom3 == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                                <option {{ $conf->denom3 == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                                <option {{ $conf->denom3 == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                                <option {{ $conf->denom3 == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                                <option {{ $conf->denom3 == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                                <option {{ $conf->denom3 == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                                <option {{ $conf->denom3 == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                                <option {{ $conf->denom3 == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                                <option {{ $conf->denom3 == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                                <option {{ $conf->denom3 == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                                <option {{ $conf->denom3 == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                                <option {{ $conf->denom3 == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                            </select>
                                        </div>

                                         <div class="form-group form-group-sm" style="width:270px; display: inline-block; padding: 0;" >
                                            <label for="denom4">@lang('messages.Denomination') #4:</label><br>
                                            <select name="denom4" id="denom4" class="selectpicker" data-actions-box="true" data-id="4" > 
                                                <option {{ $conf->denom4 == 0 ? 'selected="true"' : '' }} value="0" data_sort="0">None</option>
                                                <option {{ $conf->denom4 == 1 ? 'selected="true"' : '' }} value="1" data_sort="1">$0.01</option>
                                                <option {{ $conf->denom4 == 23 ? 'selected="true"' : '' }} value="23" data_sort="2">$0.02</option>
                                                <option {{ $conf->denom4 == 24 ? 'selected="true"' : '' }} value="24" data_sort="3">$0.03</option>
                                                <option {{ $conf->denom4 == 2 ? 'selected="true"' : '' }} value="2" data_sort="4">$0.05</option>
                                                <option {{ $conf->denom4 == 3 ? 'selected="true"' : '' }} value="3" data_sort="5">$0.10</option>
                                                <option {{ $conf->denom4 == 25 ? 'selected="true"' : '' }} value="25" data_sort="6">$0.15</option>
                                                <option {{ $conf->denom4 == 11 ? 'selected="true"' : '' }} value="11" data_sort="7">$0.20</option>
                                                <option {{ $conf->denom4 == 4 ? 'selected="true"' : '' }} value="4" data_sort="8">$0.25</option>
                                                <option {{ $conf->denom4 == 26 ? 'selected="true"' : '' }} value="26" data_sort="9">$0.40</option>
                                                <option {{ $conf->denom4 == 5 ? 'selected="true"' : '' }} value="5" data_sort="10">$0.50</option>
                                                <option {{ $conf->denom4 == 6 ? 'selected="true"' : '' }} value="6" data_sort="11">$1.00</option>
                                                <option {{ $conf->denom4 == 12 ? 'selected="true"' : '' }} value="12" data_sort="12">$2.00</option>
                                                <option {{ $conf->denom4 == 13 ? 'selected="true"' : '' }} value="13" data_sort="13">$2.50</option>
                                                <option {{ $conf->denom4 == 7 ? 'selected="true"' : '' }} value="7" data_sort="14">$5.00</option>
                                                <option {{ $conf->denom4 == 8 ? 'selected="true"' : '' }} value="8" data_sort="15">$10.00</option>
                                                <option {{ $conf->denom4 == 9 ? 'selected="true"' : '' }} value="9" data_sort="16">$20.00</option>
                                                <option {{ $conf->denom4 == 14 ? 'selected="true"' : '' }} value="14" data_sort="17">$25.00</option>
                                                <option {{ $conf->denom4 == 15 ? 'selected="true"' : '' }} value="15" data_sort="18">$50.00</option>
                                                <option {{ $conf->denom4 == 10 ? 'selected="true"' : '' }} value="10" data_sort="19">$100.00</option>
                                                <option {{ $conf->denom4 == 16 ? 'selected="true"' : '' }} value="16" data_sort="20">$200.00</option>
                                                <option {{ $conf->denom4 == 17 ? 'selected="true"' : '' }} value="17" data_sort="21">$250.00</option>
                                                <option {{ $conf->denom4 == 18 ? 'selected="true"' : '' }} value="18" data_sort="22">$500.00</option>
                                                <option {{ $conf->denom4 == 19 ? 'selected="true"' : '' }} value="19" data_sort="23">$1000.00</option>
                                                <option {{ $conf->denom4 == 20 ? 'selected="true"' : '' }} value="20" data_sort="24">$2000.00</option>
                                                <option {{ $conf->denom4 == 21 ? 'selected="true"' : '' }} value="21" data_sort="25">$2500.00</option>
                                                <option {{ $conf->denom4 == 22 ? 'selected="true"' : '' }} value="22" data_sort="26">$5000.00</option>
                                            </select>
                                        </div>
                                            <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   @lang('messages.Chip Sound'):</h3>
                                            <hr style="margin: 7px 0 12px 0;">
                                            <div class="form-group form-group-sm" style="width:270px; display: inline-block; padding: 0;" >
                                                <label for="chip_sound">@lang('messages.Chip Sound'):</label><br>
                                                <select name="chip_sound" id="chip_sound" class="selectpicker" data-actions-box="true" data-id="5" > 
                                                    <option {{ $conf->chip_sound == 0 ? 'selected="true"' : '' }} value="0">0</option>
                                                    <option {{ $conf->chip_sound == 1 ? 'selected="true"' : '' }} value="1">1</option>
                                                    <option {{ $conf->chip_sound == 2 ? 'selected="true"' : '' }} value="2">2</option>
                                                </select>
                                            </div>
                                        </div><!-- End Col -->


                                    <hr class="col-lg-11">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $conf->ps_id }}" name="ps_id">
                                    <button data-id="{{ $conf->ps_id }}" type="submit" 
                                        style="width:315px; margin: 55px 10px 10px 17px; position: relative; bottom: 0px; right: 5px" 
                                        class="btn btn-danger pull-right ps-config-submit"
                                    >
                                        @lang('messages.Update')
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endforeach

                </div><!-- End PsConfig--> 

            </div><!-- End Well--> 
        </div><!-- End Col--> 
    </div><!-- End Row--> 
</div><!-- End Container--> 

<script>
var denomPrev = new Array("0", $('#denom1').val(), $('#denom2').val(), $('#denom3').val(), $('#denom4').val()); //$('#denom1').attr('data-prev', denom[1]);
var denom = new Array("0", $('#denom1').find(":selected").attr("data_sort"), $('#denom2').find(":selected").attr("data_sort"), $('#denom3').find(":selected").attr("data_sort"), $('#denom4').find(":selected").attr("data_sort")); //$('#denom1').attr('data-prev', denom[1]);
var  pageID = {{$page['pageID']}};
Timer123 = setTimeout(function(){ $('form').css('display', 'none'); $('.td' + pageID).css('font-weight', 'bold'); $('#ps-config-form-' + pageID).fadeIn(); }, 200);


$('select').on('change', function() {
    denomID =  parseInt($(this).attr("data-id"));
    denomNew = parseInt($(this).find(":selected").attr("data_sort"));
    denomNewVal = parseInt($(this).val());
        if (denomID != 5){
            if ((denom[1] != denomNew && denom[2] != denomNew  && denom[3] != denomNew  && denom[4] != denomNew && denom[5] != denomNew && denom[6] != denomNew && denom[7] != denomNew && denom[8] != denomNew) || denomNew == 0 ){
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
                }else if (denomID == 4 && ((denom[3] < denomNew && denom[3] != 0) || denomNew == 0) ){
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
    
        /*$('select').on('change', function() {
            $('option[value="0"]').removeAttr('disabled');
            var select = $("#ps-config-form-{{ $conf->ps_id }}").find('select');
            var option = $("#ps-config-form-{{ $conf->ps_id }}").find('option');
            $(option).prop('disabled', false); //reset all the disabled options on every change event

            $(select).each(function() { //loop through all the select elements
              var val = this.value;
              $(select).not(this).find(option).filter(function() { //filter option elements having value as selected option
                  if(this.value === val) {
                    $(this).attr('disabled', true); //disable those option elements
                  }
              });
            });
          }); //trihgger change handler initially!*/
$('.ps-config-submit').on('click', function(event) {
    event.preventDefault();
    firmID = $(this).parents('form:first').attr('id');
    errorVal = 0;
    $(".updateForm").hide();
    gameMaxBet = parseInt($("#" + firmID).find('input[name="game_max_bet"]').val());
    gameMinBet = parseInt($("#" + firmID).find('input[name="game_min_bet"]').val());
    if (gameMaxBet < gameMinBet){
        $("#" + firmID).find('label[name="game_max_bet"]').show()
        errorVal = 1;
    }
    straight_max = parseInt($("#" + firmID).find('input[name="straight_max"]').val());
    straight_min = parseInt($("#" + firmID).find('input[name="straight_min"]').val());
    if (straight_max < straight_min){
        $("#" + firmID).find('label[name="straight_max"]').show()
        errorVal = 1;
    }
    split_max = parseInt($("#" + firmID).find('input[name="split_max"]').val());
    split_min = parseInt($("#" + firmID).find('input[name="split_min"]').val());
    if (split_max < split_min){
        $("#" + firmID).find('label[name="split_max"]').show()
        errorVal = 1;
    }
    basket_a_street_bet_max = parseInt($("#" + firmID).find('input[name="basket_a_street_bet_max"]').val());
    basket_a_street_bet_min = parseInt($("#" + firmID).find('input[name="basket_a_street_bet_min"]').val());
    if (basket_a_street_bet_max < basket_a_street_bet_min){
        $("#" + firmID).find('label[name="basket_a_street_bet_max"]').show()
        errorVal = 1;
    }
    corner_bet_max = parseInt($("#" + firmID).find('input[name="corner_bet_max"]').val());
    corner_bet_min = parseInt($("#" + firmID).find('input[name="corner_bet_min"]').val());
    if (corner_bet_max < corner_bet_min){
        $("#" + firmID).find('label[name="corner_bet_max"]').show()
        errorVal = 1;
    }
    six_number_line_max = parseInt($("#" + firmID).find('input[name="six_number_line_max"]').val());
    six_number_line_min = parseInt($("#" + firmID).find('input[name="six_number_line_min"]').val());
    if (six_number_line_max < six_number_line_min){
        $("#" + firmID).find('label[name="six_number_line_max"]').show()
        errorVal = 1;
    }
    dozen_bet_max = parseInt($("#" + firmID).find('input[name="dozen_bet_max"]').val());
    dozen_bet_min = parseInt($("#" + firmID).find('input[name="dozen_bet_min"]').val());
    if (dozen_bet_max < dozen_bet_min){
        $("#" + firmID).find('label[name="dozen_bet_max"]').show()
        errorVal = 1;
    }
    even_bet_max = parseInt($("#" + firmID).find('input[name="even_bet_max"]').val());
    even_bet_min = parseInt($("#" + firmID).find('input[name="even_bet_min"]').val());
    if (even_bet_max < even_bet_min){
        $("#" + firmID).find('label[name="even_bet_max"]').show()
        errorVal = 1;
    }
    if (errorVal == 1){
        //console.log("test");
        return;
    }
    
    //console.log($("#" + firmID).find('input[name="game_max_bet"]').val());
    
    dataID = $(this).attr('data-id');
    $.ajax({
        method: 'POST',
        url: '/settings/roulette1/psconfig/edit',
        data: $(this).parents('form:first').serialize(),
    })
    .done(function () {
          pageHref="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}";
          pageHref = pageHref + "?pageID=" + dataID +"')"
          window.location.href = pageHref; 
    });
});

$('button.ps-config-toggle').on('click', function(){
    var id = $(this).attr('data-id');
    pageHref="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}";
    pageHref = pageHref + "?pageID=" + id +"')"
    window.location.href = pageHref;
    //$('form').css('display', 'none');
    //$('#ps-config-form-' + id).fadeIn();
});

  $(function(){
    $('#ps-config-form-0').fadeIn();
  });
</script>
<script>
    function ExportToPNG() {
      html2canvas($('.well'), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            //document.body.appendChild(canvas);
            $(".faSpinner").show();
            // Convert and download as image 
            Canvas2Image.saveAsPNG(canvas); 
            //document.body.append(canvas);
            // Clean up 
            //document.body.removeChild(canvas);
            $(".faSpinner").hide();
        }
    });
}
</script>
<style>
tr {
width: 100%;
display: inline-table;
table-layout: fixed;
}

table{
 height:400px;    
 display: -moz-groupbox;    
}
tbody{
  overflow-y: scroll;      
  height: 350px;            
  width:250px;  
  position: absolute;
}
</style>