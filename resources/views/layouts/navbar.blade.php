<nav class="navbar navbar-inverse bg-primary" style="height:45px;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">

        <li class="nav-option">
          <a href="{{ url('casino') }}">
            <img src="/images/casino.png" alt="" style="margin-bottom: -7px;">
            <strong style="{{ Request::is('casino*') ? "color: #ffe630;" : ''}}">@lang('messages.casino')</strong>
          </a>
        </li>

        <li class="nav-option">
          <a href="{{ url('statistics') }}">
            <img src="/images/statistics.png" alt="" style="margin-bottom: -7px;">
            <strong style="{{ Request::is('statistics*') ? "color:  #ffe630;" : ''}}">@lang('messages.statistics')</strong>
          </a>
        </li>
        @if(Request::is('players*'))    
        <li class="nav-option">
          <a href="{{ url('players') }}">
            <img src="/images/players.png" alt="" style="margin-bottom: -7px;">
            <strong style="{{ Request::is('players*') ? "color: #ffe630;" : ''}}">@lang('messages.players')</strong>
          </a>
        </li>
        @endif
        @hasanyrole(['Casino Admin', 'Owner', 'Super User'])
        <li class="nav-option">
          <a
              href="{{ url('settings') }}"
          >
            <img src="/images/settings_real.png" alt="" style="margin-bottom: -7px;">
            <strong style="{{ Request::is('settings*') ? "color: #ffe630;" : ''}}">@lang('messages.settings')</strong>
          </a>
        </li>
        @endhasanyrole

      </ul>

      <ul class="nav navbar-nav navbar-right">  

        <li class="nav-secondary"><a ><strong class="nav-secondary">@lang('messages.user'): {{ Auth::user()->fullName() }}</strong></a></li>

        <li class="nav-option">
            <a href="{{ url('logout') }}">
              <img src="/images/logout.png" alt="" style="margin-bottom: -7px;">
            </a>
        </li>
      </ul> 

      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">

            <a href="" data-toggle="dropdown">
                <strong class="nav-secondary">{{ Session::get('locale.lang_short_name') }}</strong>
                <span class="flag-icon flag-icon-{{ \App::isLocale('en') ? 'gb' : Session::get('locale.lang_code') }} flag-icon-squared nav-secondary"></span>
                <span class="caret"></span> 
            </a>

            <ul class="dropdown-menu" role="menu">
                @foreach($CmsLangs as $key => $val)
                    <li>
                      <a href="#" class="langSupport" data-lang="{{$val->lang_code}}" data-langid="{{$val->langid}}">
                          <span class="flag-icon flag-icon-{{$val->lang_code == "en" ? "gb" : $val->lang_code}} flag-icon-squared"></span>
                          {{$val->lang_short_name}} - {{$val->langname}}
                      </a>
                    </li>
                @endforeach
            </ul>
        </li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong class="nav-secondary">@lang('messages.casino'): </strong>
                <strong id="currenCasino" class="nav-secondary" data-casino="{{ Session::get('casino')->casinoid }}">
                  {{ Session::get('casino')->casinoname }}
                </strong>
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                @foreach($casinos as $casino)
                    <li>
                      <a class="CasinoName" data-casino="{{ $casino->casinoid }}" >{{ $casino->casinoname }}</a> 
                    </li>
                @endforeach
            </ul>
        </li>  
      </ul>  
  
    </div><!--/.nav-collapse -->
  </div><!--/ .container -->
</nav>
<img src="images/bgr_fx.png" style="width: 50%; background-color: red; position: absolute;top: 48px; left: 0.1px;">
<img src="images/bgr_right.png" style="width: 50%; background-color: red; position: absolute; top: 48px; right: 0.1px;">
@if(Request::is('settings*'))
    @include('settings.navbar')
@endif

@if(Request::is('statistics*'))
  <div class="container">
    @include('statistics.navbar')
  </div>
@endif

@if(Request::is('players*'))
  <div class="container">
    @include('players.navbar')
  </div>
@endif

@if(Request::is('casino*'))
  <div class="container">
    @include('casino.navbar')
  </div>
@endif

<style>
/* unvisited link */
ul.breadcrumb a:link {
    color: black;
}

/* visited link */
ul.breadcrumb a:visited {
    color: black;
}

/* mouse over link */
ul.breadcrumb a:hover {
    color: black;
}

/* selected link */
ul.breadcrumb a:active {
    color: black;
}

.active {
  color:white !important;
}

.navbar {
background: rgba(94,94,94,1);
background: -moz-linear-gradient(top, rgba(94,94,94,1) 0%, rgba(38,35,38,0.98) 4%, rgba(110,110,110,0.95) 12%, rgba(89,89,89,0.92) 19%, rgba(128,128,128,0.9) 25%, rgba(186,186,186,0.84) 38%, rgba(0,0,0,0.66) 84%, rgba(0,0,0,0.61) 96%, rgba(26,26,26,0.59) 99%, rgba(26,26,26,0.59) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(94,94,94,1)), color-stop(4%, rgba(38,35,38,0.98)), color-stop(12%, rgba(110,110,110,0.95)), color-stop(19%, rgba(89,89,89,0.92)), color-stop(25%, rgba(128,128,128,0.9)), color-stop(38%, rgba(186,186,186,0.84)), color-stop(84%, rgba(0,0,0,0.66)), color-stop(96%, rgba(0,0,0,0.61)), color-stop(99%, rgba(26,26,26,0.59)), color-stop(100%, rgba(26,26,26,0.59)));
background: -webkit-linear-gradient(top, rgba(94,94,94,1) 0%, rgba(38,35,38,0.98) 4%, rgba(110,110,110,0.95) 12%, rgba(89,89,89,0.92) 19%, rgba(128,128,128,0.9) 25%, rgba(186,186,186,0.84) 38%, rgba(0,0,0,0.66) 84%, rgba(0,0,0,0.61) 96%, rgba(26,26,26,0.59) 99%, rgba(26,26,26,0.59) 100%);
background: -o-linear-gradient(top, rgba(94,94,94,1) 0%, rgba(38,35,38,0.98) 4%, rgba(110,110,110,0.95) 12%, rgba(89,89,89,0.92) 19%, rgba(128,128,128,0.9) 25%, rgba(186,186,186,0.84) 38%, rgba(0,0,0,0.66) 84%, rgba(0,0,0,0.61) 96%, rgba(26,26,26,0.59) 99%, rgba(26,26,26,0.59) 100%);
background: -ms-linear-gradient(top, rgba(94,94,94,1) 0%, rgba(38,35,38,0.98) 4%, rgba(110,110,110,0.95) 12%, rgba(89,89,89,0.92) 19%, rgba(128,128,128,0.9) 25%, rgba(186,186,186,0.84) 38%, rgba(0,0,0,0.66) 84%, rgba(0,0,0,0.61) 96%, rgba(26,26,26,0.59) 99%, rgba(26,26,26,0.59) 100%);
background: linear-gradient(to bottom, rgba(94,94,94,1) 0%, rgba(38,35,38,0.98) 4%, rgba(110,110,110,0.95) 12%, rgba(89,89,89,0.92) 19%, rgba(128,128,128,0.9) 25%, rgba(186,186,186,0.84) 38%, rgba(0,0,0,0.66) 84%, rgba(0,0,0,0.61) 96%, rgba(26,26,26,0.59) 99%, rgba(26,26,26,0.59) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5e5e5e', endColorstr='#1a1a1a', GradientType=0 );

}


.nav-option {
  font-family: arial; font-size: 15pt; color: #fff;
}
.nav-secondary {
  font-family: arial; font-size: 12pt; color: #fff;
}

.nav-option > a > img {
  position: relative;
  bottom: 6px;

}

strong {
  color:white;
}

</style>