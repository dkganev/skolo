<div class="container">
  <div class="row">
      <div class="col-md-12 "> 
          <div style="padding-top:6px; margin-top: 0px; background-color: none;">
              <!-- Secondary Navigation -->
              <ul class="breadcrumb" style="background-color: #e5e6e8 !important; ">
                @hasanyrole(['Owner', 'Super User'])
                <li><a id="TerminalsSettings" href="javascript:ajaxLoad('{{url('settings/terminals')}}')" data-url="{{substr(url(''),0,-5)}}">Terminals</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/gameservers')}}')">Game Servers</a></li>
        
                <li><a href="javascript:ajaxLoad('{{url('settings/users')}}')">Users</a></li>
               @endhasanyrole
                <li><a href="javascript:ajaxLoad('{{url('settings/casinos')}}')">Casinos</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/billtypes')}}')">Billing Types</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/langs')}}')"">Languages</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/errors')}}')">Errors</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/bingo/mainconfig')}}')">Bingo</a></li>

                <li><a href="javascript:ajaxLoad('{{url('settings/blackjack/mainconfig')}}')">Blackjack</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">Roulette</a></li>
                
                <li><a href="javascript:ajaxLoad('{{url('/settings/PBS/BonusPoints2Money')}}')">PBS</a></li>

              </ul>
          </div>
      </div>
  </div>
  <hr style="padding-bottom: 15px; margin: 0;">
</div>

