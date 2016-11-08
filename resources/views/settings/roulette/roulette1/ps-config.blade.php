<div class="container">
  <div class="row">
      <div class="col-lg-8">
        <hr style="padding-bottom: 15px; margin: 0;">
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; margin-bottom: 10px;">

              <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Roulette 1</a></li>

              <li><a href="javascript:ajaxLoad('{{url('/settings/roulette2/wheelsettings')}}')">Roulette 2</a></li>

            </ul>
        </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <h2 style="margin-top: 0px; margin-bottom: 5px;" class="page-header">Roulette 1 - Terminals Config</h2>
      <div style="padding-top:2px; margin-top: 0px; background-color: none;">
          <!-- Secondary Navigation -->
          <ul class="breadcrumb" style="background-color: #e5e6e8 !important; margin-bottom: 10px;">
            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Wheel Settings</a></li>

            <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelconfig')}}')">Wheel Config</a></li>

            <li class="active"><a href="javascript:ajaxLoad('{{url('/settings/roulette1/psconfig')}}')">Terminals Config</a></li>
          </ul>
      </div>
    </div>
  </div><!-- End Row -->
</div><!-- End Container-->

<div class="container-full">
<div class="row">

<div class="well" style="background: #ffffff; overflow: hidden; margin: 0; padding: 0;">

    <div class="col-lg-3">
      <table class="table table-bordered" style="width: 250px; margin-top: 50px;">
        <thead class="w3-blue-grey">
          <tr >
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
  <form style="display:none;" action="/settings/bingo/mainconfig/edit" method="POST" role="form" id="ps-config-form-{{ $conf->ps_id }}">
    {{ csrf_field() }}
    <div class="w3-blue-grey" id="heading" style="width: 100%;  height: 35px; margin-bottom: 15px;">
      <h3 style="margin:0; padding: 0; color: #fff; font-family: sans-serif;">
          <strong><i style="margin:0 0 0 268px; position: relative; top: 5px">PS ID {{ $conf->ps_id }} - Config</i></strong>
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
            <input name="game_min_bet" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Game Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Straight Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="straight_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Straight Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Split Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="split_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Split Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Basket & Street Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="basket_a_street_bet_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Basket & Street Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Corner Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="corner_bet_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Corner Bet Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Six Number Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="six_number_line_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Six Number Line Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Dozen Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="dozen_bet_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Dozen Bet Min" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Even Min Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="even_bet_min" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Even Bet Min" aria-describedby="sizing-addon2">
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
            <input name="game_max_bet" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Game Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Straight Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="straight_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Straight Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Split Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="split_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Split Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Basket & Street Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="basket_a_street_bet_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Basket & Street Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Corner Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="corner_bet_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Corner Bet Max" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Six Number Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="six_number_line_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Six Number Line Max" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Dozen Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="dozen_bet_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Dozen Max Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Even Max Bet:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>$</strong></span>
            <input name="even_bet_max" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Even Bet Max" aria-describedby="sizing-addon2">
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
            <input name="mult1" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #1" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #2:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult2" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #2" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #3:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult3" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #3" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
          <label style="color: #474747">Multiplier #4:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult4" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #4" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #5:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult5" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #5" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Multiplier #6:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>#</strong></span>
            <input name="mult6" value="{{ $conf->game_min_bet }}" type="text" class="form-control" placeholder="Multiplier #6" aria-describedby="sizing-addon2">
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
            <option value="1">$0.01</option>
            <option value="2">$0.05</option>
            <option value="3">$0.10</option>
            <option value="4">$0.25</option>
            <option value="5">$0.50</option>
            <option value="6">$1.00</option>
            <option value="7">$5.00</option>
            <option value="8">$10.00</option>
            <option value="9">$20.00</option>
            <option value="10">$100.00</option>
            <option value="11">$0.20</option>
            <option value="12">$2.00</option>
            <option value="13">$2.50</option>
            <option value="14">$25.00</option>
            <option value="15">$50.00</option>
            <option value="16">$200.00</option>
            <option value="17">$250.00</option>
            <option value="18">$500.00</option>
            <option value="19">$1000.00</option>
            <option value="20">$2000.00</option>
            <option value="21">$2500.00</option>
            <option value="22">$5000.00</option>
            <option value="23">$0.02</option>
            <option value="24">$0.03</option>
            <option value="25">$0.15</option>
            <option value="26">$0.40</option>
          </select>
        </div>

        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
          <label for="denom2">Denomination #2:</label><br>
          <select name="denom2" id="denom2" class="selectpicker" data-actions-box="true">
            <option value="1">$0.01</option>
            <option value="2">$0.05</option>
            <option value="3">$0.10</option>
            <option value="4">$0.25</option>
            <option value="5">$0.50</option>
            <option value="6">$1.00</option>
            <option value="7">$5.00</option>
            <option value="8">$10.00</option>
            <option value="9">$20.00</option>
            <option value="10">$100.00</option>
            <option value="11">$0.20</option>
            <option value="12">$2.00</option>
            <option value="13">$2.50</option>
            <option value="14">$25.00</option>
            <option value="15">$50.00</option>
            <option value="16">$200.00</option>
            <option value="17">$250.00</option>
            <option value="18">$500.00</option>
            <option value="19">$1000.00</option>
            <option value="20">$2000.00</option>
            <option value="21">$2500.00</option>
            <option value="22">$5000.00</option>
            <option value="23">$0.02</option>
            <option value="24">$0.03</option>
            <option value="25">$0.15</option>
            <option value="26">$0.40</option>
          </select>
        </div>
        <div class="form-group form-group-sm" style="width:270px; display: inline-block;">
          <label for="denom3">Denomination #3:</label><br>
          <select name="denom3" id="denom3" class="selectpicker" data-actions-box="true">
            <option value="1">$0.01</option>
            <option value="2">$0.05</option>
            <option value="3">$0.10</option>
            <option value="4">$0.25</option>
            <option value="5">$0.50</option>
            <option value="6">$1.00</option>
            <option value="7">$5.00</option>
            <option value="8">$10.00</option>
            <option value="9">$20.00</option>
            <option value="10">$100.00</option>
            <option value="11">$0.20</option>
            <option value="12">$2.00</option>
            <option value="13">$2.50</option>
            <option value="14">$25.00</option>
            <option value="15">$50.00</option>
            <option value="16">$200.00</option>
            <option value="17">$250.00</option>
            <option value="18">$500.00</option>
            <option value="19">$1000.00</option>
            <option value="20">$2000.00</option>
            <option value="21">$2500.00</option>
            <option value="22">$5000.00</option>
            <option value="23">$0.02</option>
            <option value="24">$0.03</option>
            <option value="25">$0.15</option>
            <option value="26">$0.40</option>
          </select>
        </div>

        <div class="form-group form-group-sm" style="width:270px; display: inline-block; padding: 0;">
          <label for="denom4">Denomination #4:</label><br>
          <select name="denom4" id="denom4" class="selectpicker" data-actions-box="true">
            <option value="1">$0.01</option>
            <option value="2">$0.05</option>
            <option value="3">$0.10</option>
            <option value="4">$0.25</option>
            <option value="5">$0.50</option>
            <option value="6">$1.00</option>
            <option value="7">$5.00</option>
            <option value="8">$10.00</option>
            <option value="9">$20.00</option>
            <option value="10">$100.00</option>
            <option value="11">$0.20</option>
            <option value="12">$2.00</option>
            <option value="13">$2.50</option>
            <option value="14">$25.00</option>
            <option value="15">$50.00</option>
            <option value="16">$200.00</option>
            <option value="17">$250.00</option>
            <option value="18">$500.00</option>
            <option value="19">$1000.00</option>
            <option value="20">$2000.00</option>
            <option value="21">$2500.00</option>
            <option value="22">$5000.00</option>
            <option value="23">$0.02</option>
            <option value="24">$0.03</option>
            <option value="25">$0.15</option>
            <option value="26">$0.40</option>
          </select>
        </div>

      </div><!-- End Col -->

      <hr style="width:100%;">
      <button type="submit" style="width:315px; margin-left: 17px;" class="btn btn-danger pull-right">Update</button>
      </form>
      </div>
      @endforeach

</div><!-- End PsConfig--> 

</div><!-- End Well--> 
</div><!-- End Row--> 
</div><!-- End Container -->

<script>

  $('button.ps-config-toggle').on('click', function(){
    var id = $(this).attr('data-id');
    $('form').css('display', 'none');
    $('#ps-config-form-' + id).fadeIn();
  });

  $(function(){
    $('#ps-config-form-1').fadeIn();
  });
</script>
