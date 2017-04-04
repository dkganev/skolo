<div class="container">
    <div class="row">
        <div class="col-md-12 "> 
            <div style="padding-top:6px; margin-top: 0px; background-color: none;">
                <!-- Secondary Navigation -->
                <ul class="breadcrumb">
                    @hasanyrole(['Owner', 'Super User'])
                    <li id="menuTerminals">
                        <a  id="TerminalsSettings" href="javascript:ajaxLoad('{{url('settings/terminals')}}')" data-url="{{substr(url(''),0,-5)}}" >
                          @lang('messages.Terminals')
                        </a>
                    </li>
                    <li id="menuGameservers">
                        <a href="javascript:ajaxLoad('{{url('settings/gameservers')}}')">
                            @lang('messages.Game Servers')
                        </a>
                    </li>
                    <li id="menuUsers">
                        <a href="javascript:ajaxLoad('{{url('settings/users')}}')">
                            @lang('messages.Users')
                        </a>
                    </li>
                    @endhasanyrole
                    <li id="menuCasinos">
                        <a href="javascript:ajaxLoad('{{url('settings/casinos')}}')">
                            @lang('messages.Casinos')
                        </a>
                    </li>
                    {{-- <li><a href="javascript:ajaxLoad('{{url('settings/billtypes')}}')">Billing Types</a></li> --}}
                    <li id="menuLangs">
                        <a class="active-secondary-nav" style="color:white;" href="javascript:ajaxLoad('{{url('settings/langs')}}')" accesskey="">
                            @lang('messages.Languages')
                        </a>
                    </li>
                    <li id="menuErrors">
                        <a href="javascript:ajaxLoad('{{url('settings/errors')}}')">
                            @lang('messages.Errors')
                        </a>
                    </li>
                    <li  id="menuBingo">
                        <a href="javascript:ajaxLoad('{{url('settings/bingo/mainconfig')}}')">
                            @lang('messages.Bingo')
                        </a>
                    </li>
                    <li  id="menuBlackjack">
                        <a href="javascript:ajaxLoad('{{url('settings/blackjack/mainconfig')}}')">
                            @lang('messages.Blackjack')
                        </a>
                    </li>
                    <li id="menuRoulette1">
                        <a href="javascript:ajaxLoad('{{url('/settings/roulette1/wheelsettings')}}')">
                            @lang('messages.Roulette')
                        </a>
                    </li>
                    <li id="menuSlots">
                        <a href="javascript:ajaxLoad('{{url('/settings/slots/psconfig')}}')">
                            @lang('messages.Slots')
                        </a>
                    </li>
                    <!--<li><a href="javascript:ajaxLoad('{{url('/settings/PBS/BonusPoints2Money')}}')">PBS</a></li> -->
                    <li id="menuSystem">
                        <a href="javascript:ajaxLoad('{{url('/settings/System')}}')">
                            @lang('messages.System')
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <hr style="padding-bottom: 15px; margin: 0;">
</div>
<script src="js/settings.js"></script>