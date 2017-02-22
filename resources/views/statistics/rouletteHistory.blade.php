@foreach ($positions as $key => $position)
    <div class="lucky_chip ng-scope"  style="left: {{$rlt_chip_positions[$key]['left']}}px; top: {{$rlt_chip_positions[$key]['top']}}px; background-image: url('images/roulette/lcc_mg_chips_small.png'); height: 63px; position: absolute;width: 63px;">
        <div class="lucky_value ng-binding" style="color: #fff; font-weight: bold; padding-top: 22px; text-align: center">{{number_format($position * $denomination / 100 ,2)}}</div>
    </div>
@endforeach