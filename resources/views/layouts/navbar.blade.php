<nav class="navbar navbar-inverse navbar-static-top " style="height: 50px">
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
        <li>
            <a href="{{ url('casino') }}"><i style="font-size: 21px;" class="fa fa-dashboard"></i></i><strong>   @lang('messages.casino')</strong></a>
        </li>

         <li>
            <a href="{{ url('statistics') }}"><i style="font-size: 21px;" class="fa fa-bar-chart"></i><strong> @lang('messages.statistics')</strong></a>
        </li>

        <li>
            <a href="{{ url('settings') }}"><i style="font-size: 21px;" class="fa fa-btn fa-wrench"></i><strong>  @lang('messages.settings')</strong></a>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
            <a href="#" id="MenuUser" class="dropdown-toggle2" data-toggle="dropdown" role="button" aria-expanded="false">
                <span ><strong>  @lang('messages.user'): </strong><strong id="UserMenu"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </strong></span> <span class="caret"></span>
            </a>
              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="#" class="UserSupport" data-lang="bg">
                        @lang('messages.mySetings')
                      </a>
                  </li>
                  <li>
                      <a href="{{ url('logout') }}" class="UserSupport" data-lang="en">
                        @lang('messages.logout') <i class="fa fa-btn fa-sign-out  fa-2x" style="font-size: 18px;"></i>
                      </a>
                  </li>
             </ul>
        </li>  
      </ul> 

      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">

          <a href="" data-toggle="dropdown">
            <strong>@lang('messages.language'): </strong>

            <strong>{{ \App::isLocale('en') ? 'EN' : 'BG '}}</strong>

            <span class="flag-icon flag-icon-{{ \App::isLocale('en') ? 'gb' : 'bg' }} flag-icon-squared"></span>

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
                <strong>@lang('messages.casino'): </strong>
                <strong>
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

@if(Request::is('settings*'))
    @include('settings.navbar')
@endif

@if(Request::is('statistics*'))
  <div class="container">
    @include('statistics.navbar')
  </div>
@endif


@if(Request::is('casino*'))
  <div class="container">
    @include('casino.navbar')
  </div>
@endif
