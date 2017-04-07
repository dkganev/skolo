<?php

namespace App\Http\Controllers\Statistics;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Models\Accounting\PsCounters;
//use App\Models\Accounting\Casinos;
//use App\Models\Accounting\Games;
//use App\Models\Bingo\BingoHistory;
//use App\Models\Bingo\BingoWins_History;
//use App\Models\Bingo\BingoPurchase_History;
//use App\Models\Bingo\BingoBall_History;
//use App\Models\Bingo\Tickets;
//use App\Models\Bingo\psTicketsArchive;
//use App\Models\Bingo\psTickets;
//use App\Models\Accounting\ServerPs;
//use App\Models\Roulette\GameHistory;
//use App\Models\Roulette\WinStats;
//use App\Models\Blackjack\BlackjackGameHistory;
//use Smiarowski\Postgres\Model\Traits\PostgresArray;
use Excel;

class PsAccounting extends Controller
{
    public function psAccounting_index(Request $request)
    {
        session(['last_page' => 'statistics/psAccounting']);
        session(['last_menu' => 'menuPsAccounting']);
        
        /*if ($request['OrderQuery']) {
            $page['OrderQuery'] = $request['OrderQuery'];
        } else {
            $page['OrderQuery'] = 'psid';
        }
        if ($request['OrderDesc']) {
            $page['OrderDesc'] = $request['OrderDesc'];
        } else {
            $page['OrderDesc'] = 'asc';
        }*/
        $curentDate = date("Y-m-d");
        if ($request['startDate']) {
            $page['startDate'] = $request['startDate'];
            $startDate = $page['startDate'];
        } else {
            $page['startDate'] = $curentDate . " 00:00" ;
            $startDate = $page['startDate'];//'2017-04-05';
        }
        if ($request['endDate']) {
            $page['endDate'] = $request['endDate'];
            $endDate = $page['endDate'] ;
        } else {
            $page['endDate'] = $curentDate . " 24:00" ;
            $endDate = $page['endDate'] ; //'2017-04-06';
        }
        
        
        $counters = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid
                FROM ps_counters_history as c
                WHERE timestamp >= '" . $startDate . "' AND timestamp <= '" . $endDate . "'
                GROUP BY psid
                ORDER BY psid asc
        ");
        $psAccounting = array();
        $totals = array();
        $totals['totalIn'] = 0;
        $totals['totalOut'] = 0;
        $totals['totalBet'] = 0;
        $totals['totalWin'] = 0;
        $totals['totalCredit'] = 0;
        foreach($counters as $counter) {
            $countersMin = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid,
                    (SELECT sps.dallasid FROM server_ps as sps WHERE sps.psid = c.psid ) as dallasid,
                    (c.counter[11] + c.counter[21] + c.counter[23] )  as total_in, 
                    (c.counter[2] + c.counter[3] + c.counter[22] + c.counter[24] )  as total_out, 
                    c.counter[0]  as total_bet, 
                    c.counter[34] as total_win, 
                    c.counter[12] as total_credit 
                FROM ps_counters_history as c
                WHERE timestamp >= '" . $startDate . "' AND psid = " . $counter->psid  . " 
                ORDER BY timestamp asc
                LIMIT 1
            ");
            
            $countersMax = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid,
                    (c.counter[11] + c.counter[21] + c.counter[23] )  as total_in, 
                    (c.counter[2] + c.counter[3] + c.counter[22] + c.counter[24] )  as total_out, 
                    c.counter[0]  as total_bet, 
                    c.counter[34] as total_win, 
                    c.counter[12] as total_credit 
                FROM ps_counters_history as c
                WHERE timestamp <= '" . $endDate . "' AND psid = " . $counter->psid  . " 
                ORDER BY timestamp desc
                LIMIT 1
            ");
            $psAccounting[$counter->psid]['psid'] = $counter->psid ;
            $psAccounting[$counter->psid]['dallasid'] = $countersMin[0]->dallasid ;
            $psAccounting[$counter->psid]['total_in'] = $countersMax[0]->total_in - $countersMin[0]->total_in ;
            $psAccounting[$counter->psid]['total_out'] = $countersMax[0]->total_out - $countersMin[0]->total_out ;
            $psAccounting[$counter->psid]['total_bet'] = $countersMax[0]->total_bet - $countersMin[0]->total_bet ;
            $psAccounting[$counter->psid]['total_win'] = $countersMax[0]->total_win - $countersMin[0]->total_win ;
            $psAccounting[$counter->psid]['total_credit'] = $countersMax[0]->total_credit - $countersMin[0]->total_credit ;
            $totals['totalIn'] += $psAccounting[$counter->psid]['total_in'];
            $totals['totalOut'] += $psAccounting[$counter->psid]['total_out'];
            $totals['totalBet'] += $psAccounting[$counter->psid]['total_bet'];
            $totals['totalWin'] += $psAccounting[$counter->psid]['total_win'];
            $totals['totalCredit'] += $psAccounting[$counter->psid]['total_credit'];
        }
        
        
        /*
        $counters = DB::connection('pgsql')->select(' 
                SELECT
                    c.psid as psid,
                    c.counter as counter,
                    (SELECT sps.dallasid FROM server_ps as sps WHERE sps.psid = c.psid ) as dallasid,
                    (c.counter[11] + c.counter[21] + c.counter[23] )  as total_in, 
                    (c.counter[2] + c.counter[3] + c.counter[22] + c.counter[24] )  as total_out, 
                    c.counter[0]  as total_bet, 
                    c.counter[34] as total_win, 
                    c.counter[12] as total_credit 
                FROM ps_counters_history as c
                WHERE timestamp > \'2017-04-05\' AND timestamp < \'2017-04-06\'
                ORDER BY '. $page['OrderQuery'].' '.$page['OrderDesc'].' 
        ');*/
        //$counters = PsCounters::orderBy($page['OrderQuery'], $page['OrderDesc'])->get();
        //$counters = PsCounters::orderBy('psid', 'asc')->get();

        

        
        
        //return var_dump($psAccounting);
        return view('statistics.psAccounting', ['counters' => $psAccounting , 'totals' => $totals, 'page' => $page ]);
    }
    
    
    public function export2excelPsAccounting(Request $request)
    {
        $curentDate = date("Y-m-d");
        if ($request['startDate']) {
            $page['startDate'] = $request['startDate'];
            $startDate = $page['startDate'];
        } else {
            $page['startDate'] = $curentDate . " 00:00" ;
            $startDate = $page['startDate'];//'2017-04-05';
        }
        if ($request['endDate']) {
            $page['endDate'] = $request['endDate'];
            $endDate = $page['endDate'] ;
        } else {
            $page['endDate'] = $curentDate . " 24:00" ;
            $endDate = $page['endDate'] ; //'2017-04-06';
        }
        
        
        $counters = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid
                FROM ps_counters_history as c
                WHERE timestamp >= '" . $startDate . "' AND timestamp <= '" . $endDate . "'
                GROUP BY psid
                ORDER BY psid asc
        ");
        $psAccounting = array();
        $totals = array();
        $totals['totalIn'] = 0;
        $totals['totalOut'] = 0;
        $totals['totalBet'] = 0;
        $totals['totalWin'] = 0;
        $totals['totalCredit'] = 0;
        foreach($counters as $counter) {
            $countersMin = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid,
                    (SELECT sps.dallasid FROM server_ps as sps WHERE sps.psid = c.psid ) as dallasid,
                    (c.counter[11] + c.counter[21] + c.counter[23] )  as total_in, 
                    (c.counter[2] + c.counter[3] + c.counter[22] + c.counter[24] )  as total_out, 
                    c.counter[0]  as total_bet, 
                    c.counter[34] as total_win, 
                    c.counter[12] as total_credit 
                FROM ps_counters_history as c
                WHERE timestamp >= '" . $startDate . "' AND psid = " . $counter->psid  . " 
                ORDER BY timestamp asc
                LIMIT 1
            ");
            
            $countersMax = DB::connection('pgsql')->select(" 
                SELECT
                    c.psid as psid,
                    (c.counter[11] + c.counter[21] + c.counter[23] )  as total_in, 
                    (c.counter[2] + c.counter[3] + c.counter[22] + c.counter[24] )  as total_out, 
                    c.counter[0]  as total_bet, 
                    c.counter[34] as total_win, 
                    c.counter[12] as total_credit 
                FROM ps_counters_history as c
                WHERE timestamp <= '" . $endDate . "' AND psid = " . $counter->psid  . " 
                ORDER BY timestamp desc
                LIMIT 1
            ");
            $psAccounting[$counter->psid]['psid'] = $counter->psid ;
            $psAccounting[$counter->psid]['dallasid'] = $countersMin[0]->dallasid ;
            $psAccounting[$counter->psid]['total_in'] = $countersMax[0]->total_in - $countersMin[0]->total_in ;
            $psAccounting[$counter->psid]['total_out'] = $countersMax[0]->total_out - $countersMin[0]->total_out ;
            $psAccounting[$counter->psid]['total_bet'] = $countersMax[0]->total_bet - $countersMin[0]->total_bet ;
            $psAccounting[$counter->psid]['total_win'] = $countersMax[0]->total_win - $countersMin[0]->total_win ;
            $psAccounting[$counter->psid]['total_credit'] = $countersMax[0]->total_credit - $countersMin[0]->total_credit ;
            $totals['totalIn'] += $psAccounting[$counter->psid]['total_in'];
            $totals['totalOut'] += $psAccounting[$counter->psid]['total_out'];
            $totals['totalBet'] += $psAccounting[$counter->psid]['total_bet'];
            $totals['totalWin'] += $psAccounting[$counter->psid]['total_win'];
            $totals['totalCredit'] += $psAccounting[$counter->psid]['total_credit'];
        }
        
        $export = array();
        foreach ($psAccounting as $key => $val) {
            $export[$key] = array(
                'PS ID' => $val['psid'], 
                'Dallas ID' => $val['dallasid'],
                'Total In' =>  $val['total_in']/100, 
                'Total Out' => $val['total_out']/100,
                'Total Bet' => $val['total_bet']/100,
                'Total Win' => $val['total_win']/100,
                'Total Credit' => $val['total_credit']/100
            );
            
        }
            $export[$key + 1] = array(
                'PS ID' => "", 
                'Dallas ID' => "Total",
                'Total In' =>  $totals['totalIn'] /100, 
                'Total Out' => $totals['totalOut'] / 100,
                'Total Bet' => $totals['totalBet'] / 100,
                'Total Win' => $totals['totalWin'] / 100,
                'Total Credit' => $totals['totalCredit'] / 100
            );
        
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

    }
}    