<?php 
$bingoLine = 0; 
$bingoBingo = 0; 
$bingoThicketsN = 0;
$bingoInfo = 1; 
$bingoBingo1 = 0;
$bingoThickets1 = 0;
//var_dump($bingoPurchase_Historys->ticket_count);
if ($wins_history->where('psid', $datapsid)->where('win_type', 1)->count()) {
    $bingoLine = $wins_history->where('psid', $datapsid)->where('win_type', 1)->first()->ticket_count;
}
if ($wins_history->where('psid', $datapsid)->where('win_type', 2)->count()) {
    $bingoBingo1 = $wins_history->where('psid', $datapsid)->where('win_type', 2)->first()->ticket_count;
}
if ($bingoPurchase_Historys->count()) {
    //$bingoBingo1 = $wins_history->where('psid', $datapsid)->where('win_type', 2)->first()->ticket_count;
    $bingoThickets1 = $bingoPurchase_Historys->ticket_count;

}

$allThickets = $bingoLine + $bingoBingo1 + $bingoThickets1;
$allRows = ceil($allThickets / 8);
//var_dump($allThickets . "---" . $allRows)
?>
<table class="table table-striped">
    <tbody>
        @for ($n = 0; $n < $allRows; $n++)
            <tr>
                @for ($i = 0; $i < 8; $i++)
                    @if ($bingoLine != 0 && $bingoInfo == 1)
                        <td>
                            <?php 
                                $bingoLine = $bingoLine -1;
                                $bingoLineStr = $wins_history->where('psid', $datapsid)->where('win_type', 1)->first()->tickets_id ; 
                                $ticketID = unpack("L",stream_get_contents($bingoLineStr, 4, $bingoLine * 4)); 
                                $bingoTicket = unpack("C15", stream_get_contents($bingoTickets->where('idx', $ticketID[1])->first()->content, 15, 0)); //$BingoBallsArray
                            ?>
                                <table style='border: 1px solid #428bca; text-align: center; border-collapse: separate; border-spacing: 4px;'>
                                     <tbody>
                                        <tr>
                                            <th colspan="5" style='border: 1px solid #428bca; text-align: center; background-color: #428bca; color: #fff; border-collapse: collapse; '>Ticket ID: {{$ticketID[1]}}</th>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[1], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>; border-collapse: unset; border-spacing: 4px;'>{{$bingoTicket[1]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[2], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[2]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[3], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[3]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[4], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[4]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[5], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[5]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[6], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[6]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[7], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[7]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[8], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[8]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[9], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[9]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[10], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[10]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[11], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[11]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[12], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[12]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[13], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[13]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[14], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[14]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[15], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[15]}}</td>
                                        </tr>
                                     </tbody>
                                </table >
                            <?php
                                $ticketID[1] = 0;
                            ?>
                        </td>
                    @elseif ($bingoLine == 0 && $bingoInfo == 1 )
                     
                         <?php $bingoBingo = $bingoBingo1; $bingoInfo = 2; ?>
                    
                    @else
                        
                    @endif
                    @if ($bingoBingo != 0 && $bingoInfo == 2)
                        <td>
                            <?php 
                                $bingoBingo = $bingoBingo -1;
                                $bingoLineStr = $wins_history->where('psid', $datapsid)->where('win_type', 2)->first()->tickets_id ; 
                                $ticketID = unpack("L",stream_get_contents($bingoLineStr, 4, $bingoBingo * 4)); 
                                $bingoTicket = unpack("C15", stream_get_contents($bingoTickets->where('idx', $ticketID[1])->first()->content, 15, 0));
                                //echo $ticketID[1];
                             ?>
                                 <table style='border: 1px solid #428bca; text-align: center; border-collapse: separate; border-spacing: 4px;'>
                                     <tbody>
                                        <tr>
                                            <th colspan="5" style='border: 1px solid #428bca; text-align: center; background-color: #428bca; color: #fff; border-collapse: collapse; '>Ticket ID: {{$ticketID[1]}}</th>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[1], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>; border-collapse: unset; border-spacing: 4px;'>{{$bingoTicket[1]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[2], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[2]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[3], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[3]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[4], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[4]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[5], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[5]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[6], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[6]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[7], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[7]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[8], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[8]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[9], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[9]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[10], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[10]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[11], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[11]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[12], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[12]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[13], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[13]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[14], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[14]}}</td>
                                            <td style='border: 1px solid #428bca; text-align: center; background-color: <?php in_array($bingoTicket[15], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[15]}}</td>
                                        </tr>
                                     </tbody>
                                </table >
                            <?php   
                            $ticketID[1] = 0;
                            ?>
                        </td>
                    @elseif ($bingoBingo == 0 && $bingoInfo == 2)
                     
                         <?php $bingoThicketsN = $bingoThickets1; $bingoInfo = 3; ?>
                     
                    @endif
                    @if ($bingoThicketsN != 0 && $bingoInfo == 3)
                        <td>
                            <?php 
                                $bingoThicketsM = $bingoThickets1 - $bingoThicketsN;
                                $bingoThicketsN = $bingoThicketsN -1;
                                $bingoLineStr = $bingoPurchase_Historys->tickets_id ; 
                                //$bingoThicketsM = $bingoThickets1 - $bingoThicketsN;
                                $ticketID = unpack("L",stream_get_contents($bingoLineStr, 4, $bingoThicketsM * 4));
                                $bingoTicket = unpack("C15", stream_get_contents($bingoTickets->where('idx', $ticketID[1])->first()->content, 15, 0));
                             ?>
                                <table style='border: 1px solid #d9edf7; text-align: center; border-collapse: separate; border-spacing: 4px;'>
                                     <tbody>
                                        <tr>
                                            <th colspan="5" style='border: 1px solid #d9edf7; text-align: center; background-color: #d9edf7; color: #31708f; border-collapse: collapse; '>Ticket ID: {{$ticketID[1]}}</th>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[1], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>; border-collapse: unset; border-spacing: 4px;'>{{$bingoTicket[1]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[2], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[2]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[3], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[3]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[4], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[4]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[5], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[5]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[6], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[6]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[7], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[7]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[8], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[8]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[9], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[9]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[10], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[10]}}</td>
                                        </tr>
                                        <tr>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[11], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[11]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[12], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[12]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[13], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[13]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[14], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[14]}}</td>
                                            <td style='border: 1px solid #d9edf7; text-align: center; background-color: <?php in_array($bingoTicket[15], $BingoBallsArray) ? print '#e0f0ff' : print '#fff' ; ?>;'>{{$bingoTicket[15]}}</td>
                                        </tr>
                                     </tbody>
                                </table >
                            <?php
                            $ticketID[1] = 0;
                                //echo $bingoThickets;
                            ?>
                        </td>
                    @elseif ($bingoThicketsN == 0 && $bingoInfo == 3)
                     
                         <?php $bingoInfo = 4; ?>
                     
                    @endif
                    @if ( $bingoInfo == 4)
                    <td>
                    </td>
                    @endif
                @endfor
            </tr>
        @endfor
        
       
    </tbody>
</table> 