<div class="row">
    <div class="col-md-12 "> 
        <ul class="breadcrumb">
            <li>
                <a id="CasinoCasino" href="javascript:ajaxLoad('{{url('players/cards')}}')" data-url="{{substr(url(''),0,-5)}}">
                    @lang('messages.Cards')
                </a>
            </li>
            <li>
                <a id="CasinoEvents" href="javascript:ajaxLoad('{{url('players')}}')">
                    @lang('messages.Transactions')
                </a>
            </li>
            <li>
                <a id="CasinoEvents" href="javascript:ajaxLoad('{{url('players')}}')">
                    @lang('messages.Bonus Points')
                </a>
            </li>
            <!--<li>
                <a id="CasinoEvents" href="javascript:ajaxLoad('{{url('players')}}')">
                    Orders History
                </a>
            </li>-->
            
        </ul>
    </div>
</div>

<script src="js/players.js"></script>