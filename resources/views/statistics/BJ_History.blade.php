@if (array_key_exists(0,$cards))
    @foreach ($cards[0] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 75;
                $cardTop = 320;
        
            }else{
                $cardLeft = 75;
                $cardTop = 370;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
    <div class="lucky_chip ng-scope"  style="left: 5px; top: 225px; background-color: #ffffff;  position: absolute; min-width: 75px; border-radius: 10px; text-align: center;">
        Bet: {{number_format($totalBetArray[0] / 100, 2)}} <br />
        @if ( array_key_exists(0,$totalDblArray))
            x2: {{number_format($totalDblArray[0] / 100, 2)}}<br />
        @endif  
        @if ( array_key_exists(0,$totalInsuranceArray))
            Insurance: {{number_format($totalInsuranceArray[0] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(0,$totalSplitArray))
            Split: {{number_format($totalSplitArray[0] / 100, 2)}}<br />
        @endif 
        
        Win: {{number_format($totalWinArray[0] / 100, 2)}} <br />
        @if ( array_key_exists(0,$totalSurrenderArray))
            Surrender: {{number_format($totalSurrenderArray[0] / 100, 2)}}<br />
        @endif 
    </div>
@endif
@if (array_key_exists(1,$cards))
    @foreach ($cards[1] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 315;
                $cardTop = 420;
        
            }else{
                $cardLeft = 315;
                $cardTop = 470;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
     <div class="lucky_chip ng-scope"  style="left: 240px; top: 340px; background-color: #ffffff;  position: absolute; min-width: 75px; border-radius: 10px; text-align: center;">
        Bet: {{number_format($totalBetArray[1] / 100, 2)}} <br />
        @if ( array_key_exists(1,$totalDblArray))
            x2: {{number_format($totalDblArray[1] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(1,$totalInsuranceArray))
            Insurance: {{number_format($totalInsuranceArray[1] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(1,$totalSplitArray))
            Split: {{number_format($totalSplitArray[1] / 100, 2)}}<br />
        @endif 
        
        Win: {{number_format($totalWinArray[1] / 100, 2)}} <br />
         @if ( array_key_exists(1,$totalSurrenderArray))
            Surrender: {{number_format($totalSurrenderArray[1] / 100, 2)}}<br />
        @endif 
    </div>
@endif
@if (array_key_exists(2,$cards))
    @foreach ($cards[2] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 575;
                $cardTop = 450;
        
            }else{
                $cardLeft = 575;
                $cardTop = 500;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
    <div class="lucky_chip ng-scope"  style="left: 495px; top: 380px; background-color: #ffffff;  position: absolute; min-width: 75px; border-radius: 10px; text-align: center;">
        Bet: {{number_format($totalBetArray[2] / 100, 2)}} <br />
        @if ( array_key_exists(2,$totalDblArray))
            x2: {{number_format($totalDblArray[2] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(2,$totalInsuranceArray))
            Insurance: {{number_format($totalInsuranceArray[2] / 100, 2)}}<br />
        @endif 
        @if ( array_key_exists(2,$totalSplitArray))
            Split: {{number_format($totalSplitArray[2] / 100, 2)}}<br />
        @endif 
        Win: {{number_format($totalWinArray[2] / 100, 2)}} <br />
        @if ( array_key_exists(2,$totalSurrenderArray))
            Surrender: {{number_format($totalSurrenderArray[2] / 100, 2)}}<br />
        @endif 
        
    </div>

@endif
@if (array_key_exists(3,$cards))
    @foreach ($cards[3] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 850;
                $cardTop = 420;
        
            }else{
                $cardLeft = 850;
                $cardTop = 470;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
    <div class="lucky_chip ng-scope"  style="left: 775px; top: 340px; background-color: #ffffff;  position: absolute; min-width: 75px; border-radius: 10px; text-align: center;">
        Bet: {{number_format($totalBetArray[3] / 100, 2)}} <br />
        @if ( array_key_exists(3,$totalDblArray))
            x2: {{number_format($totalDblArray[3] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(3,$totalInsuranceArray))
            Insurance: {{number_format($totalInsuranceArray[3] / 100, 2)}}<br />
        @endif 
        @if ( array_key_exists(3,$totalSplitArray))
            Split: {{number_format($totalSplitArray[3] / 100, 2)}}<br />
        @endif 
        Win: {{number_format($totalWinArray[3] / 100, 2)}} <br />
        @if ( array_key_exists(3,$totalSurrenderArray))
            Surrender: {{number_format($totalSurrenderArray[3] / 100, 2)}}<br />
        @endif 
    </div>
@endif
@if (array_key_exists(4,$cards))
    @foreach ($cards[4] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 1070;
                $cardTop = 320;
        
            }else{
                $cardLeft = 1070;
                $cardTop = 370;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
    <div class="lucky_chip ng-scope"  style="left: 995px; top: 225px; background-color: #ffffff;  position: absolute; min-width: 75px; border-radius: 10px; text-align: center;">
        Bet: {{ number_format($totalBetArray[4] / 100, 2)}} <br />
        @if ( array_key_exists(4,$totalDblArray))
            x2: {{number_format($totalDblArray[4] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(4,$totalInsuranceArray))
            Insurance: {{number_format($totalInsuranceArray[4] / 100, 2)}}<br />
        @endif
        @if ( array_key_exists(4,$totalSplitArray))
            Split: {{number_format($totalSplitArray[4] / 100, 2)}}<br />
        @endif 
        
        Win: {{ number_format($totalWinArray[4] / 100, 2)}} <br />
        @if ( array_key_exists(4,$totalSurrenderArray))
            Surrender: {{number_format($totalSurrenderArray[4] / 100, 2)}}<br />
        @endif 
    </div>
@endif
@if (array_key_exists(5,$cards))
    @foreach ($cards[5] as $keyP => $cardP)
        <?php 
            if ($keyP == 0){
                $cardLeft = 500;
                $cardTop = 75;
        
            }else{
                $cardLeft = 500;
                $cardLeft = 125;
            }
        ?>
        @foreach ($cardP as $key => $card)
            <div class="lucky_chip ng-scope"  style="left: {{$cardLeft + $key * 20 }}px; top: {{$cardTop - $key * 5 }}px; background-image: url('images/BJ/small/{{ $card['cardSuit']}}_{{ $card['cardRank']}}.png.png'); background-size: 75px; height: 108px; position: absolute;width: 75px;"></div>
                        
        @endforeach
    @endforeach
@endif