<div class="container">
  <div class="row">
      <div class="col-lg-8">
        <hr style="padding-bottom: 15px; margin: 0;">
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">

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
        <h1 style="margin-top: 0px;" class="page-header">Roulette 1 - Terminals Config</h1>
        <div style="padding-top:2px; margin-top: 0px; background-color: none;">
            <!-- Secondary Navigation -->
            <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
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

<div class="well" style="background: #ffffff; overflow: hidden;">

    <div class="col-lg-3">
      <table class="table table-bordered" style="width: 250px;">
        <thead class="w3-blue-grey">
          <tr>
            <th>PS ID</th>
            <th>SEAT ID</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($ps_conf as $conf)
        <tr>

          <td>{{ $conf->ps_id }}</td>
          <td>{{ $conf->seat_id }}</td>
          <td>
            <button class="btn btn-primary btn-xs mybonus-button"
                    type="submit"
            >
              Edit
            </button>
          </td>
        </tr>
        @endforeach

        </tbody>
        </table>
      </div>


  <form action="/settings/bingo/mainconfig/edit" method="POST" role="form" id="bingo-main-config">
    {{ csrf_field() }}
    <!-- SETIINGS -->

    <div class="col-lg-2">
      <h4 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Min Bets(credits):</h4>
      <hr style="margin-top: 7px;">

          <div class="form-group form-group-sm">
            <label style="color: #474747">Game:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">$</span>
            <input name="game_min_bet" value="" type="text" class="form-control" placeholder="Game Min Bet" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bingo_win_pr" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><strong>%</strong></span>
            <input name="bingo_line_pr" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

    </div><!-- End Col -->

    <!-- VISIBLE -->
    <div class="col-lg-2">
      <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Max Bets (credits):</h3>
      <hr style="margin-top: 7px;">

        <div class="form-group form-group-sm">
          <label style="color: #474747">My Bonus:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="mybonus_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_line_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_bingo_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Jackpot Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_line_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Jackpot Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_bingo_pr_visible" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

    </div><!-- End Col -->


  <!-- HIDDEN -->

    <div class="col-lg-2">
      <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Denominations:</h3>
      <hr style="margin-top: 7px;">

        <div class="form-group form-group-sm">
          <label style="color: #474747">My Bonus:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="mybonus_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_line_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_bingo_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
          <label style="color: #474747">Jackpot Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_line_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Jackpot Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_bingo_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

      </div><!-- End Col -->

  <!-- HIDDEN -->

    <div class="col-lg-2">
      <h3 style="margin: 0; padding: 0; color: #474747; font-family: sans-serif; font-size: 21px;">   Multipliers:</h3>
      <hr style="margin-top: 7px;">

        <div class="form-group form-group-sm">
          <label style="color: #474747">My Bonus:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="mybonus_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_line_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Bonus Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="bonus_bingo_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
          <label style="color: #474747">Jackpot Line:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_line_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

        <div class="form-group form-group-sm">
            <label style="color: #474747">Jackpot Bingo:</label><br>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">%</span>
            <input name="jackpot_bingo_pr_hidden" value="" type="text" class="form-control" placeholder="Ticket Cost" aria-describedby="sizing-addon2">
          </div>
        </div>

      <hr style="width:100%;">
      <button id="bingo-main-config-sbt" type="submit" style="width:315px; margin-left: 17px;" class="btn btn-danger pull-right">Update</button>
      </div><!-- End Col -->

      </form>


</div>


    </div><!-- End Panel Body--> 
  </div><!-- End Panel -->  
</div>
