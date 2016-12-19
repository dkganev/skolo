<div class="row">
    <div class="col-md-12 "> 
        <div style="padding-top:6px; margin-top: 0px;">
            <ul class="breadcrumb">
                <li><a  id="MachineStatistics" data-url="{{substr(url(''),0,-5)}}" href="javascript:ajaxLoad('{{url('statistics/terminals')}}')" >@lang('messages.Machine Statistics')  </a> </li>

                @hasanyrole(['Casino Admin', 'Owner', 'Super User'])
                <li><a href="javascript:ajaxLoad('{{url('statistics/games')}}')">@lang('messages.Game Statistics')</a></li>

                <li><a href="javascript:ajaxLoad('{{url('statistics/history')}}')">@lang('messages.Game History')</a></li>
                @endhasanyrole

                <li><a href="javascript:ajaxLoad('{{url('/statistics/game-machine-blackjack')}}')">@lang('messages.Machine Game Statistics')</a></li>

                <li><a href="javascript:ajaxLoad('{{url('/statistics/user-logs')}}')">@lang('messages.User Logs')</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="js/statisticsHistory.js"></script>
<script src="/js/socket.io/socket.io.js"></script>
<script src="/js/socket.io/statisticTerminals.js"></script>