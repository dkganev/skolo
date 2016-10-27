
<table class="table table-striped">
    <tbody>
        <tr>
            <th>PS ID</th>
            <th>Total tickets</th>
            <th>Ticket cost</th>
            <th>Amount Won</th>
            <th>Action</th>
        </tr>
        @foreach($bingoPurchase_Historys as $bingoPurchase_History)

            <tr>
                <td class="ng-binding">{{$server_ps->where('psid', $bingoPurchase_History->psid)->count() ? $server_ps->where('psid', $bingoPurchase_History->psid)->first()->seatid : "Missing saitid"}}</td>
                <td class="ng-binding">{{$bingoPurchase_History->ticket_count }}</td>
                <td class="ng-binding"><?php echo number_format($bingoPurchase_History->ticket_cost / 100, 2 ); ?></td>
                <td class="ng-binding"><?php echo number_format($bingoPurchase_History->BingoWins_History->where('psid', $bingoPurchase_History->psid)->sum('win_val') / 100, 2 ); ?></td>
                <td>
                    <button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-target="#bingoHistory2_modal" onclick='boxModalWindow2({{ $bingoPurchase_History->bingo_seq}}, {{$bingoPurchase_History->psid }});' style="float: left;" tabindex="0">
                        <i class="glyphicon glyphicon-open"></i>
                        Show Tickets
                    </button>
                </td>
            </tr>

        @endforeach
    </tbody>
</table> 