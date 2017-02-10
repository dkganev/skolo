<div class="divTableRow dataTableRow" id="row{{ $template_id }}idx{{ $game->idx }}" data-idx="{{ $game->idx }}" data-template-id="{{ $template_id }}">
    <div class="divTableCell">
        {{ $game->bingo_ticket_cost }}
    </div>
    <div class="divTableCell">
        {{ $game->bingo_cost_line1_fixed && $game->bingo_cost_bingo_fixed ? app('translator')->get('messages.Fixed') : app('translator')->get('messages.Standard')}}
    </div>
    <div class="divTableCell">
        {{ $game->bingo_cost_line1 }}
    </div>
    <div class="divTableCell">
        {{ $game->bingo_cost_bingo }}
    </div>
    <div class="divTableCell">
        <a class="btn btn-primary btn-xs top" onclick="toTop({{ $template_id }},{{ $game->idx }});">
            <span class="glyphicon glyphicon-eject"></span>
        </a>
        <a class="btn btn-success btn-xs up" onclick="toUp({{ $template_id }},{{ $game->idx }},1);">
            <span class="glyphicon glyphicon-arrow-up" ></span>
        </a>
        <a class="btn btn-success btn-xs down" onclick="toUp({{ $template_id }},{{ $game->idx }},0);">
            <span class="glyphicon glyphicon-arrow-down"></span>
        </a>
        <a class="btn btn-danger btn-xs remove" onclick="removeRow({{ $template_id }},{{ $game->idx }});">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
    </div>
</div>
