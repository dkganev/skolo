<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Accounting\PsCounters;
use App\Models\Accounting\Casinos;
use App\Models\Accounting\Games;
use App\Models\Bingo\BingoHistory;
use App\Models\Bingo\BingoWins_History;
use App\Models\Bingo\BingoPurchase_History;
use App\Models\Bingo\BingoBall_History;
use App\Models\Bingo\Tickets;
use App\Models\Bingo\psTicketsArchive;
use App\Models\Bingo\psTickets;
use App\Models\Accounting\ServerPs;
use App\Models\Roulette\GameHistory;
use App\Models\Blackjack\BlackjackGameHistory;
use Smiarowski\Postgres\Model\Traits\PostgresArray;
use Excel;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('statistics.index');
    }

    public function terminals_statistics()
    {
        $counters = PsCounters::orderBy('psid', 'asc')->get();

        $totalIn  = 0;
        $totalOut = 0;
        $totalBet = 0;
        $totalWin = 0;
        $totalCredit = 0;

        foreach($counters as $counter) {
            $totalIn += $counter->totalIn();
            $totalOut += $counter->totalOut();
            $totalBet += $counter->totalBet();
            $totalWin += $counter->totalWin();
            $totalCredit += $counter->totalCredit();
        }

        $totals = [
            'totalIn' => $totalIn,
            'totalOut' => $totalOut, 
            'totalBet' => $totalBet, 
            'totalWin' => $totalWin, 
            'totalCredit' => $totalCredit
        ];

        return view('statistics.terminals', ['counters' => $counters , 'totals' => $totals]);
    }

    public function export2excelTerminalsStatistics()
    {
        $counters = PsCounters::orderBy('psid', 'asc')->get();

        $totalIn  = 0;
        $totalOut = 0;
        $totalBet = 0;
        $totalWin = 0;
        $totalCredit = 0;

        foreach($counters as $counter)
        {
            $totalIn += $counter->totalIn();
            $totalOut += $counter->totalOut();
            $totalBet += $counter->totalBet();
            $totalWin += $counter->totalWin();
            $totalCredit += $counter->totalCredit();
        }

        $totals = [
            'totalIn' => $totalIn,
            'totalOut' => $totalOut, 
            'totalBet' => $totalBet, 
            'totalWin' => $totalWin, 
            'totalCredit' => $totalCredit
        ];
        $export = array();
        foreach ($counters as $key => $counter) {
            $export[$key] = [
                'PS ID' => $counter->psid, 
                'Dallas ID' => $counter->server_ps->dallasid,
                'Total In' =>  $counter->totalIn(), 
                'Total Out' => $counter->totalOut(),
                'Total Bet' => $counter->totalBet(),
                'Total Win' => $counter->totalWin(),
                'Total Credit' => $counter->totalCredit()
            ];
        }
            $export[$key + 1] = array(
                'PS ID' => "", 
                'Dallas ID' => "Total",
                'Total In' =>  $totals['totalIn'], 
                'Total Out' => $totals['totalOut'],
                'Total Bet' => $totals['totalBet'],
                'Total Win' => $totals['totalWin'],
                'Total Credit' => $totals['totalCredit']
            );
        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Terminals Data', function($excel) use($export){
            $excel->sheet('Terminals', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');

        //return view('statistics.terminals', ['counters' => $counters , 'totals' => $totals]);
    }

    public function games_statistics()
    {
        $games = Games::orderBy('gameid', 'asc')->get();

        $games_bet = Games::all()->sum('counters_bet');
        $games_win = Games::all()->sum('counters_win');
        $games_jp = Games::all()->sum('counters_jp');
        $games_bet = Games::all()->sum('counters_bet');
        $games_games = Games::all()->sum('counters_games');
        $games_jp_hits = Games::all()->sum('counter_jp_hits');

        return view('statistics.games', compact(
                    'games', 'games_bet', 'games_win', 'games_jp', 'games_games',  'games_jp_hits'
                ));
    }

    public function export2excelGamesStatistics()
    {
        $games = Games::orderBy('gameid', 'asc')->get();
        $export = array();
        foreach ($games as $key => $game) {
            $export[$key] = array(
                'ID' => $game->gameid, 
                'Description' => $game->description,
                'BET' =>  $game->counters_bet, 
                'WIN' => $game->counters_win,
                'JP' => $game->counters_jp,
                'GAMES' => $game->counters_games,
                'JP HITS' => $game->counter_jp_hits
            );
            
        }
        
        Excel::create('Games Data', function($excel) use($export){
            $excel->sheet('Games', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');

        //return view('statistics.games', [ 'games' => $games]);
    }

    // start bingo
    public function history_statistics(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'tstamp';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        if ($request['tableTh1'] == NULL) { $page['tableTh1'] = 1; } else { $page['tableTh1'] = $request['tableTh1']; }
        if ($request['tableTh2'] == NULL) { $page['tableTh2'] = 1; } else { $page['tableTh2'] = $request['tableTh2']; }
        if ($request['tableTh3'] == NULL) { $page['tableTh3'] = 1; } else { $page['tableTh3'] = $request['tableTh3']; }
        if ($request['tableTh4'] == NULL) { $page['tableTh4'] = 1; } else { $page['tableTh4'] = $request['tableTh4']; }
        if ($request['tableTh5'] == NULL) { $page['tableTh5'] = 1; } else { $page['tableTh5'] = $request['tableTh5']; }
        if ($request['tableLine'] == NULL) { $page['tableLine'] = 1; } else { $page['tableLine'] = $request['tableLine']; }
        if ($request['tableBingo'] == NULL) { $page['tableBingo'] = 1; } else { $page['tableBingo'] = $request['tableBingo']; }
        if ($request['tableMyBonus'] == NULL) { $page['tableMyBonus'] = 1; } else { $page['tableMyBonus'] = $request['tableMyBonus']; }
        if ($request['tableBonusLine'] == NULL) { $page['tableBonusLine'] = 1; } else { $page['tableBonusLine'] = $request['tableBonusLine']; }
        if ($request['tableBonusBingo'] == NULL) { $page['tableBonusBingo'] = 1; } else { $page['tableBonusBingo'] = $request['tableBonusBingo']; }
        if ($request['tableJackpotLine'] == NULL) { $page['tableJackpotLine'] = 1; } else { $page['tableJackpotLine'] = $request['tableJackpotLine']; }
        if ($request['tableJackpotBingo'] == NULL) { $page['tableJackpotBingo'] = 1; } else { $page['tableJackpotBingo'] = $request['tableJackpotBingo']; }
    
 
        //$SortQuery = array();
        $wherQuery = "";
        if ($request['FromGameTs']){
            //array_push($SortQuery,['tstamp', '>=', $request['FromGameTs']]);
            $wherQuery .= " and tstamp >= '" . $request['FromGameTs'] . "' ";
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
            //array_push($SortQuery,['tstamp', '<=', $request['ToGameTs']]);
            $wherQuery .= " and tstamp <= '" . $request['ToGameTs'] . "' ";
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){  //'like', '%'.$term.'%'  //'=', $request['GameSort'] 
            //array_push($SortQuery,['bingo_seq', '=', $request['GameSort']]);
            $wherQuery .= " and bingo_seq = '" . $request['GameSort'] . "' ";
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        if ($request['FromTicketCost']){
            //array_push($SortQuery,['ticket_cost','>=', $request['FromTicketCost'] * 100 ]);
            $wherQuery .= " and ticket_cost >= '" . $request['FromTicketCost'] * 100  . "' ";
            $page['FromTicketCost'] = $request['FromTicketCost'];
        }else{
            $page['FromTicketCost'] = "";
        }
        if ($request['ToTicketCost']){
            //array_push($SortQuery,['ticket_cost','<=', $request['ToTicketCost'] * 100 ]);
            $wherQuery .= " and ticket_cost <= '" . $request['ToTicketCost'] * 100  . "' ";
            $page['ToTicketCost'] = $request['ToTicketCost'];
        }else{
            $page['ToTicketCost'] = "";
        } 
        if ($request['FromPlayers']){ 
            //array_push($SortQuery,['players','>=', $request['FromPlayers'] ]);
            $wherQuery .= " and players >= '" . $request['FromPlayers'] . "' ";
            $page['FromPlayers'] = $request['FromPlayers'];
        }else{
            $page['FromPlayers'] = "";
        }
        if ($request['ToPlayers']){ 
            //array_push($SortQuery,['players','<=', $request['ToPlayers'] ]);
            $wherQuery .= " and players <= '" . $request['ToPlayers'] . "' ";
            $page['ToPlayers'] = $request['ToPlayers'];
        }else{
            $page['ToPlayers'] = "";
        }
        if ($request['FromTickets']){ 
            //array_push($SortQuery,['tickets','>=', $request['FromTickets'] ]);
            $wherQuery .= " and tickets >= '" . $request['FromTickets'] . "' ";
            $page['FromTickets'] = $request['FromTickets'];
        }else{
            $page['FromTickets'] = "";
        }
        if ($request['ToTickets']){ 
            //array_push($SortQuery,['tickets','<=', $request['ToTickets'] ]);
            $wherQuery .= " and tickets <= '" . $request['ToTickets'] . "' ";
            $page['ToTickets'] = $request['ToTickets'];
        }else{
            $page['ToTickets'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromLine']){ 
            //array_push($SortQuery,['line','>=', $request['FromLine'] ]);
            $wherQuery .= " and line >= '" . $request['FromLine'] . "' ";
            $page['FromLine'] = $request['FromLine'];
        }else{
            $page['FromLine'] = "";
        }
        if ($request['ToLine']){ 
            //array_push($SortQuery,['line','<=', $request['ToLine'] ]);
            $wherQuery .= " and line <= '" . $request['ToLine'] . "' ";
            $page['ToLine'] = $request['ToLine'];
        }else{
            $page['ToLine'] = "";
        }
        if ($request['FromBingo']){ 
            //array_push($SortQuery,['bingo','>=', $request['FromBingo'] ]);
            $wherQuery .= " and bingo >= '" . $request['FromBingo'] . "' ";
            $page['FromBingo'] = $request['FromBingo'];
        }else{
            $page['FromBingo'] = "";
        }
        if ($request['ToBingo']){ 
            //array_push($SortQuery,['bingo','<=', $request['ToBingo'] ]);
            $wherQuery .= " and bingo <= '" . $request['ToBingo'] . "' ";
            $page['ToBingo'] = $request['ToBingo'];
        }else{
            $page['ToBingo'] = "";
        }
        if ($request['FromMybonus']){ 
            //array_push($SortQuery,['mybonus','>=', $request['FromMybonus'] ]);
            $wherQuery .= " and mybonus >= '" . $request['FromMybonus'] . "' ";
            $page['FromMybonus'] = $request['FromMybonus'];
        }else{
            $page['FromMybonus'] = "";
        }
        if ($request['ToMybonus']){ 
            //array_push($SortQuery,['mybonus','<=', $request['ToMybonus'] ]);
            $wherQuery .= " and mybonus <= '" . $request['ToMybonus'] . "' ";
            $page['ToMybonus'] = $request['ToMybonus'];
        }else{
            $page['ToMybonus'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromBonusLine']){ 
            //array_push($SortQuery,['bonus_line','>=', $request['FromBonusLine'] ]);
            $wherQuery .= " and bonus_line >= '" . $request['FromBonusLine'] . "' ";
            $page['FromBonusLine'] = $request['FromBonusLine'];
        }else{
            $page['FromBonusLine'] = "";
        }
        if ($request['ToBonusLine']){ 
            //array_push($SortQuery,['bonus_line','<=', $request['ToBonusLine'] ]);
            $wherQuery .= " and bonus_line <= '" . $request['ToBonusLine'] . "' ";
            $page['ToBonusLine'] = $request['ToBonusLine'];
        }else{
            $page['ToBonusLine'] = "";
        }
        if ($request['FromBonusBingo']){ 
            //array_push($SortQuery,['bonus_bingo','>=', $request['FromBonusBingo'] ]);
            $wherQuery .= " and bonus_bingo >= '" . $request['FromBonusBingo'] . "' ";
            $page['FromBonusBingo'] = $request['FromBonusBingo'];
        }else{
            $page['FromBonusBingo'] = "";
        }
        if ($request['ToBonusBingo']){ 
            //array_push($SortQuery,['bonus_bingo','<=', $request['ToBonusBingo'] ]);
            $wherQuery .= " and bonus_bingo <= '" . $request['ToBonusBingo'] . "' ";
            $page['ToBonusBingo'] = $request['ToBonusBingo'];
        }else{
            $page['ToBonusBingo'] = "";
        }
        if ($request['FromJackpotLine']){ 
            //array_push($SortQuery,['jackpot_line','>=', $request['FromJackpotLine'] ]);
            $wherQuery .= " and jackpot_line >= '" . $request['FromJackpotLine'] . "' ";
            $page['FromJackpotLine'] = $request['FromJackpotLine'];
        }else{
            $page['FromJackpotLine'] = "";
        }
        if ($request['ToJackpotLine']){ 
            //array_push($SortQuery,['jackpot_line','<=', $request['ToJackpotLine'] ]);
            $wherQuery .= " and jackpot_line <= '" . $request['ToJackpotLine'] . "' ";
            $page['ToJackpotLine'] = $request['ToJackpotLine'];
        }else{
            $page['ToJackpotLine'] = "";
        }
        if ($request['FromJackpotBingo']){ 
            //array_push($SortQuery,['jackpot_bingo','>=', $request['FromJackpotBingo'] ]);
            $wherQuery .= " and jackpot_bingo >= '" . $request['FromJackpotBingo'] . "' ";
            $page['FromJackpotBingo'] = $request['FromJackpotBingo'];
        }else{
            $page['FromJackpotBingo'] = "";
        }
        if ($request['ToJackpotBingo']){ 
            //array_push($SortQuery,['jackpot_bingo','<=', $request['ToJackpotBingo'] ]);
            $wherQuery .= " and jackpot_bingo <= '" . $request['ToJackpotBingo'] . "' ";
            $page['ToJackpotBingo'] = $request['ToJackpotBingo'];
        }else{
            $page['ToJackpotBingo'] = "";
        }
        if ($request['FromLineVal']){ 
            //array_push($SortQuery,['line_val','>=', $request['FromLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromLineVal'] * 100  . "' ";
            $page['FromLineVal'] = $request['FromLineVal'];
        }else{
            $page['FromLineVal'] = "";
        }
        if ($request['ToLineVal']){ 
            //array_push($SortQuery,['line_val','<=', $request['ToLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToLineVal'] * 100  . "' ";
            $page['ToLineVal'] = $request['ToLineVal'];
        }else{
            $page['ToLineVal'] = "";
        }
        if ($request['FromBingoVal']){ 
            //array_push($SortQuery,['bingo_val','>=', $request['FromBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBingoVal'] * 100  . "' ";
            $page['FromBingoVal'] = $request['FromBingoVal'];
        }else{
            $page['FromBingoVal'] = "";
        }
        if ($request['ToBingoVal']){ 
            //array_push($SortQuery,['bingo_val','<=', $request['ToBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBingoVal'] * 100  . "' ";
            $page['ToBingoVal'] = $request['ToBingoVal'];
        }else{
            $page['ToBingoVal'] = "";
        }
        if ($request['FromMybonusVal']){ 
            //array_push($SortQuery,['mybonus_val','>=', $request['FromMybonus'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromMybonusVal'] * 100  . "' ";
            $page['FromMybonusVal'] = $request['FromMybonusVal'];
        }else{
            $page['FromMybonusVal'] = "";
        }
        if ($request['ToMybonusVal']){ 
            //array_push($SortQuery,['mybonus_val','<=', $request['ToMybonus'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToMybonusVal'] * 100  . "' ";
            $page['ToMybonusVal'] = $request['ToMybonusVal'];
        }else{
            $page['ToMybonusVal'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromBonusLineVal']){ 
            //array_push($SortQuery,['bonus_line_val','>=', $request['FromBonusLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBonusLineVal'] * 100  . "' ";
            $page['FromBonusLineVal'] = $request['FromBonusLineVal'];
        }else{
            $page['FromBonusLineVal'] = "";
        }
        if ($request['ToBonusLineVal']){ 
            //array_push($SortQuery,['bonus_line_val','<=', $request['ToBonusLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBonusLineVal'] * 100  . "' ";
            $page['ToBonusLineVal'] = $request['ToBonusLineVal'];
        }else{
            $page['ToBonusLineVal'] = "";
        }
        if ($request['FromBonusBingoVal']){ 
            //array_push($SortQuery,['bonus_bingo_val','>=', $request['FromBonusBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBonusBingoVal'] * 100  . "' ";
            $page['FromBonusBingoVal'] = $request['FromBonusBingoVal'];
        }else{
            $page['FromBonusBingoVal'] = "";
        }
        if ($request['ToBonusBingoVal']){ 
            //array_push($SortQuery,['bonus_bingo_val','<=', $request['ToBonusBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBonusBingoVal'] * 100  . "' ";
            $page['ToBonusBingoVal'] = $request['ToBonusBingoVal'];
        }else{
            $page['ToBonusBingoVal'] = "";
        }
        if ($request['FromJackpotLineVal']){ 
            //array_push($SortQuery,['jackpot_line_val','>=', $request['FromJackpotLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromJackpotLineVal'] * 100  . "' ";
            $page['FromJackpotLineVal'] = $request['FromJackpotLineVal'];
        }else{
            $page['FromJackpotLineVal'] = "";
        }
        if ($request['ToJackpotLineVal']){ 
            //array_push($SortQuery,['jackpot_line_val','<=', $request['ToJackpotLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToJackpotLineVal'] * 100  . "' ";
            $page['ToJackpotLineVal'] = $request['ToJackpotLineVal'];
        }else{
            $page['ToJackpotLineVal'] = "";
        }
        if ($request['FromJackpotBingoVal']){ 
            //array_push($SortQuery,['jackpot_bingo_val','>=', $request['FromJackpotBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromJackpotBingoVal'] * 100 ."' ";
            $page['FromJackpotBingoVal'] = $request['FromJackpotBingoVal'] ;
        }else{
            $page['FromJackpotBingoVal'] = "";
        }
        if ($request['ToJackpotBingoVal']){ 
            //array_push($SortQuery,['jackpot_bingo_val','<=', $request['ToJackpotBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToJackpotBingoVal'] * 100 . "' ";
            $page['ToJackpotBingoVal'] = $request['ToJackpotBingoVal'];
        }else{
            $page['ToJackpotBingoVal'] = "";
        }
        
        $historyCount = DB::connection('pgsql3')->select('SELECT count(s.tstamp) FROM history as s WHERE 1 = 1'. $wherQuery . ' ');
        foreach ($historyCount as $countVal){
            $countVal1 = $countVal->count ;
        }
        if ($historyCount){
            if ($request['page']) {
                $page['current'] = $request['page'];
        
            } else {
                $page['current'] = 1;
        
            }
                $lastPage = $countVal1 / $page['rowsPerPage'] ;
                //var_dump($countVal1);
                //$lastPage = 1 ;
                $page['last'] = ceil($lastPage);
                $page['StartAt'] = $page['rowsPerPage'] * ($page['current'] - 1);
        }else{
             $page['current'] = 1;
             $page['last'] = 1;
             $page['StartAt'] = 0;
        }
        
        $historyClas = new  BingoHistory();
        //$testHis = $historyClas->where('unique_game_seq', '1476367263723 36364')->first();
        //$testHis = BingoWins_History::where('bingo_seq', 25298)->sum('win_val') ;
        //var_dump($testHis);
        //$historys = $historyClas->join('wins_history', 'history.unique_game_seq', '=','wins_history.unique_game_seq')->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //$historys = $historyClas->select('history.*', "BingoWins_History::where('bingo_seq', 25298)->sum('win_val') as testHis"  )->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'")
        //$historys = $historyClas->select( DB::raw("history.ps as testVal, history.*") )->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        $historys = DB::connection('pgsql3')->select(' 
                SELECT
                    s.unique_game_seq, 
                    s.tstamp, 
                    s.bingo_seq, 
                    s.ticket_cost, 
                    s.players, 
                    s.tickets,                        
                    s.line, 
                    s.bingo, 
                    s.mybonus, 
                    s.bonus_line, 
                    s.bonus_bingo, 
                    s.jackpot_line, 
                    s.jackpot_bingo, 
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) as line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) as mybonus_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bonus_line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bonus_bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) as jackpot_line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) as jackpot_bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 8 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 8 GROUP BY w2.unique_game_seq) ELSE 0 END ) as cancel_val
                        
                FROM history as s
                WHERE 1 = 1'. $wherQuery . '
                ORDER BY '. $page['OrderQuery'].' '.$page['OrderDesc'].' 
                LIMIT '.$page['rowsPerPage'].' OFFSET '. $page['StartAt'] . '    
                ');
                //$historys->currentPage() = 1;
                //$historys->lastPage() = 1;
        
        //var_dump($historys);
        //$historys = $historyClas->select('history.*')->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        //$historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        return view('statistics.history', ['historys' => $historys, 'page' => $page ]); 
    }
    
    public function ajax_statBingoHistory(Request $request)
    {
        $databoxID = $request['boxID'];
        $dataRowUnique = $request['rowUnique']; 
        $psTicketsArchives = psTicketsArchive::where('unique_game_seq', $dataRowUnique)->orderBy('num_tickets', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        //var_dump($psTicketsArchives);
        $testPage = view('statistics.bingoPurchase_History', ['psTicketsArchives' => $psTicketsArchives, 'server_ps' => $server_ps])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "databoxID" => $databoxID,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_statBingoHistoryTickets(Request $request)
    {
        $databingo_seq = $request['bingo_seq'];
        $dataUnique_game_seq = $request['unique_game_seq'];
        $datapsid = $request['psid'];
        $server_ps_seatid =$datapsid; // $server_ps_seatid = ServerPs::where('psid', $datapsid)->count() ? ServerPs::where('psid', $datapsid)->first()->seatid : "Missing saitid (PSID is $datapsid )";
        $wins_history = BingoWins_History::where('unique_game_seq', $dataUnique_game_seq)->get();
        $BingoBalls = BingoBall_History::where('unique_game_seq', $dataUnique_game_seq)->first();
        $psTicketsArchive = psTicketsArchive::where('unique_game_seq', $dataUnique_game_seq)->where('psid', $datapsid)->first();
        $bingoCount = $psTicketsArchive->ticket_count - 1 ; 
        $bingoStr = $psTicketsArchive->tickets_id ; 
        $psTicketsArchiveHTML = $psTicketsArchive->mybonus_b1 . ", " . $psTicketsArchive->mybonus_b2 . ", " . $psTicketsArchive->mybonus_b3;
        $BingoBallsHTML = "";
        $BingoBallsArray = array();
           for ($i = 1; $i <= $BingoBalls->ball_cnt; $i++) {
               $curBal = "b" . $i;
               $BingoBallsHTML .= $BingoBalls->$curBal . ", ";
               $BingoBallsArray[$i] = $BingoBalls->$curBal;
               
           }
        //$testPage = view('statistics.bingoTickets_History', ['bingoPurchase_Historys' => $bingoPurchase_History, 'wins_history' => $wins_history, 'datapsid' => $datapsid, 'bingoTickets' => $bingoTickets, 'BingoBallsArray' => $BingoBallsArray])->render();
        $testPage = view('statistics.bingoTickets_History', ['psTicketsArchive' => $psTicketsArchive, 'wins_history' => $wins_history, 'datapsid' => $datapsid, 'BingoBallsArray' => $BingoBallsArray])->render();
        $dataArray1 = array(
            "success" => "success",
            "server_ps_seatid" => $server_ps_seatid,
            "BingoBallsHTML" => $BingoBallsHTML,
            "psTicketsArchiveHTML" => $psTicketsArchiveHTML,
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function export2excelBingo(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'tstamp';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        if ($request['tableTh1'] == NULL) { $page['tableTh1'] = 1; } else { $page['tableTh1'] = $request['tableTh1']; }
        if ($request['tableTh2'] == NULL) { $page['tableTh2'] = 1; } else { $page['tableTh2'] = $request['tableTh2']; }
        if ($request['tableTh3'] == NULL) { $page['tableTh3'] = 1; } else { $page['tableTh3'] = $request['tableTh3']; }
        if ($request['tableTh4'] == NULL) { $page['tableTh4'] = 1; } else { $page['tableTh4'] = $request['tableTh4']; }
        if ($request['tableTh5'] == NULL) { $page['tableTh5'] = 1; } else { $page['tableTh5'] = $request['tableTh5']; }
        if ($request['tableLine'] == NULL) { $page['tableLine'] = 1; } else { $page['tableLine'] = $request['tableLine']; }
        if ($request['tableBingo'] == NULL) { $page['tableBingo'] = 1; } else { $page['tableBingo'] = $request['tableBingo']; }
        if ($request['tableMyBonus'] == NULL) { $page['tableMyBonus'] = 1; } else { $page['tableMyBonus'] = $request['tableMyBonus']; }
        if ($request['tableBonusLine'] == NULL) { $page['tableBonusLine'] = 1; } else { $page['tableBonusLine'] = $request['tableBonusLine']; }
        if ($request['tableBonusBingo'] == NULL) { $page['tableBonusBingo'] = 1; } else { $page['tableBonusBingo'] = $request['tableBonusBingo']; }
        if ($request['tableJackpotLine'] == NULL) { $page['tableJackpotLine'] = 1; } else { $page['tableJackpotLine'] = $request['tableJackpotLine']; }
        if ($request['tableJackpotBingo'] == NULL) { $page['tableJackpotBingo'] = 1; } else { $page['tableJackpotBingo'] = $request['tableJackpotBingo']; }
    
 
        //$SortQuery = array();
        $wherQuery = "";
        if ($request['FromGameTs']){
            //array_push($SortQuery,['tstamp', '>=', $request['FromGameTs']]);
            $wherQuery .= " and tstamp >= '" . $request['FromGameTs'] . "' ";
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
            //array_push($SortQuery,['tstamp', '<=', $request['ToGameTs']]);
            $wherQuery .= " and tstamp <= '" . $request['ToGameTs'] . "' ";
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){  //'like', '%'.$term.'%'  //'=', $request['GameSort'] 
            //array_push($SortQuery,['bingo_seq', '=', $request['GameSort']]);
            $wherQuery .= " and bingo_seq = '" . $request['GameSort'] . "' ";
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        if ($request['FromTicketCost']){
            //array_push($SortQuery,['ticket_cost','>=', $request['FromTicketCost'] * 100 ]);
            $wherQuery .= " and ticket_cost >= '" . $request['FromTicketCost'] . "' ";
            $page['FromTicketCost'] = $request['FromTicketCost'];
        }else{
            $page['FromTicketCost'] = "";
        }
        if ($request['ToTicketCost']){
            //array_push($SortQuery,['ticket_cost','<=', $request['ToTicketCost'] * 100 ]);
            $wherQuery .= " and ticket_cost <= '" . $request['ToTicketCost'] . "' ";
            $page['ToTicketCost'] = $request['ToTicketCost'];
        }else{
            $page['ToTicketCost'] = "";
        } 
        if ($request['FromPlayers']){ 
            //array_push($SortQuery,['players','>=', $request['FromPlayers'] ]);
            $wherQuery .= " and players >= '" . $request['FromPlayers'] . "' ";
            $page['FromPlayers'] = $request['FromPlayers'];
        }else{
            $page['FromPlayers'] = "";
        }
        if ($request['ToPlayers']){ 
            //array_push($SortQuery,['players','<=', $request['ToPlayers'] ]);
            $wherQuery .= " and players <= '" . $request['ToPlayers'] . "' ";
            $page['ToPlayers'] = $request['ToPlayers'];
        }else{
            $page['ToPlayers'] = "";
        }
        if ($request['FromTickets']){ 
            //array_push($SortQuery,['tickets','>=', $request['FromTickets'] ]);
            $wherQuery .= " and tickets >= '" . $request['FromTickets'] . "' ";
            $page['FromTickets'] = $request['FromTickets'];
        }else{
            $page['FromTickets'] = "";
        }
        if ($request['ToTickets']){ 
            //array_push($SortQuery,['tickets','<=', $request['ToTickets'] ]);
            $wherQuery .= " and tickets <= '" . $request['ToTickets'] . "' ";
            $page['ToTickets'] = $request['ToTickets'];
        }else{
            $page['ToTickets'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromLine']){ 
            //array_push($SortQuery,['line','>=', $request['FromLine'] ]);
            $wherQuery .= " and line >= '" . $request['FromLine'] . "' ";
            $page['FromLine'] = $request['FromLine'];
        }else{
            $page['FromLine'] = "";
        }
        if ($request['ToLine']){ 
            //array_push($SortQuery,['line','<=', $request['ToLine'] ]);
            $wherQuery .= " and line <= '" . $request['ToLine'] . "' ";
            $page['ToLine'] = $request['ToLine'];
        }else{
            $page['ToLine'] = "";
        }
        if ($request['FromBingo']){ 
            //array_push($SortQuery,['bingo','>=', $request['FromBingo'] ]);
            $wherQuery .= " and bingo >= '" . $request['FromBingo'] . "' ";
            $page['FromBingo'] = $request['FromBingo'];
        }else{
            $page['FromBingo'] = "";
        }
        if ($request['ToBingo']){ 
            //array_push($SortQuery,['bingo','<=', $request['ToBingo'] ]);
            $wherQuery .= " and bingo <= '" . $request['ToBingo'] . "' ";
            $page['ToBingo'] = $request['ToBingo'];
        }else{
            $page['ToBingo'] = "";
        }
        if ($request['FromMybonus']){ 
            //array_push($SortQuery,['mybonus','>=', $request['FromMybonus'] ]);
            $wherQuery .= " and mybonus >= '" . $request['FromMybonus'] . "' ";
            $page['FromMybonus'] = $request['FromMybonus'];
        }else{
            $page['FromMybonus'] = "";
        }
        if ($request['ToMybonus']){ 
            //array_push($SortQuery,['mybonus','<=', $request['ToMybonus'] ]);
            $wherQuery .= " and mybonus <= '" . $request['ToMybonus'] . "' ";
            $page['ToMybonus'] = $request['ToMybonus'];
        }else{
            $page['ToMybonus'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromBonusLine']){ 
            //array_push($SortQuery,['bonus_line','>=', $request['FromBonusLine'] ]);
            $wherQuery .= " and bonus_line >= '" . $request['FromBonusLine'] . "' ";
            $page['FromBonusLine'] = $request['FromBonusLine'];
        }else{
            $page['FromBonusLine'] = "";
        }
        if ($request['ToBonusLine']){ 
            //array_push($SortQuery,['bonus_line','<=', $request['ToBonusLine'] ]);
            $wherQuery .= " and bonus_line <= '" . $request['ToBonusLine'] . "' ";
            $page['ToBonusLine'] = $request['ToBonusLine'];
        }else{
            $page['ToBonusLine'] = "";
        }
        if ($request['FromBonusBingo']){ 
            //array_push($SortQuery,['bonus_bingo','>=', $request['FromBonusBingo'] ]);
            $wherQuery .= " and bonus_bingo >= '" . $request['FromBonusBingo'] . "' ";
            $page['FromBonusBingo'] = $request['FromBonusBingo'];
        }else{
            $page['FromBonusBingo'] = "";
        }
        if ($request['ToBonusBingo']){ 
            //array_push($SortQuery,['bonus_bingo','<=', $request['ToBonusBingo'] ]);
            $wherQuery .= " and bonus_bingo <= '" . $request['ToBonusBingo'] . "' ";
            $page['ToBonusBingo'] = $request['ToBonusBingo'];
        }else{
            $page['ToBonusBingo'] = "";
        }
        if ($request['FromJackpotLine']){ 
            //array_push($SortQuery,['jackpot_line','>=', $request['FromJackpotLine'] ]);
            $wherQuery .= " and jackpot_line >= '" . $request['FromJackpotLine'] . "' ";
            $page['FromJackpotLine'] = $request['FromJackpotLine'];
        }else{
            $page['FromJackpotLine'] = "";
        }
        if ($request['ToJackpotLine']){ 
            //array_push($SortQuery,['jackpot_line','<=', $request['ToJackpotLine'] ]);
            $wherQuery .= " and jackpot_line <= '" . $request['ToJackpotLine'] . "' ";
            $page['ToJackpotLine'] = $request['ToJackpotLine'];
        }else{
            $page['ToJackpotLine'] = "";
        }
        if ($request['FromJackpotBingo']){ 
            //array_push($SortQuery,['jackpot_bingo','>=', $request['FromJackpotBingo'] ]);
            $wherQuery .= " and jackpot_bingo >= '" . $request['FromJackpotBingo'] . "' ";
            $page['FromJackpotBingo'] = $request['FromJackpotBingo'];
        }else{
            $page['FromJackpotBingo'] = "";
        }
        if ($request['ToJackpotBingo']){ 
            //array_push($SortQuery,['jackpot_bingo','<=', $request['ToJackpotBingo'] ]);
            $wherQuery .= " and jackpot_bingo <= '" . $request['ToJackpotBingo'] . "' ";
            $page['ToJackpotBingo'] = $request['ToJackpotBingo'];
        }else{
            $page['ToJackpotBingo'] = "";
        }
        if ($request['FromLineVal']){ 
            //array_push($SortQuery,['line_val','>=', $request['FromLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromLineVal'] . "' ";
            $page['FromLineVal'] = $request['FromLineVal'];
        }else{
            $page['FromLineVal'] = "";
        }
        if ($request['ToLineVal']){ 
            //array_push($SortQuery,['line_val','<=', $request['ToLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToLineVal'] . "' ";
            $page['ToLineVal'] = $request['ToLineVal'];
        }else{
            $page['ToLineVal'] = "";
        }
        if ($request['FromBingoVal']){ 
            //array_push($SortQuery,['bingo_val','>=', $request['FromBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBingoVal'] . "' ";
            $page['FromBingoVal'] = $request['FromBingoVal'];
        }else{
            $page['FromBingoVal'] = "";
        }
        if ($request['ToBingoVal']){ 
            //array_push($SortQuery,['bingo_val','<=', $request['ToBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBingoVal'] . "' ";
            $page['ToBingoVal'] = $request['ToBingoVal'];
        }else{
            $page['ToBingoVal'] = "";
        }
        if ($request['FromMybonusVal']){ 
            //array_push($SortQuery,['mybonus_val','>=', $request['FromMybonus'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromMybonusVal'] . "' ";
            $page['FromMybonusVal'] = $request['FromMybonusVal'];
        }else{
            $page['FromMybonusVal'] = "";
        }
        if ($request['ToMybonusVal']){ 
            //array_push($SortQuery,['mybonus_val','<=', $request['ToMybonus'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToMybonusVal'] . "' ";
            $page['ToMybonusVal'] = $request['ToMybonusVal'];
        }else{
            $page['ToMybonusVal'] = "";
        }// bonus_line  jackpot_line
        if ($request['FromBonusLineVal']){ 
            //array_push($SortQuery,['bonus_line_val','>=', $request['FromBonusLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBonusLineVal'] . "' ";
            $page['FromBonusLineVal'] = $request['FromBonusLineVal'];
        }else{
            $page['FromBonusLineVal'] = "";
        }
        if ($request['ToBonusLineVal']){ 
            //array_push($SortQuery,['bonus_line_val','<=', $request['ToBonusLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBonusLineVal'] . "' ";
            $page['ToBonusLineVal'] = $request['ToBonusLineVal'];
        }else{
            $page['ToBonusLineVal'] = "";
        }
        if ($request['FromBonusBingoVal']){ 
            //array_push($SortQuery,['bonus_bingo_val','>=', $request['FromBonusBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromBonusBingoVal'] . "' ";
            $page['FromBonusBingoVal'] = $request['FromBonusBingoVal'];
        }else{
            $page['FromBonusBingoVal'] = "";
        }
        if ($request['ToBonusBingoVal']){ 
            //array_push($SortQuery,['bonus_bingo_val','<=', $request['ToBonusBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToBonusBingoVal'] . "' ";
            $page['ToBonusBingoVal'] = $request['ToBonusBingoVal'];
        }else{
            $page['ToBonusBingoVal'] = "";
        }
        if ($request['FromJackpotLineVal']){ 
            //array_push($SortQuery,['jackpot_line_val','>=', $request['FromJackpotLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromJackpotLineVal'] . "' ";
            $page['FromJackpotLineVal'] = $request['FromJackpotLineVal'];
        }else{
            $page['FromJackpotLineVal'] = "";
        }
        if ($request['ToJackpotLineVal']){ 
            //array_push($SortQuery,['jackpot_line_val','<=', $request['ToJackpotLine'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToJackpotLineVal'] . "' ";
            $page['ToJackpotLineVal'] = $request['ToJackpotLineVal'];
        }else{
            $page['ToJackpotLineVal'] = "";
        }
        if ($request['FromJackpotBingoVal']){ 
            //array_push($SortQuery,['jackpot_bingo_val','>=', $request['FromJackpotBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) >= '" . $request['FromJackpotBingoVal'] . "' ";
            $page['FromJackpotBingoVal'] = $request['FromJackpotBingoVal'];
        }else{
            $page['FromJackpotBingoVal'] = "";
        }
        if ($request['ToJackpotBingoVal']){ 
            //array_push($SortQuery,['jackpot_bingo_val','<=', $request['ToJackpotBingo'] ]);
            $wherQuery .= " and (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) <= '" . $request['ToJackpotBingoVal'] . "' ";
            $page['ToJackpotBingoVal'] = $request['ToJackpotBingoVal'];
        }else{
            $page['ToJackpotBingoVal'] = "";
        }
        
        $historyCount = DB::connection('pgsql3')->select('SELECT count(s.tstamp) FROM history as s WHERE 1 = 1'. $wherQuery . ' ');
        foreach ($historyCount as $countVal){
            $countVal1 = $countVal->count ;
        }
        if ($historyCount){
            if ($request['page']) {
                $page['current'] = $request['page'];
        
            } else {
                $page['current'] = 1;
        
            }
                $lastPage = $countVal1 / $page['rowsPerPage'] + 1 ;
                //var_dump($countVal1);
                //$lastPage = 1 ;
                $page['last'] = ceil($lastPage);
                $page['StartAt'] = $page['rowsPerPage'] * ($page['current'] - 1);
        }else{
             $page['current'] = 1;
             $page['last'] = 1;
             $page['StartAt'] = 0;
        }
        
        $historyClas = new  BingoHistory();
        $historys = DB::connection('pgsql3')->select(' 
                SELECT
                    s.unique_game_seq, 
                    s.tstamp, 
                    s.bingo_seq, 
                    s.ticket_cost, 
                    s.players, 
                    s.tickets,                        
                    s.line, 
                    s.bingo, 
                    s.mybonus, 
                    s.bonus_line, 
                    s.bonus_bingo, 
                    s.jackpot_line, 
                    s.jackpot_bingo, 
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 1 GROUP BY w2.unique_game_seq) ELSE 0 END ) as line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 2 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 7 GROUP BY w2.unique_game_seq) ELSE 0 END ) as mybonus_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 3 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bonus_line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 4 GROUP BY w2.unique_game_seq) ELSE 0 END ) as bonus_bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 5 GROUP BY w2.unique_game_seq) ELSE 0 END ) as jackpot_line_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 6 GROUP BY w2.unique_game_seq) ELSE 0 END ) as jackpot_bingo_val,
                    (CASE WHEN (EXISTS ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 8 GROUP BY w2.unique_game_seq)) THEN ( SELECT SUM(w2.win_val) FROM wins_history as w2 WHERE w2.unique_game_seq = s.unique_game_seq  and w2.win_type = 8 GROUP BY w2.unique_game_seq) ELSE 0 END ) as cancel_val
                        
                FROM history as s
                WHERE 1 = 1'. $wherQuery . '
                ORDER BY '. $page['OrderQuery'].' '.$page['OrderDesc'].' 
                LIMIT '.$page['rowsPerPage'].' OFFSET '. $page['StartAt'] . '    
                ');
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->tstamp, 
                'Game #' => $history->bingo_seq,
                'Ticket cost' => $history->ticket_cost / 100,
                'Players' => $history->players,
                'Tickets' => $history->tickets,
                'Line' => $history->line,
                'Line $' => $history->line_val / 100,
                'Bingo' => $history->bingo,
                'Bingo $' => $history->bingo_val / 100,
                'My bonus' => $history->mybonus,
                'My bonus $' => $history->mybonus_val / 100,
                'Bonus line' => $history->bonus_line,
                'Bonus line $' => $history->bonus_line_val / 100,
                'Bonus bingo' => $history->bonus_bingo,
                'Bonus bingo $' => $history->bonus_bingo_val / 100,
                'Jackpot line' => $history->jackpot_line,
                'Jackpot line $' => $history->jackpot_line_val / 100,
                'Jackpot bingo' => $history->jackpot_bingo,
                'Jackpot bingo $' => $history->jackpot_bingo_val / 100,
                'Cancel' => $history->cancel_val
            );
            
        }

        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Bingo Data', function($excel) use($export){
            $excel->sheet('Bingo', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
   
    
    // end Bingo
    //start Roulette 
    public function historyRoulette_statistics(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            array_push($SortQuery,['rlt_seq', '=', $request['GameSort']]);
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        $PSIDexist = 0;
        if ($request['PSID']){
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
            /*$PSIDs = ServerPs::where('seatid', $request['PSID'])->get();
            if ($PSIDs->count()){
                $PSIDexist = 1;
                $page['PSID'] = $request['PSID'];
                $PSIDarray = array();
                foreach ($PSIDs as $PSIDv){
                    array_push($PSIDarray, $PSIDv->psid);
                }
            }else{
                array_push($SortQuery,['psid','=', 0 ]);
                $page['PSID'] = $request['PSID'];
            };*/
            //array_push($SortQuery,['psid','=', $request['PSID'] ]);
            //$page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            array_push($SortQuery,['seatid', '=', $request['SeatID']]);
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameNum']){
             array_push($SortQuery,['win_num','>=', $request['FromGameNum'] ]);
            $page['FromGameNum'] = $request['FromGameNum'];
        }else{
            $page['FromGameNum'] = "";
        }
        if ($request['ToGameNum']){
             array_push($SortQuery,['win_num','<=', $request['ToGameNum'] ]);
            $page['ToGameNum'] = $request['ToGameNum'];
        }else{
            $page['ToGameNum'] = "";
        }
        if ($request['FromGameBet']){
             array_push($SortQuery,['bet','>=', $request['FromGameBet'] * 100 ]);
            $page['FromGameBet'] = $request['FromGameBet'] ;
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
             array_push($SortQuery,['bet','<=', $request['ToGameBet'] * 100 ]);
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
             array_push($SortQuery,['win_val','>=', $request['FromGameWin'] * 100 ]);
            $page['FromGameWin'] = $request['FromGameWin'] ;
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
             array_push($SortQuery,['win_val','<=', $request['ToGameWin'] * 100 ]);
            $page['ToGameWin'] = $request['ToGameWin'] ;
        }else{
            $page['ToGameWin'] = "";
        }
        if ($request['FromGameJack']){
             array_push($SortQuery,['jackpot','>=', $request['FromGameJack'] * 100 ]);
            $page['FromGameJack'] = $request['FromGameJack'] ;
        }else{
            $page['FromGameJack'] = "";
        }
        if ($request['ToGameJack']){
             array_push($SortQuery,['jackpot','<=', $request['ToGameJack'] * 100 ]);
            $page['ToGameJack'] = $request['ToGameJack'] ;
        }else{
            $page['ToGameJack'] = "";
        }
        
        $historyClas = new GameHistory();
        // $someModel = new SomeModel;

        $historyClas->setConnection('pgsql4');
        //$historyClas->setConnection('pgsql6');
        //$something = $historyClas->find(1);
        ////$tesatHistorys = $historyClas->select('win as Twin')->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->first();
        //$page['win'] = $tesatHistorys;
        if ($PSIDexist == 1){
            //$historys = $historyClas->where($SortQuery)->whereIn('psid', $PSIDarray)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        }else{
            $historys = $historyClas->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        }
        
        
        //$historys = GameHistory::orderBy('ts', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();

        return view('statistics.historyRoulette', ['historys' => $historys, 'server_ps' => $server_ps, 'page' => $page ]); 
    }
    
    public function ajax_statRouletteHistory(Request $request)
    {
        $dataRowID = $request['rowID'];
        $dataRowTS = $request['rowTS'];
        $historys = GameHistory::where('ts', $dataRowTS)->orderBy('ts', 'desc')->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        $seatid = $historys->psid;
        $seatTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        $positions = array();
        $positionN =161;
        $num_max = $positionN + 1;
        $blob = $historys->bets ;
        $positionsStr = unpack('S' . $num_max, stream_get_contents($blob, -1, 0));
        for ($i = 1; $i <= $num_max; $i++) {
            if($positionsStr[$i] > 0) {
                $positions[$i  - 1] = $positionsStr[$i];
            }
        }
        $rlt_chip_positions = array();
        $rlt_chip_positions = $this->chip_positions();
       
        $testPage = view('statistics.rouletteHistory', ['positions' => $positions, 'rlt_chip_positions' => $rlt_chip_positions])->render();
       
        $dataArray1 = array(
            "success" => "success",
            "dataRowID" => $dataRowID,
            "seatid" => $seatid,
            "seatTime" => $seatTime,
            "gameIDArrow" => $historys->rlt_seq,
            "winNumber" => $historys->win_num,
            "totalBet" =>  number_format($historys->bet / 100, 2),
            "totalWin" =>  number_format($historys->win_val / 100, 2),
            "jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_nextPrevRouletteHistory(Request $request)
    {
        $dataRowID = $request['rowId'];
        $dataRowTS = $request['rowTS'];
        $dataRowNextPrev = $request['NextPrev'];
        $prevArrow = 1;
        $nextArrow = 1;
        if ($dataRowNextPrev == "Prev"){
            //var_dump($dataRowNextPrev);
            if (GameHistory::where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->count()){
                $dataRowTS = GameHistory::where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->orderBy('ts', 'asc')->first()->ts;
                if (!GameHistory::where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->count()){
                    $prevArrow = 0;
                }
            }
        }else{
            if (GameHistory::where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->count()){
                $dataRowTS = GameHistory::where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->orderBy('ts', 'desc')->first()->ts;
                if (!GameHistory::where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->count()){
                    $nextArrow = 0;
                }
            }    
        }
        
        
        
        $historys = GameHistory::where('ts', $dataRowTS)->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        //$seatid = "PS: " . $historys->psid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        $seatid = $historys->psid;
        $seatTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        $positions = array();
        $positionN =161;
        $num_max = $positionN + 1;
        $blob = $historys->bets ;
        $positionsStr = unpack('S' . $num_max, stream_get_contents($blob, -1, 0));
        for ($i = 1; $i <= $num_max; $i++) {
            if($positionsStr[$i] > 0) {
                $positions[$i  - 1] = $positionsStr[$i];
            }
        }
        $rlt_chip_positions = array();
        $rlt_chip_positions = $this->chip_positions();
       
        $testPage = view('statistics.rouletteHistory', ['positions' => $positions, 'rlt_chip_positions' => $rlt_chip_positions])->render();
       
        $dataArray1 = array(
            "success" => "success",
            "dataRowTS" => $dataRowTS,
            "prevArrow" => $prevArrow, 
            "nextArrow" => $nextArrow,
            "dataRowID" => $dataRowID,
            "seatid" => $seatid,
            "seatTime" => $seatTime,
            "gameIDArrow" => $historys->rlt_seq,
            "winNumber" => $historys->win_num,
            "totalBet" =>  number_format($historys->bet / 100, 2),
            "totalWin" =>  number_format($historys->win_val / 100, 2),
            "jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function chip_positions()
    {
        $rlt_chip_positions = array();
        $rlt_chip_positions[0]= array('left' => 20, 'top' => 300);
        $rlt_chip_positions[1]= array('left' => 125, 'top' => 340);
        $rlt_chip_positions[2]= array('left' => 125, 'top' => 235);
        $rlt_chip_positions[3]= array('left' => 125, 'top' => 125);
        $rlt_chip_positions[4]= array('left' => 228, 'top' => 340);
        $rlt_chip_positions[5]= array('left' => 228, 'top' => 235);
        $rlt_chip_positions[6]= array('left' => 228, 'top' => 125);
        $rlt_chip_positions[7]= array('left' => 330, 'top' => 340);
        $rlt_chip_positions[8]= array('left' => 330, 'top' => 235);
        $rlt_chip_positions[9]= array('left' => 330, 'top' => 125);
   
        $rlt_chip_positions[10]= array('left' => 433, 'top' => 340);
        $rlt_chip_positions[11]= array('left' => 433, 'top' => 235);
        $rlt_chip_positions[12]= array('left' => 433, 'top' => 125);
        $rlt_chip_positions[13]= array('left' => 535, 'top' => 340);
        $rlt_chip_positions[14]= array('left' => 535, 'top' => 235);
        $rlt_chip_positions[15]= array('left' => 535, 'top' => 125);
        $rlt_chip_positions[16]= array('left' => 638, 'top' => 340);
        $rlt_chip_positions[17]= array('left' => 638, 'top' => 235);
        $rlt_chip_positions[18]= array('left' => 638, 'top' => 125);
        $rlt_chip_positions[19]= array('left' => 740, 'top' => 340);
        
        $rlt_chip_positions[20]= array('left' => 740, 'top' => 235);
        $rlt_chip_positions[21]= array('left' => 740, 'top' => 125);
        $rlt_chip_positions[22]= array('left' => 843, 'top' => 340);
        $rlt_chip_positions[23]= array('left' => 843, 'top' => 235);
        $rlt_chip_positions[24]= array('left' => 843, 'top' => 125);
        $rlt_chip_positions[25]= array('left' => 945, 'top' => 340);
        $rlt_chip_positions[26]= array('left' => 945, 'top' => 235);
        $rlt_chip_positions[27]= array('left' => 945, 'top' => 125);
        $rlt_chip_positions[28]= array('left' => 1045, 'top' => 340);
        $rlt_chip_positions[29]= array('left' => 1045, 'top' => 235);
        
        $rlt_chip_positions[30]= array('left' => 1045, 'top' => 125);
        $rlt_chip_positions[31]= array('left' => 1148, 'top' => 340);
        $rlt_chip_positions[32]= array('left' => 1148, 'top' => 235);
        $rlt_chip_positions[33]= array('left' => 1148, 'top' => 125);
        $rlt_chip_positions[34]= array('left' => 1250, 'top' => 340);
        $rlt_chip_positions[35]= array('left' => 1250, 'top' => 235);
        $rlt_chip_positions[36]= array('left' => 1250, 'top' => 125);
        // index 37 = double 0 (american roulette, don't have that here)
        $rlt_chip_positions[38]= array('left' => 270, 'top' => 20);
        $rlt_chip_positions[39]= array('left' => 685, 'top' => 20);
        
        $rlt_chip_positions[40]= array('left' => 1090, 'top' => 20);
        $rlt_chip_positions[41]= array('left' => 1355, 'top' => 340);
        $rlt_chip_positions[42]= array('left' => 1355, 'top' => 235);
        $rlt_chip_positions[43]= array('left' => 1355, 'top' => 125);
        $rlt_chip_positions[44]= array('left' => 178, 'top' => 445);
        $rlt_chip_positions[45]= array('left' => 385, 'top' => 445);
        $rlt_chip_positions[46]= array('left' => 585, 'top' => 445);
        $rlt_chip_positions[47]= array('left' => 790, 'top' => 445);
        $rlt_chip_positions[48]= array('left' => 995, 'top' => 445);
        $rlt_chip_positions[49]= array('left' => 1200, 'top' => 445);
        
        $rlt_chip_positions[50]= array('left' => 76, 'top' => 290);
        $rlt_chip_positions[51]= array('left' => 76, 'top' => 182);
        $rlt_chip_positions[52]= array('left' => 125, 'top' => 395);
        $rlt_chip_positions[53]= array('left' => 230, 'top' => 395);
        $rlt_chip_positions[54]= array('left' => 330, 'top' => 395);
        $rlt_chip_positions[55]= array('left' => 433, 'top' => 395);
        $rlt_chip_positions[56]= array('left' => 535, 'top' => 395);
        $rlt_chip_positions[57]= array('left' => 638, 'top' => 395);
        $rlt_chip_positions[58]= array('left' => 740, 'top' => 395);
        $rlt_chip_positions[59]= array('left' => 843, 'top' => 395);
   
        $rlt_chip_positions[60]= array('left' => 945, 'top' => 395);
        $rlt_chip_positions[61]= array('left' => 1045, 'top' => 395);
        $rlt_chip_positions[62]= array('left' => 1148, 'top' => 395);
        $rlt_chip_positions[63]= array('left' => 1250, 'top' => 395);
        $rlt_chip_positions[64]= array('left' => 180, 'top' => 395);
        $rlt_chip_positions[65]= array('left' => 280, 'top' => 395);
        $rlt_chip_positions[66]= array('left' => 382, 'top' => 395);
        $rlt_chip_positions[67]= array('left' => 485, 'top' => 395);
        $rlt_chip_positions[68]= array('left' => 585, 'top' => 395);
        $rlt_chip_positions[69]= array('left' => 688, 'top' => 395);
   
        $rlt_chip_positions[70]= array('left' => 790, 'top' => 395);
        $rlt_chip_positions[71]= array('left' => 893, 'top' => 395);
        $rlt_chip_positions[72]= array('left' => 995, 'top' => 395);
        $rlt_chip_positions[73]= array('left' => 1098, 'top' => 395);
        $rlt_chip_positions[74]= array('left' => 1200, 'top' => 395);
        $rlt_chip_positions[75]= array('left' => 75, 'top' => 395);
        $rlt_chip_positions[76]= array('left' => 180, 'top' => 290);
        $rlt_chip_positions[77]= array('left' => 280, 'top' => 290);
        $rlt_chip_positions[78]= array('left' => 382, 'top' => 290);
        $rlt_chip_positions[79]= array('left' => 485, 'top' => 290);
        
        $rlt_chip_positions[80]= array('left' => 585, 'top' => 290);
        $rlt_chip_positions[81]= array('left' => 688, 'top' => 290);
        $rlt_chip_positions[82]= array('left' => 790, 'top' => 290);
        $rlt_chip_positions[83]= array('left' => 893, 'top' => 290);
        $rlt_chip_positions[84]= array('left' => 995, 'top' => 290);
        $rlt_chip_positions[85]= array('left' => 1098, 'top' => 290);
        $rlt_chip_positions[86]= array('left' => 1200, 'top' => 290);
        $rlt_chip_positions[87]= array('left' => 180, 'top' => 182);
        $rlt_chip_positions[88]= array('left' => 280, 'top' => 182);
        $rlt_chip_positions[89]= array('left' => 382, 'top' => 182);
   
        $rlt_chip_positions[90]= array('left' => 485, 'top' => 182);
        $rlt_chip_positions[91]= array('left' => 585, 'top' => 182);
        $rlt_chip_positions[92]= array('left' => 688, 'top' => 182);
        $rlt_chip_positions[93]= array('left' => 790, 'top' => 182);
        $rlt_chip_positions[94]= array('left' => 893, 'top' => 182);
        $rlt_chip_positions[95]= array('left' => 995, 'top' => 182);
        $rlt_chip_positions[96]= array('left' => 1098, 'top' => 182);
        $rlt_chip_positions[97]= array('left' => 1200, 'top' => 182);
        $rlt_chip_positions[98]= array('left' => 75, 'top' => 340);
        $rlt_chip_positions[99]= array('left' => 180, 'top' => 340);
   
        $rlt_chip_positions[100]= array('left' => 280, 'top' => 340);
        $rlt_chip_positions[101]= array('left' => 382, 'top' => 340);
        $rlt_chip_positions[102]= array('left' => 485, 'top' => 340);
        $rlt_chip_positions[103]= array('left' => 585, 'top' => 340);
        $rlt_chip_positions[104]= array('left' => 688, 'top' => 340);
        $rlt_chip_positions[105]= array('left' => 790, 'top' => 340);
        $rlt_chip_positions[106]= array('left' => 893, 'top' => 340);
        $rlt_chip_positions[107]= array('left' => 995, 'top' => 340);
        $rlt_chip_positions[108]= array('left' => 1098, 'top' => 340);
        $rlt_chip_positions[109]= array('left' => 1200, 'top' => 340);
        
        $rlt_chip_positions[110]= array('left' => 75, 'top' => 235);
        $rlt_chip_positions[111]= array('left' => 180, 'top' => 235);
        $rlt_chip_positions[112]= array('left' => 280, 'top' => 235);
        $rlt_chip_positions[113]= array('left' => 382, 'top' => 235);
        $rlt_chip_positions[114]= array('left' => 485, 'top' => 235);
        $rlt_chip_positions[115]= array('left' => 585, 'top' => 235);
        $rlt_chip_positions[116]= array('left' => 688, 'top' => 235);
        $rlt_chip_positions[117]= array('left' => 790, 'top' => 235);
        $rlt_chip_positions[118]= array('left' => 893, 'top' => 235);
        $rlt_chip_positions[119]= array('left' => 995, 'top' => 235);
   
        $rlt_chip_positions[120]= array('left' => 1098, 'top' => 235);
        $rlt_chip_positions[121]= array('left' => 1200, 'top' => 235);
        $rlt_chip_positions[122]= array('left' => 75, 'top' => 125);
        $rlt_chip_positions[123]= array('left' => 180, 'top' => 125);
        $rlt_chip_positions[124]= array('left' => 280, 'top' => 125);
        $rlt_chip_positions[125]= array('left' => 382, 'top' => 125);
        $rlt_chip_positions[126]= array('left' => 485, 'top' => 125);
        $rlt_chip_positions[127]= array('left' => 585, 'top' => 125);
        $rlt_chip_positions[128]= array('left' => 688, 'top' => 125);
        $rlt_chip_positions[129]= array('left' => 790, 'top' => 125);
        
        $rlt_chip_positions[130]= array('left' => 893, 'top' => 125);
        $rlt_chip_positions[131]= array('left' => 995, 'top' => 125);
        $rlt_chip_positions[132]= array('left' => 1098, 'top' => 125);
        $rlt_chip_positions[133]= array('left' => 1200, 'top' => 125);
        $rlt_chip_positions[134]= array('left' => 125, 'top' => 290);
        $rlt_chip_positions[135]= array('left' => 230, 'top' => 290);
        $rlt_chip_positions[136]= array('left' => 330, 'top' => 290);
        $rlt_chip_positions[137]= array('left' => 433, 'top' => 290);
        $rlt_chip_positions[138]= array('left' => 535, 'top' => 290);
        $rlt_chip_positions[139]= array('left' => 638, 'top' => 290);
        
        $rlt_chip_positions[140]= array('left' => 740, 'top' => 290);
        $rlt_chip_positions[141]= array('left' => 843, 'top' => 290);
        $rlt_chip_positions[142]= array('left' => 945, 'top' => 290);
        $rlt_chip_positions[143]= array('left' => 1045, 'top' => 290);
        $rlt_chip_positions[144]= array('left' => 1148, 'top' => 290);
        $rlt_chip_positions[145]= array('left' => 1250, 'top' => 290);
        $rlt_chip_positions[146]= array('left' => 125, 'top' => 182);
        $rlt_chip_positions[147]= array('left' => 230, 'top' => 182);
        $rlt_chip_positions[148]= array('left' => 330, 'top' => 182);
        $rlt_chip_positions[149]= array('left' => 433, 'top' => 182);
        
        $rlt_chip_positions[150]= array('left' => 535, 'top' => 182);
        $rlt_chip_positions[151]= array('left' => 638, 'top' => 182);
        $rlt_chip_positions[152]= array('left' => 740, 'top' => 182);
        $rlt_chip_positions[153]= array('left' => 843, 'top' => 182);
        $rlt_chip_positions[154]= array('left' => 945, 'top' => 182);
        $rlt_chip_positions[155]= array('left' => 1045, 'top' => 182);
        $rlt_chip_positions[156]= array('left' => 1148, 'top' => 182);
        $rlt_chip_positions[157]= array('left' => 1250, 'top' => 182);
        
        $rlt_chip_positions[158]= array('left' => 485, 'top' => 20);
        $rlt_chip_positions[159]= array('left' => 893, 'top' => 20);
  
        $rlt_chip_positions[160]= array('left' => 1355, 'top' => 182);
        $rlt_chip_positions[161]= array('left' => 1355, 'top' => 290);
    
        return $rlt_chip_positions ;
    }
    
     public function ajax_sortRouletteHistory(Request $request)
    {
        $dataFromGameTs = $request['FromGameTs'];
        $dataToGameTs = $request['ToGameTs'];
        $dataGameSort = $request['GameSort'];
        if ($request['PSID'] == "" ){
            $dataSeat_ID = 0;
        }else{
            $dataSeat_ID = $request['PSID'];
        }
        $dataSeat_ID = $request['PSID'];
        $SortQuery = array(); 
        if ($dataFromGameTs != ""){
             array_push ($SortQuery,['ts', '>=', $dataFromGameTs]);
        }
        if ($dataToGameTs != ""){
             array_push ($SortQuery,['ts', '<=', $dataToGameTs]);
        }
        if ($dataGameSort != ""){
             array_push ($SortQuery,['rlt_seq', '=', $dataGameSort]);
        }
        if ($request['FromGameNum'] != ""){
            array_push ($SortQuery,['win_num', '>=', $request['FromGameNum']]);
        }
        if ($request['ToGameNum'] != "" ){
            array_push ($SortQuery,['win_num', '<=', $request['ToGameNum']]);
        }
        if ($request['FromGameBet'] != ""){
            array_push ($SortQuery,['bet', '>=', $request['FromGameBet'] * 100]);
        }
        if ($request['ToGameBet'] != "" ){
            array_push ($SortQuery,['bet', '<=', $request['ToGameBet'] * 100]);
        }
        if ($request['FromGameWin'] != ""){
            array_push ($SortQuery,['win_val', '>=', $request['FromGameWin'] * 100]);
        }
        if ($request['ToGameWin'] != "" ){
            array_push ($SortQuery,['win_val', '<=', $request['ToGameWin'] * 100]);
        }
        if ($request['FromGameJack'] != ""){
            array_push ($SortQuery,['jackpot', '>=', $request['FromGameJack'] * 100]);
        }
        if ($request['ToGameJack'] != "" ){
            array_push ($SortQuery,['jackpot', '<=', $request['ToGameJack'] * 100]);
        }
        
        $historys = GameHistory::where($SortQuery)->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();

        $testPage = view('statistics.sortRouletteHistory', ['historys' => $historys, 'server_ps' => $server_ps, 'dataSeat_ID' => $dataSeat_ID])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function export2excelR(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            array_push($SortQuery,['rlt_seq', '=', $request['GameSort']]);
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        $PSIDexist = 0;
        if ($request['PSID']){
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            array_push($SortQuery,['seatid', '=', $request['SeatID']]);
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameNum']){
             array_push($SortQuery,['win_num','>=', $request['FromGameNum'] ]);
            $page['FromGameNum'] = $request['FromGameNum'];
        }else{
            $page['FromGameNum'] = "";
        }
        if ($request['ToGameNum']){
             array_push($SortQuery,['win_num','<=', $request['ToGameNum'] ]);
            $page['ToGameNum'] = $request['ToGameNum'];
        }else{
            $page['ToGameNum'] = "";
        }
        if ($request['FromGameBet']){
             array_push($SortQuery,['bet','>=', $request['FromGameBet'] * 100 ]);
            $page['FromGameBet'] = $request['FromGameBet'] ;
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
             array_push($SortQuery,['bet','<=', $request['ToGameBet'] * 100 ]);
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
             array_push($SortQuery,['win_val','>=', $request['FromGameWin'] * 100 ]);
            $page['FromGameWin'] = $request['FromGameWin'] ;
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
             array_push($SortQuery,['win_val','<=', $request['ToGameWin'] * 100 ]);
            $page['ToGameWin'] = $request['ToGameWin'] ;
        }else{
            $page['ToGameWin'] = "";
        }
        if ($request['FromGameJack']){
             array_push($SortQuery,['jackpot','>=', $request['FromGameJack'] * 100 ]);
            $page['FromGameJack'] = $request['FromGameJack'] ;
        }else{
            $page['FromGameJack'] = "";
        }
        if ($request['ToGameJack']){
             array_push($SortQuery,['jackpot','<=', $request['ToGameJack'] * 100 ]);
            $page['ToGameJack'] = $request['ToGameJack'] ;
        }else{
            $page['ToGameJack'] = "";
        }
        
        $historyClas = new GameHistory();
        $historys = $historyClas->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->ts, 
                'Game #' => $history->rlt_seq,
                'Ps ID' =>  $history->psid, 
                'Seat ID' => $history->seatid,
                'Win Number' => $history->win_num,
                'Total Bet' => $history->bet / 100,
                'Total Win' => $history->win_val / 100 ,
                'Jackpot' => $history->jackpot / 100,
                'No Spin Game' => $history->no_spin / 100
            );
            
        }
        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Ruolette Data', function($excel) use($export){
            $excel->sheet('Ruolette', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
   
    
    //end Roulette
    //start Roulette2
    public function historyRoulette2_statistics(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            array_push($SortQuery,['rlt_seq', '=', $request['GameSort']]);
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        $PSIDexist = 0;
        if ($request['PSID']){
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
            /*$PSIDs = ServerPs::where('seatid', $request['PSID'])->get();
            if ($PSIDs->count()){
                $PSIDexist = 1;
                $page['PSID'] = $request['PSID'];
                $PSIDarray = array();
                foreach ($PSIDs as $PSIDv){
                    array_push($PSIDarray, $PSIDv->psid);
                }
            }else{
                array_push($SortQuery,['psid','=', 0 ]);
                $page['PSID'] = $request['PSID'];
            };*/
            //array_push($SortQuery,['psid','=', $request['PSID'] ]);
            //$page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            array_push($SortQuery,['seatid', '=', $request['SeatID']]);
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameNum']){
             array_push($SortQuery,['win_num','>=', $request['FromGameNum'] ]);
            $page['FromGameNum'] = $request['FromGameNum'];
        }else{
            $page['FromGameNum'] = "";
        }
        if ($request['ToGameNum']){
             array_push($SortQuery,['win_num','<=', $request['ToGameNum'] ]);
            $page['ToGameNum'] = $request['ToGameNum'];
        }else{
            $page['ToGameNum'] = "";
        }
        if ($request['FromGameBet']){
             array_push($SortQuery,['bet','>=', $request['FromGameBet'] * 100 ]);
            $page['FromGameBet'] = $request['FromGameBet'] ;
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
             array_push($SortQuery,['bet','<=', $request['ToGameBet'] * 100 ]);
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
             array_push($SortQuery,['win_val','>=', $request['FromGameWin'] * 100 ]);
            $page['FromGameWin'] = $request['FromGameWin'] ;
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
             array_push($SortQuery,['win_val','<=', $request['ToGameWin'] * 100 ]);
            $page['ToGameWin'] = $request['ToGameWin'] ;
        }else{
            $page['ToGameWin'] = "";
        }
        if ($request['FromGameJack']){
             array_push($SortQuery,['jackpot','>=', $request['FromGameJack'] * 100 ]);
            $page['FromGameJack'] = $request['FromGameJack'] ;
        }else{
            $page['FromGameJack'] = "";
        }
        if ($request['ToGameJack']){
             array_push($SortQuery,['jackpot','<=', $request['ToGameJack'] * 100 ]);
            $page['ToGameJack'] = $request['ToGameJack'] ;
        }else{
            $page['ToGameJack'] = "";
        }
        
        $historyClas = new GameHistory();
        // $someModel = new SomeModel;

        //$historyClas->setConnection('pgsql4');
        $historyClas->setConnection('pgsql6');
        //$something = $historyClas->find(1);
        ////$tesatHistorys = $historyClas->select('win as Twin')->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->first();
        //$page['win'] = $tesatHistorys;
        if ($PSIDexist == 1){
            //$historys = $historyClas->where($SortQuery)->whereIn('psid', $PSIDarray)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        }else{
            $historys = $historyClas->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        }
        
        
        //$historys = GameHistory::orderBy('ts', 'desc')->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();

        return view('statistics.historyRoulette2', ['historys' => $historys, 'server_ps' => $server_ps, 'page' => $page ]); 
    }
    
    public function ajax_statRoulette2History(Request $request)
    {
        $dataRowID = $request['rowID'];
        $dataRowTS = $request['rowTS'];
        $historyClas = new GameHistory();
        //$historyClas->setConnection('pgsql4');
        $historyClas->setConnection('pgsql6');
        $historys = $historyClas->where('ts', $dataRowTS)->orderBy('ts', 'desc')->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        //$seatid = "PS: " . $historys->psid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        $seatid = $historys->psid;
        $seatTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        $positions = array();
        $positionN =161;
        $num_max = $positionN + 1;
        $blob = $historys->bets ;
        $positionsStr = unpack('S' . $num_max, stream_get_contents($blob, -1, 0));
        for ($i = 1; $i <= $num_max; $i++) {
            if($positionsStr[$i] > 0) {
                $positions[$i  - 1] = $positionsStr[$i];
            }
        }
        $rlt_chip_positions = array();
        $rlt_chip_positions = $this->chip_positions();
       
        $testPage = view('statistics.rouletteHistory', ['positions' => $positions, 'rlt_chip_positions' => $rlt_chip_positions])->render();
       
        $dataArray1 = array(
            "success" => "success",
            "dataRowID" => $dataRowID,
            "seatid" => $seatid,
            "seatTime" => $seatTime,
            "gameIDArrow" => $historys->rlt_seq,
            "winNumber" => $historys->win_num,
            "totalBet" =>  number_format($historys->bet / 100, 2),
            "totalWin" =>  number_format($historys->win_val / 100, 2),
            "jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_nextPrevRoulette2History(Request $request)
    {
        $dataRowID = $request['rowId'];
        $dataRowTS = $request['rowTS'];
        $dataRowNextPrev = $request['NextPrev'];
        $prevArrow = 1;
        $nextArrow = 1;
        $historyClas = new GameHistory();
        //$historyClas->setConnection('pgsql4');
        $historyClas->setConnection('pgsql6');
        if ($dataRowNextPrev == "Prev"){
            //var_dump($dataRowNextPrev);
            if ($historyClas->where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->count()){
                $dataRowTS = $historyClas->where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->orderBy('ts', 'asc')->first()->ts;
                if (!$historyClas->where('psid', $dataRowID)->where('ts', '>', $dataRowTS)->count()){
                    $prevArrow = 0;
                }
            }
        }else{
            if ($historyClas->where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->count()){
                $dataRowTS = $historyClas->where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->orderBy('ts', 'desc')->first()->ts;
                if (!$historyClas->where('psid', $dataRowID)->where('ts', '<', $dataRowTS)->count()){
                    $nextArrow = 0;
                }
            }    
        }
        
        
        
        $historys = $historyClas->where('ts', $dataRowTS)->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        //$seatid = "PS: " . $historys->psid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        $seatid = $historys->psid;
        $seatTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        $positions = array();
        $positionN =161;
        $num_max = $positionN + 1;
        $blob = $historys->bets ;
        $positionsStr = unpack('S' . $num_max, stream_get_contents($blob, -1, 0));
        for ($i = 1; $i <= $num_max; $i++) {
            if($positionsStr[$i] > 0) {
                $positions[$i  - 1] = $positionsStr[$i];
            }
        }
        $rlt_chip_positions = array();
        $rlt_chip_positions = $this->chip_positions();
       
        $testPage = view('statistics.rouletteHistory', ['positions' => $positions, 'rlt_chip_positions' => $rlt_chip_positions])->render();
       
        $dataArray1 = array(
            "success" => "success",
            "dataRowTS" => $dataRowTS,
            "prevArrow" => $prevArrow, 
            "nextArrow" => $nextArrow,
            "dataRowID" => $dataRowID,
            "seatid" => $seatid,
            "seatTime" => $seatTime,
            "gameIDArrow" => $historys->rlt_seq,
            "winNumber" => $historys->win_num,
            "totalBet" =>  number_format($historys->bet / 100, 2),
            "totalWin" =>  number_format($historys->win_val / 100, 2),
            "jackpotWon" =>  number_format($historys->jackpot / 100, 2),
            "html" => $testPage,
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function export2excelR2(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
             array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            array_push($SortQuery,['rlt_seq', '=', $request['GameSort']]);
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        $PSIDexist = 0;
        if ($request['PSID']){
            array_push($SortQuery,['psid', '=', $request['PSID']]);
            $page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            array_push($SortQuery,['seatid', '=', $request['SeatID']]);
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameNum']){
             array_push($SortQuery,['win_num','>=', $request['FromGameNum'] ]);
            $page['FromGameNum'] = $request['FromGameNum'];
        }else{
            $page['FromGameNum'] = "";
        }
        if ($request['ToGameNum']){
             array_push($SortQuery,['win_num','<=', $request['ToGameNum'] ]);
            $page['ToGameNum'] = $request['ToGameNum'];
        }else{
            $page['ToGameNum'] = "";
        }
        if ($request['FromGameBet']){
             array_push($SortQuery,['bet','>=', $request['FromGameBet'] * 100 ]);
            $page['FromGameBet'] = $request['FromGameBet'] ;
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
             array_push($SortQuery,['bet','<=', $request['ToGameBet'] * 100 ]);
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
             array_push($SortQuery,['win_val','>=', $request['FromGameWin'] * 100 ]);
            $page['FromGameWin'] = $request['FromGameWin'] ;
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
             array_push($SortQuery,['win_val','<=', $request['ToGameWin'] * 100 ]);
            $page['ToGameWin'] = $request['ToGameWin'] ;
        }else{
            $page['ToGameWin'] = "";
        }
        if ($request['FromGameJack']){
             array_push($SortQuery,['jackpot','>=', $request['FromGameJack'] * 100 ]);
            $page['FromGameJack'] = $request['FromGameJack'] ;
        }else{
            $page['FromGameJack'] = "";
        }
        if ($request['ToGameJack']){
             array_push($SortQuery,['jackpot','<=', $request['ToGameJack'] * 100 ]);
            $page['ToGameJack'] = $request['ToGameJack'] ;
        }else{
            $page['ToGameJack'] = "";
        }
        
        $historyClas = new GameHistory();
        //$historyClas->setConnection('pgsql4');
        $historyClas->setConnection('pgsql6');
        $historys = $historyClas->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->ts, 
                'Game #' => $history->rlt_seq,
                'Ps ID' =>  $history->psid, 
                'Seat ID' => $history->seatid,
                'Win Number' => $history->win_num,
                'Total Bet' => $history->bet / 100,
                'Total Win' => $history->win_val / 100 ,
                'Jackpot' => $history->jackpot / 100,
                'No Spin Game' => $history->no_spin / 100
            );
            
        }
        //$export = $historys = BingoHistory::orderBy('tstamp', 'desc')->get();

        Excel::create('Ruolette Data', function($excel) use($export){
            $excel->sheet('Ruolette', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
   
    //end Roulette
    //start BJ
    public function historyBlackjack(Request $request)
    {   
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $whereQuery ="";
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $whereQuery .= " and ts >= '" . $request['FromGameTs'] . "' ";
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $whereQuery .= " and ts <= '" . $request['ToGameTs'] . "' ";
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            //array_push($SortQuery,['game_seq', '=', $request['GameSort']]);
            $whereQuery .= " and game_seq = '" . $request['GameSort'] . "' ";
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        if ($request['TableSort']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and table_idx = '" . ($request['TableSort'] - 1)  . "' ";
            $page['TableSort'] = $request['TableSort'];
        }else{
            $page['TableSort'] = "";
        }
        if ($request['PSID']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and (ps_id[1] = '" . ($request['PSID'])  . "' or ps_id[2] = '" . ($request['PSID'])  . "' or ps_id[3] = '" . ($request['PSID'])  . "' or ps_id[4] = '" . ($request['PSID'])  . "'  or ps_id[5] = '" . ($request['PSID'])  . "' ) ";
            $page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and (seat_id[1] = '" . ($request['SeatID'])  . "' or seat_id[2] = '" . ($request['SeatID'])  . "' or seat_id[3] = '" . ($request['SeatID'])  . "' seat ps_id[4] = '" . ($request['SeatID'])  . "'  or seat_id[5] = '" . ($request['SeatID'])  . "' ) ";
            //$whereQuery .= " and seat_id = '" . ($request['SeatID'])  . "' ";
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameBet']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameBet']]);
            $whereQuery .= " and (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END) )   >= '" . ($request['FromGameBet'] * 100) . "' ";
            $page['FromGameBet'] = $request['FromGameBet'];
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameWin']]);
            $whereQuery .= " and (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END) ) <= '" . ($request['ToGameBet'] * 100) . "' ";
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameWin']]);
            $whereQuery .= " and (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5])   >= '" . ($request['FromGameWin'] * 100) . "' ";
            $page['FromGameWin'] = $request['FromGameWin'];
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameWin']]);
            $whereQuery .= " and (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5]) <= '" . ($request['ToGameWin'] * 100) . "' ";
            $page['ToGameWin'] = $request['ToGameWin'];
        }else{
            $page['ToGameWin'] = "";
        }
        
        $historyCount = DB::connection('pgsql5')->select('SELECT count(h.ts) FROM game_history as h WHERE 1 = 1'. $whereQuery . ' ');
        foreach ($historyCount as $countVal){
            $countVal1 = $countVal->count ;
        }
        if ($historyCount){
            if ($request['page']) {
                $page['current'] = $request['page'];
        
            } else {
                $page['current'] = 1;
        
            }
                $lastPage = $countVal1 / $page['rowsPerPage'] ;
                //var_dump($countVal1);
                //$lastPage = 1 ;
                $page['last'] = ceil($lastPage);
                $page['StartAt'] = $page['rowsPerPage'] * ($page['current'] - 1);
        }else{
             $page['current'] = 1;
             $page['last'] = 1;
             $page['StartAt'] = 0;
        }
        
        
        $historyClas = new BlackjackGameHistory();
        //$tesatHistorys = $historyClas->select('win as Twin')->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->first();
        //$page['win'] = $tesatHistorys;
        //$historys = $historyClas->select( '*', DB::raw('(win[1] + win[2] + win[3] + win[4]  + win[5]) as total_win, (bet[1] + bet[2] + bet[3] + bet[4]  + bet[5]) as total_bet'))->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        
        $historys = DB::connection('pgsql5')->select('
                SELECT h.* , 
                    ps_id[1] as ps_id1,
                    ps_id[2] as ps_id2,
                    ps_id[3] as ps_id3,
                    ps_id[4] as ps_id4,
                    ps_id[5] as ps_id5,
                    seat_id[1] as seat_id1,
                    seat_id[2] as seat_id2,
                    seat_id[3] as seat_id3,
                    seat_id[4] as seat_id4,
                    seat_id[5] as seat_id5,
                    (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5]) as total_win,
                    (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END)
                    ) as total_bet
                FROM game_history as h
                WHERE 1 = 1'. $whereQuery . '
                ORDER BY ' . $page['OrderQuery'] . ' '.$page['OrderDesc'].' 
                LIMIT '.$page['rowsPerPage'].' OFFSET '. $page['StartAt'] . '    
                ');
        
        
        //$historys = $historyClas->where($SortQuery)->orderBy($page['OrderQuery'], $page['OrderDesc'])->paginate($page['rowsPerPage']);
        //$server_ps = ServerPs::orderBy('psid', 'asc')->get();
        //var_dump($historys[currentPage]);
        //$test = $historys->totalWin();
        //var_dump($historyClas->totalWin());
        
        return view('statistics.historyBlackjack', ['historys' => $historys, 'page' => $page ]); 
    }
    
    public function ajax_statBJHistory(Request $request)
    {
        $dataRowID = $request['rowID'];
        $dataRowTS = $request['rowTS'];
        $historyClas = new BlackjackGameHistory();
        $historys = $historyClas->where('ts', $dataRowTS)->first();
        /*$server_ps = ServerPs::where('psid', $historys->psid )->first();
        if ($server_ps != null){
            $seatid = "PS: " . $server_ps->seatid . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        }else{ //PS: 2, Time: 2016-09-13 16:05:33.747872
            $seatid = "PS: Missing saitid (PSID is $historys->psid ), Time: " . date('Y-m-d H:i:s', strtotime($historys->ts)); 
        }*/
        $tableid = ($historys->table_idx + 1);
        $tableidTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        $totalSeatIDArray = $historys->getArraySeat_id();
        $totalWinArray = $historys->getArrayWin();
        $totalBetArray = $historys->getArrayBet();
        $insuranceArray = $historys->getArrayInsurance();
        $dblArray = $historys->getArrayDbl();
        $surrenderArray = $historys->getArraySurrender();
        $totalCards = $historys->getArrayCards();
        $cards = array();
        $totalSplitArray = array();
            foreach ($totalCards as $keyP2 => $valP2)
            {
                foreach ($valP2 as $keyP => $valP)
                {
                    foreach ($valP as $key => $val)
                    {
                        if ($val != 0){
                            if ($keyP == 1){
                                $totalSplitArray[$keyP2] = $totalBetArray[$keyP2] ;    
                            }else{
                                //$totalSplitArray[$keyP2] = 0;
                            }
        
                            if ($val > 128){
                                $cartRank = $val - 128;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                    
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "pika"  ); // pika Spades
                            }elseif ($val > 64){
                                $cartRank = $val - 64;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "kupa"  ); //kupa Hearts"
                             }elseif ($val > 32){
                                $cartRank = $val - 32;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "karo"  ); //karo Diamonds
                            }else {
                                $cartRank = $val - 16;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "spatiq"  );  //spatiq Clubs
                            }    
                        }
            
            
                    }
                }
            }    
       
        
        //var_dump($insuranceArray);
        $totalDblArray = array();
        foreach ($dblArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                    if (empty($totalDblArray[$key])){
                        $totalDblArray[$key] = $totalBetArray[$key];
                    }else{
                        $totalDblArray[$key] += $totalBetArray[$key];
                    }
                        
                    
                }
            }
            
        } 
        $totalSurrenderArray = array();
        foreach ($surrenderArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                        $totalSurrenderArray[$key] = $totalBetArray[$key] / 2;
                        $totalWinArray[$key] = 0 ;
                }
            }
            
        } //$surrenderArray 
        $totalInsuranceArray  = array();
        foreach ($insuranceArray as $key => $val){
            if ($val == 1){
                $totalInsuranceArray[$key] = $totalBetArray[$key] / 2;
            }
        }
        
        $totalWin = array_sum($totalWinArray) + array_sum($totalSurrenderArray) ;
        $totalBet = array_sum($totalBetArray) + array_sum($totalDblArray) + array_sum($totalInsuranceArray) + array_sum($totalSplitArray) ;
        $testPage = view('statistics.BJ_History', ['cards' => $cards, 'totalSeatIDArray' => $totalSeatIDArray, 'totalBetArray' => $totalBetArray, 'totalWinArray' => $totalWinArray, 'totalDblArray' => $totalDblArray, 'totalInsuranceArray' => $totalInsuranceArray, 'totalSplitArray' => $totalSplitArray, 'totalSurrenderArray' => $totalSurrenderArray ])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "dataRowID" => $totalSplitArray,
            "seatid" => $tableid,
            "tableidTime" => $tableidTime,
            "gameIDArrow" => $historys->game_seq  ,
            "totalBet" =>  number_format($totalBet / 100, 2),
            "totalWin" =>  number_format($totalWin / 100, 2),
            "html" => $testPage
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_nextPrevBJHistory(Request $request)
    {
        $dataRowTS = $request['rowTS'];
        $dataRowTable = $request['rowTable'];
        $dataRowNextPrev = $request['boxAttr'];
        $historyClas = new BlackjackGameHistory();
        $prevArrow = 1;
        $nextArrow = 1;
        if ($dataRowNextPrev == "Prev"){
            if ($historyClas->where('table_idx', $dataRowTable)->where('ts', '>', $dataRowTS)->count()){
                $dataRowTS = $historyClas->where('table_idx', $dataRowTable)->where('ts', '>', $dataRowTS)->orderBy('ts', 'asc')->first()->ts;
                if (!$historyClas->where('table_idx', $dataRowTable)->where('ts', '>', $dataRowTS)->count()){
                    $prevArrow = 0;
                }
            }
        }else{
            if ($historyClas->where('table_idx', $dataRowTable)->where('ts', '<', $dataRowTS)->count()){
                $dataRowTS = $historyClas->where('table_idx', $dataRowTable)->where('ts', '<', $dataRowTS)->orderBy('ts', 'desc')->first()->ts;
                if (!$historyClas->where('table_idx', $dataRowTable)->where('ts', '<', $dataRowTS)->count()){
                    $nextArrow = 0;
                }
            }    
        }
        
        $historys = $historyClas->where('ts', $dataRowTS)->first();
        //$tableid = "Table: " . ($historys->table_idx + 1) . ", Time: " . date("Y-m-d H:i:s", strtotime($historys->ts));
        $tableid = ($historys->table_idx + 1);
        $tableidTime = date("Y-m-d H:i:s", strtotime($historys->ts));
        
        $totalSeatIDArray = $historys->getArraySeat_id();
        $totalWinArray = $historys->getArrayWin();
        $totalBetArray = $historys->getArrayBet();
        $insuranceArray = $historys->getArrayInsurance();
        $dblArray = $historys->getArrayDbl();
        $surrenderArray = $historys->getArraySurrender();
        $totalCards = $historys->getArrayCards();
        $cards = array();
        $totalSplitArray = array();
            foreach ($totalCards as $keyP2 => $valP2)
            {
                foreach ($valP2 as $keyP => $valP)
                {
                    foreach ($valP as $key => $val)
                    {
                        if ($val != 0){
                            if ($keyP == 1){
                                $totalSplitArray[$keyP2] = $totalBetArray[$keyP2] ;    
                            }else{
                                //$totalSplitArray[$keyP2] = 0;
                            }
        
                            if ($val > 128){
                                $cartRank = $val - 128;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                    
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "pika"  ); // pika Spades
                            }elseif ($val > 64){
                                $cartRank = $val - 64;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "kupa"  ); //kupa Hearts"
                             }elseif ($val > 32){
                                $cartRank = $val - 32;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "karo"  ); //karo Diamonds
                            }else {
                                $cartRank = $val - 16;
                                if ($cartRank == 14) {
                                    $cartRank = "A";
                                }elseif ($cartRank == 13){
                                    $cartRank = "K";
                                }elseif ($cartRank == 12){
                                    $cartRank = "Q";
                                }elseif ($cartRank == 11){
                                    $cartRank = "J";
                                }
                                $cards[$keyP2][$keyP][$key] = array('val' => $val, 'cardRank' => $cartRank, 'cardSuit' => "spatiq"  );  //spatiq Clubs
                            }    
                        }
                    }
                }
            }    
       $totalDblArray = array();
        foreach ($dblArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                    if (empty($totalDblArray[$key])){
                        $totalDblArray[$key] = $totalBetArray[$key];
                    }else{
                        $totalDblArray[$key] += $totalBetArray[$key];
                    }
                }
            }
            
        } 
        $totalSurrenderArray = array();
        foreach ($surrenderArray as $key => $val){
            foreach ($val as $keySub => $valSub){
                if ($valSub == 1){
                    $totalSurrenderArray[$key] = $totalBetArray[$key] / 2;
                    $totalWinArray[$key] = 0 ;
                }
            }
            
        } //$surrenderArray
        $totalInsuranceArray  = array();
        foreach ($insuranceArray as $key => $val){
            if ($val == 1){
                $totalInsuranceArray[$key] = $totalBetArray[$key] / 2;
            }
        }
        
        $totalWin = array_sum($totalWinArray) + array_sum($totalSurrenderArray) ;
        $totalBet = array_sum($totalBetArray) + array_sum($totalDblArray) + array_sum($totalInsuranceArray) + array_sum($totalSplitArray) ;
        $testPage = view('statistics.BJ_History', ['cards' => $cards, 'totalSeatIDArray' => $totalSeatIDArray, 'totalBetArray' => $totalBetArray, 'totalWinArray' => $totalWinArray, 'totalDblArray' => $totalDblArray, 'totalInsuranceArray' => $totalInsuranceArray, 'totalSplitArray' => $totalSplitArray, 'totalSurrenderArray' => $totalSurrenderArray ])->render();
        
        $dataArray1 = array(
            "success" => "success",
            "prevArrow" => $prevArrow, 
            "nextArrow" => $nextArrow,
            "dataRowTS" => $dataRowTS,
            "seatid" => $tableid,
            "tableidTime" => $tableidTime,
            "gameIDArrow" => $historys->game_seq,
            "totalBet" =>  number_format($totalBet / 100, 2),
            "totalWin" =>  number_format($totalWin / 100, 2),
            "html" => $testPage
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function ajax_sortBJHistory(Request $request)
    {
        $historyClas = new BlackjackGameHistory();
        $dataFromGameTs = $request['FromGameTs'];
        $dataToGameTs = $request['ToGameTs'];
        $dataGameSort = $request['GameSort'];
        $dataTableSort = $request['TableSort'];
        if ($request['PSID'] == ""){
            $dataArray['PSID'] = 0;
        }else {
            $dataArray['PSID'] = $request['PSID'];
        }
        if ($request['FromGameBet'] == ""){
            $dataArray['FromGameBet'] = 0;
        }else {
            $dataArray['FromGameBet'] = $request['FromGameBet'] * 100;
        }
        if ($request['ToGameBet'] == "" ){
            $dataArray['ToGameBet'] = 0;
        }else{
            $dataArray['ToGameBet'] = $request['ToGameBet'] * 100;
        }
        
        if ($request['FromGameWin'] == ""){
            $dataArray['FromGameWin'] = 0;
        }else {
            $dataArray['FromGameWin'] = $request['FromGameWin'] * 100;
        }
        if ($request['ToGameWin'] == "" ){
            $dataArray['ToGameWin'] = 0;
        }else{
            $dataArray['ToGameWin'] = $request['ToGameWin'] * 100;
        }
        
        $SortQuery = array(); 
        if ($dataFromGameTs != ""){
             array_push ($SortQuery,['ts', '>=', $dataFromGameTs]);
        }
        if ($dataToGameTs != ""){
             array_push ($SortQuery,['ts', '<=', $dataToGameTs]);
        }
        if ($dataGameSort != ""){
             array_push ($SortQuery,['game_seq', '=', $dataGameSort]);
        }
        if ($dataTableSort != ""){
             array_push ($SortQuery,['table_idx','=', $dataTableSort - 1 ]);
        }
       
        
       
        $historys = BlackjackGameHistory::where($SortQuery)->get();
        $server_ps = ServerPs::orderBy('psid', 'asc')->get();
        $testPage = view('statistics.sortBJHistory', ['historys' => $historys, 'dataArray' => $dataArray])->render();
         
        $dataArray1 = array(
            "success" => "success",
            "html" => $testPage
        );
        
        return \Response::json($dataArray1, 200, [], JSON_PRETTY_PRINT);
    }
   
    public function export2excelBJ(Request $request)
    {
        if ($request['rowsPerPage']) {
            $page['rowsPerPage'] = $request['rowsPerPage'];
        
        } else {
            $page['rowsPerPage'] = 20;
        
        }
        if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'ts';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'desc';
        }
        if ($request['sortMenuOpen'] == 1 ) {
            $page['sortMenuOpen'] = 1;
        } else {
            $page['sortMenuOpen'] = 0;
        }
        $whereQuery ="";
        $SortQuery = array(); 
        if ($request['FromGameTs']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameTs']]);
            $whereQuery .= " and ts >= '" . $request['FromGameTs'] . "' ";
            $page['FromGameTs'] = $request['FromGameTs'];
        }else{
            $page['FromGameTs'] = "";
        }
        if ($request['ToGameTs']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameTs']]);
            $whereQuery .= " and ts <= '" . $request['ToGameTs'] . "' ";
            $page['ToGameTs'] = $request['ToGameTs'];
        }else{
            $page['ToGameTs'] = "";
        }
        if ($request['GameSort']){
            //array_push($SortQuery,['game_seq', '=', $request['GameSort']]);
            $whereQuery .= " and game_seq = '" . $request['GameSort'] . "' ";
            $page['GameSort'] = $request['GameSort'];
        }else{
            $page['GameSort'] = "";
        }
        if ($request['TableSort']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and table_idx = '" . ($request['TableSort'] - 1)  . "' ";
            $page['TableSort'] = $request['TableSort'];
        }else{
            $page['TableSort'] = "";
        }
        if ($request['PSID']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and (ps_id[1] = '" . ($request['PSID'])  . "' or ps_id[2] = '" . ($request['PSID'])  . "' or ps_id[3] = '" . ($request['PSID'])  . "' or ps_id[4] = '" . ($request['PSID'])  . "'  or ps_id[5] = '" . ($request['PSID'])  . "' ) ";
            $page['PSID'] = $request['PSID'];
        }else{
            $page['PSID'] = "";
        }
        if ($request['SeatID']){
            //array_push($SortQuery,['table_idx','=', $request['TableSort'] - 1 ]);
            $whereQuery .= " and (seat_id[1] = '" . ($request['SeatID'])  . "' or seat_id[2] = '" . ($request['SeatID'])  . "' or seat_id[3] = '" . ($request['SeatID'])  . "' seat ps_id[4] = '" . ($request['SeatID'])  . "'  or seat_id[5] = '" . ($request['SeatID'])  . "' ) ";
            //$whereQuery .= " and seat_id = '" . ($request['SeatID'])  . "' ";
            $page['SeatID'] = $request['SeatID'];
        }else{
            $page['SeatID'] = "";
        }
        if ($request['FromGameBet']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameBet']]);
            $whereQuery .= " and (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END) )   >= '" . ($request['FromGameBet'] * 100) . "' ";
            $page['FromGameBet'] = $request['FromGameBet'];
        }else{
            $page['FromGameBet'] = "";
        }
        if ($request['ToGameBet']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameWin']]);
            $whereQuery .= " and (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END) ) <= '" . ($request['ToGameBet'] * 100) . "' ";
            $page['ToGameBet'] = $request['ToGameBet'];
        }else{
            $page['ToGameBet'] = "";
        }
        if ($request['FromGameWin']){
            //array_push($SortQuery,['ts', '>=', $request['FromGameWin']]);
            $whereQuery .= " and (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5])   >= '" . ($request['FromGameWin'] * 100) . "' ";
            $page['FromGameWin'] = $request['FromGameWin'];
        }else{
            $page['FromGameWin'] = "";
        }
        if ($request['ToGameWin']){
            //array_push($SortQuery,['ts', '<=', $request['ToGameWin']]);
            $whereQuery .= " and (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5]) <= '" . ($request['ToGameWin'] * 100) . "' ";
            $page['ToGameWin'] = $request['ToGameWin'];
        }else{
            $page['ToGameWin'] = "";
        }
        
        $historyCount = DB::connection('pgsql5')->select('SELECT count(h.ts) FROM game_history as h WHERE 1 = 1'. $whereQuery . ' ');
        foreach ($historyCount as $countVal){
            $countVal1 = $countVal->count ;
        }
        if ($historyCount){
            if ($request['page']) {
                $page['current'] = $request['page'];
        
            } else {
                $page['current'] = 1;
        
            }
                $lastPage = $countVal1 / $page['rowsPerPage'] + 1 ;
                //var_dump($countVal1);
                //$lastPage = 1 ;
                $page['last'] = ceil($lastPage);
                $page['StartAt'] = $page['rowsPerPage'] * ($page['current'] - 1);
        }else{
             $page['current'] = 1;
             $page['last'] = 1;
             $page['StartAt'] = 0;
        }
        
        
        $historyClas = new BlackjackGameHistory();
        
        $historys = DB::connection('pgsql5')->select('
                SELECT h.* , 
                    ps_id[1] as ps_id1,
                    ps_id[2] as ps_id2,
                    ps_id[3] as ps_id3,
                    ps_id[4] as ps_id4,
                    ps_id[5] as ps_id5,
                    seat_id[1] as seat_id1,
                    seat_id[2] as seat_id2,
                    seat_id[3] as seat_id3,
                    seat_id[4] as seat_id4,
                    seat_id[5] as seat_id5,
                    (h.win[1] + h.win[2] + h.win[3] + h.win[4]  + h.win[5]) as total_win,
                    (h.bet[1] + h.bet[2] + h.bet[3] + h.bet[4]  + h.bet[5] + 
                    (CASE WHEN (insurance[1] = 1) then (h.bet[1] / 2) else 0 END) + 
                    (CASE WHEN (insurance[2] = 1) then (h.bet[2] / 2) else 0 END) +
                    (CASE WHEN (insurance[3] = 1) then (h.bet[3] / 2) else 0 END) +
                    (CASE WHEN (insurance[4] = 1) then (h.bet[4] / 2) else 0 END) +
                    (CASE WHEN (insurance[5] = 1) then (h.bet[5] / 2) else 0 END) +
                    (CASE WHEN (dbl[1][1] = 1) then h.bet[1] else 0 END) + (CASE WHEN (dbl[1][2] = 1) then h.bet[1] else 0 END) +
                    (CASE WHEN (dbl[2][1] = 1) then h.bet[2] else 0 END) + (CASE WHEN (dbl[2][2] = 1) then h.bet[2] else 0 END) +
                    (CASE WHEN (dbl[3][1] = 1) then h.bet[3] else 0 END) + (CASE WHEN (dbl[3][2] = 1) then h.bet[3] else 0 END) +
                    (CASE WHEN (dbl[4][1] = 1) then h.bet[4] else 0 END) + (CASE WHEN (dbl[4][2] = 1) then h.bet[4] else 0 END) +
                    (CASE WHEN (dbl[5][1] = 1) then h.bet[5] else 0 END) + (CASE WHEN (dbl[5][2] = 1) then h.bet[5] else 0 END) +
                    (CASE WHEN (cards[1][2][1] = 0) then 0 else h.bet[1] END) +
                    (CASE WHEN (cards[2][2][1] = 0) then 0 else h.bet[2] END) +
                    (CASE WHEN (cards[3][2][1] = 0) then 0 else h.bet[3] END) +
                    (CASE WHEN (cards[4][2][1] = 0) then 0 else h.bet[4] END) +
                    (CASE WHEN (cards[5][2][1] = 0) then 0 else h.bet[5] END)
                    ) as total_bet
                FROM game_history as h
                WHERE 1 = 1'. $whereQuery . '
                ORDER BY ' . $page['OrderQuery'] . ' '.$page['OrderDesc'].' 
                LIMIT '.$page['rowsPerPage'].' OFFSET '. $page['StartAt'] . '    
                ');
        $export = array();
        foreach ($historys as $key => $history) {
            $export[$key] = array(
                'Time' => $history->ts, 
                'Game #' => $history->game_seq,
                'Table ID ' => $history->table_idx + 1,
                'Ps ID' =>  ($history->ps_id1 . ', ' . $history->ps_id2 . ', ' . $history->ps_id3 . ', ' . $history->ps_id4 . ', ' . $history->ps_id5), 
                'Seat ID' => ($history->seat_id1 . ', ' . $history->seat_id2 . ', ' . $history->seat_id3 . ', ' . $history->seat_id4 . ', ' . $history->seat_id5),
                'Total Bet' => $history->total_bet / 100 ,
                'Total Win' => $history->total_win / 100, 
            );
            
        }

        Excel::create('BJ Data', function($excel) use($export){
            $excel->sheet('BJ', function($sheet) use($export){
                $sheet->fromArray($export);
                $sheet->freezeFirstRow();
                $sheet->setFontFamily('Liberation Sans');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);
            });
        })->export('xls');
    }
   
    //End BJ
    
   
    
    
   
    
}
