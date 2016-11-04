
<table class="table table-striped">
    <tbody>
        <tr>
            <th>PS ID</th>
            <th>Total tickets</th>
            <th>Ticket cost</th>
            <th>Amount Won</th>
            <th>Action</th>
        </tr>
        @foreach($psTicketsArchives as $psTicketsArchive)

            <tr>
                <td class="ng-binding">{{$server_ps->where('psid', $psTicketsArchive->psid)->count() ? $server_ps->where('psid', $psTicketsArchive->psid)->first()->seatid : "Missing saitid"}}</td>
                <td class="ng-binding">{{$psTicketsArchive->num_tickets }}</td>
                <td class="ng-binding"><?php echo number_format($psTicketsArchive->BingoHistory->ticket_cost / 100, 2 ); ?></td>
                <td class="ng-binding"><?php echo number_format($psTicketsArchive->BingoWins_History()->where('psid', $psTicketsArchive->psid)->sum('win_val') / 100, 2 ); ?></td>
                <td>
                    <button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-target="#bingoHistory2_modal" onclick='boxModalWindow2({{ $psTicketsArchive->bingo_seq}}, "{{$psTicketsArchive->unique_game_seq}}", {{$psTicketsArchive->psid }});' style="float: left;" tabindex="0">
                        <i class="glyphicon glyphicon-open"></i>
                        Show Tickets
                    </button>
                </td>
            </tr>

        @endforeach
    </tbody>
</table> 