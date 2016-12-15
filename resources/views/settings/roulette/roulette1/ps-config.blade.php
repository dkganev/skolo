<div class="container">
  <div class="row">
      <div class="col-lg-8">
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <ul class="breadcrumb" style="margin-bottom: 10px;">

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Roulette 1</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">Roulette 2</a></li>

            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
  <div class="row">
    <div class="col-lg-7">
      <div style="padding-top:2px; margin-top: 0px;">
          <ul class="breadcrumb secondary-breadcrumb" style="margin-bottom: 10px;">
            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Wheel Settings</a></li>

            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelconfig')}}')">Wheel Config</a></li>

            <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}')">Terminals Config</a></li>

            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/accconfig')}}')">Accounting Config</a></li>
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
            <th>PS ID</th>
            <th>SEAT ID</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($ps_conf as $conf)
            <tr style="height: 20px">
              <td>{{ $conf->ps_id }}</td>
              <td>{{ $conf->seat_id }}</td>
              <td>
                <button class="btn btn-primary btn-xs ps-config-toggle"
                        type="submit"
                        data-id="{{ $conf->ps_id }}"
                >
                  Edit
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

<div id="psconfig">
  @foreach($ps_conf as $conf)
  <form style="display: none" action="/settings/roulette1/psconfig/edit" 
        method="POST" role="form" id="ps-config-form-{{ $conf->ps_id }}"
  >
    <div class="w3-blue-grey" id="heading" style="width: 100%;  height: 35px; margin-bottom: 15px;">
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
    <div class="col-lg-2">
      <h4 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Min Bets (credits):</h4>
      <hr style="margin: 7px 0 12px 0;">

        <div class="form-group form-group-sm">
            <label style="color: #474747">Game Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="game_min_bet" value="{{ $conf->game_min_bet }}" type="text" class="form-control text-center" placeholder="Game Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Straight Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="straight_min" value="{{ $conf->straight_min }}" type="text" class="form-control text-center" placeholder="Straight Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Split Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="split_min" value="{{ $conf->split_min }}" type="text" class="form-control text-center" placeholder="Split Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Basket & Street Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="basket_a_street_bet_min" value="{{ $conf->basket_a_street_bet_min }}" type="text" class="form-control text-center" placeholder="Basket & Street Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Corner Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="corner_bet_min" value="{{ $conf->corner_bet_min }}" type="text" class="form-control text-center" placeholder="Corner Bet Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Six Number Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="six_number_line_min" value="{{ $conf->six_number_line_min }}" type="text" class="form-control text-center" placeholder="Six Number Line Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Dozen Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="dozen_bet_min" value="{{ $conf->dozen_bet_min }}" type="text" class="form-control text-center" placeholder="Dozen Bet Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Even Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="even_bet_min" value="{{ $conf->even_bet_min }}" type="text" class="form-control text-center" placeholder="Even Bet Min" aria-describedby="sizing-addon2">
          </div>
        </div>

    </div><!-- End Col -->

    <!-- MAX BETS -->
    <div class="col-lg-2">
      <h4 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Max Bets (credits):</h4>
      <hr style="margin: 7px 0 12px 0;">

          <div class="form-group form-group-sm">
            <label style="color: #474747">Game Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="game_max_bet" value="{{ $conf->game_max_bet }}" type="text" class="form-control text-center" placeholder="Game Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Straight Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="straight_max" value="{{ $conf->straight_max }}" type="text" class="form-control text-center" placeholder="Straight Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Split Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="split_max" value="{{ $conf->split_max }}" type="text" class="form-control text-center" placeholder="Split Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Basket & Street Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="basket_a_street_bet_max" value="{{ $conf->basket_a_street_bet_max }}" type="text" class="form-control text-center" placeholder="Basket & Street Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Corner Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="corner_bet_max" value="{{ $conf->corner_bet_max }}" type="text" class="form-control text-center" placeholder="Corner Bet Max" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Six Number Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="six_number_line_max" value="{{ $conf->six_number_line_max }}" type="text" class="form-control text-center" placeholder="Six Number Line Max" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Dozen Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="dozen_bet_max" value="{{ $conf->dozen_bet_max }}" type="text" class="form-control text-center" placeholder="Dozen Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Even Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="even_bet_max" value="{{ $conf->even_bet_max }}" type="text" class="form-control text-center" placeholder="Even Bet Max" aria-describedby="sizing-addon2">
          </div>
        </div>

    </div><!-- End Col -->


  <!-- Multipliers -->
    <div class="col-lg-2">

      <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Multipliers:</h3>
      <hr style="margin: 7px 0 12px 0;">

        <div class="form-group form-group-sm">
          <label style="color: #474747">Multiplier #1:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult1" value="{{ $conf->mult1 }}" type="text" class="form-control text-center" placeholder="Multiplier #1" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #2:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult2" value="{{ $conf->mult2 }}" type="text" class="form-control text-center" placeholder="Multiplier #2" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #3:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult3" value="{{ $conf->mult3 }}" type="text" class="form-control text-center" placeholder="Multiplier #3" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
          <label style="color: #474747">Multiplier #4:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult4" value="{{ $conf->mult4 }}" type="text" class="form-control text-center" placeholder="Multiplier #4" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #5:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult5" value="{{ $conf->mult5 }}" type="text" class="form-control text-center" placeholder="Multiplier #5" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #6:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult6" value="{{ $conf->mult6 }}" type="text" class="form-control text-center" placeholder="Multiplier #6" aria-describedby="sizing-addon2">
          </div>
        </div>

      </div><!-- End Col -->

  <!-- Denominations -->
    <div class="col-lg-2">

      <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Denominations:</h3>
      <hr style="margin: 7px 0 12px 0;">

        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
          <label for="denom1">Denomination #1:</label><br>
          <select name="denom1" id="denom1" class="selectpicker" data-actions-box="true">
            <option {{ $conf->denom1 == 0 ? 'selected="true"' : '' }} value="0">None</option>
            <option {{ $conf->denom1 == 1 ? 'selected="true"' : '' }} value="1">$0.01</option>
            <option {{ $conf->denom1 == 2 ? 'selected="true"' : '' }} value="2">$0.05</option>
            <option {{ $conf->denom1 == 3 ? 'selected="true"' : '' }} value="3">$0.10</option>
            <option {{ $conf->denom1 == 4 ? 'selected="true"' : '' }} value="4">$0.25</option>
            <option {{ $conf->denom1 == 5 ? 'selected="true"' : '' }} value="5">$0.50</option>
            <option {{ $conf->denom1 == 6 ? 'selected="true"' : '' }} value="6">$1.00</option>
            <option {{ $conf->denom1 == 7 ? 'selected="true"' : '' }} value="7">$5.00</option>
            <option {{ $conf->denom1 == 8 ? 'selected="true"' : '' }} value="8">$10.00</option>
            <option {{ $conf->denom1 == 9 ? 'selected="true"' : '' }} value="9">$20.00</option>
            <option {{ $conf->denom1 == 10 ? 'selected="true"' : '' }} value="10">$100.00</option>
            <option {{ $conf->denom1 == 11 ? 'selected="true"' : '' }} value="11">$0.20</option>
            <option {{ $conf->denom1 == 12 ? 'selected="true"' : '' }} value="12">$2.00</option>
            <option {{ $conf->denom1 == 13 ? 'selected="true"' : '' }} value="13">$2.50</option>
            <option {{ $conf->denom1 == 14 ? 'selected="true"' : '' }} value="14">$25.00</option>
            <option {{ $conf->denom1 == 15 ? 'selected="true"' : '' }} value="15">$50.00</option>
            <option {{ $conf->denom1 == 16 ? 'selected="true"' : '' }} value="16">$200.00</option>
            <option {{ $conf->denom1 == 17 ? 'selected="true"' : '' }} value="17">$250.00</option>
            <option {{ $conf->denom1 == 18 ? 'selected="true"' : '' }} value="18">$500.00</option>
            <option {{ $conf->denom1 == 19 ? 'selected="true"' : '' }} value="19">$1000.00</option>
            <option {{ $conf->denom1 == 20 ? 'selected="true"' : '' }} value="20">$2000.00</option>
            <option {{ $conf->denom1 == 21 ? 'selected="true"' : '' }} value="21">$2500.00</option>
            <option {{ $conf->denom1 == 22 ? 'selected="true"' : '' }} value="22">$5000.00</option>
            <option {{ $conf->denom1 == 23 ? 'selected="true"' : '' }} value="23">$0.02</option>
            <option {{ $conf->denom1 == 24 ? 'selected="true"' : '' }} value="24">$0.03</option>
            <option {{ $conf->denom1 == 25 ? 'selected="true"' : '' }} value="25">$0.15</option>
            <option {{ $conf->denom1 == 26 ? 'selected="true"' : '' }} value="26">$0.40</option>
          </select>
        </div>

        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
          <label for="denom2">Denomination #2:</label><br>
          <select style="height: 40px; line-height:30px;" name="denom2" id="denom2" class="selectpicker" data-actions-box="true">
            <option {{ $conf->denom2 == 0 ? 'selected="true"' : '' }} value="0">None</option>
            <option {{ $conf->denom2 == 1 ? 'selected="true"' : '' }} value="1">$0.01</option>
            <option {{ $conf->denom2 == 2 ? 'selected="true"' : '' }} value="2">$0.05</option>
            <option {{ $conf->denom2 == 3 ? 'selected="true"' : '' }} value="3">$0.10</option>
            <option {{ $conf->denom2 == 4 ? 'selected="true"' : '' }} value="4">$0.25</option>
            <option {{ $conf->denom2 == 5 ? 'selected="true"' : '' }} value="5">$0.50</option>
            <option {{ $conf->denom2 == 6 ? 'selected="true"' : '' }} value="6">$1.00</option>
            <option {{ $conf->denom2 == 7 ? 'selected="true"' : '' }} value="7">$5.00</option>
            <option {{ $conf->denom2 == 8 ? 'selected="true"' : '' }} value="8">$10.00</option>
            <option {{ $conf->denom2 == 9 ? 'selected="true"' : '' }} value="9">$20.00</option>
            <option {{ $conf->denom2 == 10 ? 'selected="true"' : '' }} value="10">$100.00</option>
            <option {{ $conf->denom2 == 11 ? 'selected="true"' : '' }} value="11">$0.20</option>
            <option {{ $conf->denom2 == 12 ? 'selected="true"' : '' }} value="12">$2.00</option>
            <option {{ $conf->denom2 == 13 ? 'selected="true"' : '' }} value="13">$2.50</option>
            <option {{ $conf->denom2 == 14 ? 'selected="true"' : '' }} value="14">$25.00</option>
            <option {{ $conf->denom2 == 15 ? 'selected="true"' : '' }} value="15">$50.00</option>
            <option {{ $conf->denom2 == 16 ? 'selected="true"' : '' }} value="16">$200.00</option>
            <option {{ $conf->denom2 == 17 ? 'selected="true"' : '' }} value="17">$250.00</option>
            <option {{ $conf->denom2 == 18 ? 'selected="true"' : '' }} value="18">$500.00</option>
            <option {{ $conf->denom2 == 19 ? 'selected="true"' : '' }} value="19">$1000.00</option>
            <option {{ $conf->denom2 == 20 ? 'selected="true"' : '' }} value="20">$2000.00</option>
            <option {{ $conf->denom2 == 21 ? 'selected="true"' : '' }} value="21">$2500.00</option>
            <option {{ $conf->denom2 == 22 ? 'selected="true"' : '' }} value="22">$5000.00</option>
            <option {{ $conf->denom2 == 23 ? 'selected="true"' : '' }} value="23">$0.02</option>
            <option {{ $conf->denom2 == 24 ? 'selected="true"' : '' }} value="24">$0.03</option>
            <option {{ $conf->denom2 == 25 ? 'selected="true"' : '' }} value="25">$0.15</option>
            <option {{ $conf->denom2 == 26 ? 'selected="true"' : '' }} value="26">$0.40</option>
          </select>
        </div>
        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
          <label for="denom3">Denomination #3:</label><br>
          <select name="denom3" id="denom3" class="selectpicker" data-actions-box="true">
            <option {{ $conf->denom3 == 0 ? 'selected="true"' : '' }} value="0">None</option>
            <option {{ $conf->denom3 == 1 ? 'selected="true"' : '' }} value="1">$0.01</option>
            <option {{ $conf->denom3 == 2 ? 'selected="true"' : '' }} value="2">$0.05</option>
            <option {{ $conf->denom3 == 3 ? 'selected="true"' : '' }} value="3">$0.10</option>
            <option {{ $conf->denom3 == 4 ? 'selected="true"' : '' }} value="4">$0.25</option>
            <option {{ $conf->denom3 == 5 ? 'selected="true"' : '' }} value="5">$0.50</option>
            <option {{ $conf->denom3 == 6 ? 'selected="true"' : '' }} value="6">$1.00</option>
            <option {{ $conf->denom3 == 7 ? 'selected="true"' : '' }} value="7">$5.00</option>
            <option {{ $conf->denom3 == 8 ? 'selected="true"' : '' }} value="8">$10.00</option>
            <option {{ $conf->denom3 == 9 ? 'selected="true"' : '' }} value="9">$20.00</option>
            <option {{ $conf->denom3 == 10 ? 'selected="true"' : '' }} value="10">$100.00</option>
            <option {{ $conf->denom3 == 11 ? 'selected="true"' : '' }} value="11">$0.20</option>
            <option {{ $conf->denom3 == 12 ? 'selected="true"' : '' }} value="12">$2.00</option>
            <option {{ $conf->denom3 == 13 ? 'selected="true"' : '' }} value="13">$2.50</option>
            <option {{ $conf->denom3 == 14 ? 'selected="true"' : '' }} value="14">$25.00</option>
            <option {{ $conf->denom3 == 15 ? 'selected="true"' : '' }} value="15">$50.00</option>
            <option {{ $conf->denom3 == 16 ? 'selected="true"' : '' }} value="16">$200.00</option>
            <option {{ $conf->denom3 == 17 ? 'selected="true"' : '' }} value="17">$250.00</option>
            <option {{ $conf->denom3 == 18 ? 'selected="true"' : '' }} value="18">$500.00</option>
            <option {{ $conf->denom3 == 19 ? 'selected="true"' : '' }} value="19">$1000.00</option>
            <option {{ $conf->denom3 == 20 ? 'selected="true"' : '' }} value="20">$2000.00</option>
            <option {{ $conf->denom3 == 21 ? 'selected="true"' : '' }} value="21">$2500.00</option>
            <option {{ $conf->denom3 == 22 ? 'selected="true"' : '' }} value="22">$5000.00</option>
            <option {{ $conf->denom3 == 23 ? 'selected="true"' : '' }} value="23">$0.02</option>
            <option {{ $conf->denom3 == 24 ? 'selected="true"' : '' }} value="24">$0.03</option>
            <option {{ $conf->denom3 == 25 ? 'selected="true"' : '' }} value="25">$0.15</option>
            <option {{ $conf->denom3 == 26 ? 'selected="true"' : '' }} value="26">$0.40</option>
          </select>
        </div>

        <div class="form-group form-group-sm" style="width:270px; display: inline-block; padding: 0;">
          <label for="denom4">Denomination #4:</label><br>
          <select name="denom4" id="denom4" class="selectpicker" data-actions-box="true">
            <option {{ $conf->denom4 == 0 ? 'selected="true"' : '' }} value="0">None</option>
            <option {{ $conf->denom4 == 1 ? 'selected="true"' : '' }} value="1">$0.01</option>
            <option {{ $conf->denom4 == 2 ? 'selected="true"' : '' }} value="2">$0.05</option>
            <option {{ $conf->denom4 == 3 ? 'selected="true"' : '' }} value="3">$0.10</option>
            <option {{ $conf->denom4 == 4 ? 'selected="true"' : '' }} value="4">$0.25</option>
            <option {{ $conf->denom4 == 5 ? 'selected="true"' : '' }} value="5">$0.50</option>
            <option {{ $conf->denom4 == 6 ? 'selected="true"' : '' }} value="6">$1.00</option>
            <option {{ $conf->denom4 == 7 ? 'selected="true"' : '' }} value="7">$5.00</option>
            <option {{ $conf->denom4 == 8 ? 'selected="true"' : '' }} value="8">$10.00</option>
            <option {{ $conf->denom4 == 9 ? 'selected="true"' : '' }} value="9">$20.00</option>
            <option {{ $conf->denom4 == 10 ? 'selected="true"' : '' }} value="10">$100.00</option>
            <option {{ $conf->denom4 == 11 ? 'selected="true"' : '' }} value="11">$0.20</option>
            <option {{ $conf->denom4 == 12 ? 'selected="true"' : '' }} value="12">$2.00</option>
            <option {{ $conf->denom4 == 13 ? 'selected="true"' : '' }} value="13">$2.50</option>
            <option {{ $conf->denom4 == 14 ? 'selected="true"' : '' }} value="14">$25.00</option>
            <option {{ $conf->denom4 == 15 ? 'selected="true"' : '' }} value="15">$50.00</option>
            <option {{ $conf->denom4 == 16 ? 'selected="true"' : '' }} value="16">$200.00</option>
            <option {{ $conf->denom4 == 17 ? 'selected="true"' : '' }} value="17">$250.00</option>
            <option {{ $conf->denom4 == 18 ? 'selected="true"' : '' }} value="18">$500.00</option>
            <option {{ $conf->denom4 == 19 ? 'selected="true"' : '' }} value="19">$1000.00</option>
            <option {{ $conf->denom4 == 20 ? 'selected="true"' : '' }} value="20">$2000.00</option>
            <option {{ $conf->denom4 == 21 ? 'selected="true"' : '' }} value="21">$2500.00</option>
            <option {{ $conf->denom4 == 22 ? 'selected="true"' : '' }} value="22">$5000.00</option>
            <option {{ $conf->denom4 == 23 ? 'selected="true"' : '' }} value="23">$0.02</option>
            <option {{ $conf->denom4 == 24 ? 'selected="true"' : '' }} value="24">$0.03</option>
            <option {{ $conf->denom4 == 25 ? 'selected="true"' : '' }} value="25">$0.15</option>
            <option {{ $conf->denom4 == 26 ? 'selected="true"' : '' }} value="26">$0.40</option>
          </select>
        </div>

      </div><!-- End Col -->
      <hr>
      {{ csrf_field() }}
      <input type="hidden" value="{{ $conf->ps_id }}" name="ps_id">
      <button data-id="{{ $conf->ps_id }}" type="submit" 
              style="width:315px; margin: 203px 10px 10px 17px; position: relative; bottom: 35px; right: 5px" 
              class="btn btn-danger pull-right ps-config-submit"
      >
          Update
      </button>
      </form>
      <script>
          $('select').on('change', function() {
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
          }).change(); //trihgger change handler initially!
      </script>
      @endforeach

</div><!-- End PsConfig--> 

</div><!-- End Well--> 
</div><!-- End Col--> 
</div><!-- End Row--> 
</div><!-- End Container--> 

<script>
  $('.ps-config-submit').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        method: 'POST',
        url: '/settings/roulette1/psconfig/edit',
        data: $(this).parents('form:first').serialize(),
    })
    .done(function () {
         javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}');
    });
  });

  $('button.ps-config-toggle').on('click', function(){
    var id = $(this).attr('data-id');
    $('form').css('display', 'none');
    $('#ps-config-form-' + id).fadeIn();
  });

  $(function(){
    $('#ps-config-form-0').fadeIn();
  });
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