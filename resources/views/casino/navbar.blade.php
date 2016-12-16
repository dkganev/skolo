<div class="row">
    <div class="col-md-12 "> 
        <ul class="breadcrumb">
            <li>
                <a id="CasinoCasino" href="javascript:ajaxLoad('{{url('casino/casino')}}')" data-url="{{substr(url(''),0,-5)}}">
                    @lang('messages.Preview')
                </a>
            </li>
            <li>
                <a id="CasinoEvents" href="javascript:ajaxLoad('{{url('casino/events')}}')">
                    @lang('messages.events')
                </a>
            </li>
            <li><a href="javascript:ajaxLoad('{{url('casino/playlist')}}')">@lang('messages.Bingo Playlist')</a></li>
        </ul>
    </div>
</div>
<script src="/js/casinoProview.js"></script>
<!-- Socket.io -->
<script src="/js/socket.io/socket.io.js"></script>
<script src="/js/socket.io/main.js"></script>