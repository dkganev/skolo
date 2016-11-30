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
          <a  style="{{ Request::is('casino*') ? "color: #ffe630;" : ''}}" 
              href="{{ url('casino') }}"
          >
            {{-- <i style="font-size: 21px;" class="fa fa-dashboard"></i> --}}
            <img src="/images/casino.png" alt="" style="margin-bottom: -7px;">
            <strong>@lang('messages.casino')</strong>
          </a>
        </li>

        <li class="nav-option">
          <a  style="{{ Request::is('statistics*') ? "color:  #ffe630;" : ''}}"
              href="{{ url('statistics') }}"
          >
            <img src="/images/statistics.png" alt="" style="margin-bottom: -7px;">
            <strong>@lang('messages.statistics')</strong>
          </a>
        </li>
        <li class="nav-option">
          <a  style="{{ Request::is('players*') ? "color: white;" : ''}}"
              href="{{ url('players') }}"
          >
            <i class="glyphicon glyphicon-user hidden-sm"></i>
            <strong>@lang('messages.players')</strong>
          </a>
        </li>
 
        @hasanyrole(['Casino Admin', 'Owner', 'Super User'])
        <li class="nav-option">
          <a  style="{{ Request::is('settings*') ? "color: #ffe630;" : ''}}"
              href="{{ url('settings') }}"
          >
            <img src="/images/settings_real.png" alt="" style="margin-bottom: -7px;">
            <strong>@lang('messages.settings')</strong>
          </a>
        </li>
        @endhasanyrole

      </ul>

      <ul class="nav navbar-nav navbar-right">  

        <li class="nav-secondary"><a ><strong class="nav-secondary">User: {{ Auth::user()->fullName() }}</strong></a></li>

        <li>
            <a href="{{ url('logout') }}" style="padding: 0;">
              <button type="button" class="btn btn-danger navbar-btn btn-block">
                <strong>X</strong>
              </button>
            </a>
        </li>
      </ul> 


      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">

          <a href="" data-toggle="dropdown">

            <strong class="nav-secondary">{{ \App::isLocale('en') ? 'EN' : 'BG '}}</strong>

            <span class="flag-icon flag-icon-{{ \App::isLocale('en') ? 'gb' : 'bg' }} flag-icon-squared nav-secondary"></span>

            <span class="caret"></span> 
          </a>

          <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#" class="langSupport" data-lang="bg">
                  <span class="flag-icon flag-icon-bg flag-icon-squared"></span>
                  BG
                </a>
              </li>
              <li>
                <a href="#" class="langSupport" data-lang="en">
                  <span class="flag-icon flag-icon-gb flag-icon-squared"></span>
                  EN
                </a>
              </li>
          </ul>
          </li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong class="nav-secondary">@lang('messages.casino'): </strong>
                <strong class="nav-secondary">
                  {{ Session::get('casino')->casinoname }}
                </strong>
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                @foreach($casinos as $casino)
                  <a href="">{{ $casino->casinoname }}</a>
                @endforeach
              </li>
           </ul>
        </li>  
      </ul>  
  
    </div><!--/.nav-collapse -->
  </div><!--/ .container -->
</nav>
<img src="images/bgr_fx.png" alt="" style="width: 60%;background-color: red; position: absolute; top: 49px;left: -60px;top: 49px;">
<img id="image-flipped" src="images/bgr_fx.png" alt="" style="width: 60%;background-color: red; position: absolute;top: 49px;right: -251px;">

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


/*ul.nav a {
  color:white !important;
}*/

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

#image-flipped {
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}

.nav-option {
  font-family: arial; font-size: 15pt; color: #fff;
}
.nav-secondary {
  font-family: arial; font-size: 12pt; color: #fff;"
}

.nav-option > a > img {
  position: relative;
  bottom: 6px;

}
</style>