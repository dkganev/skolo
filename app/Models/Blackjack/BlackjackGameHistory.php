<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;
use Smiarowski\Postgres\Model\Traits\PostgresArray;

class BlackjackGameHistory extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'game_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
    
    public function getSeat_ids()
    {
        $seat_ids = $this->seat_id;

        // Checks for prefix in postgres arrays 
        $type = strpos($seat_ids, '[0:256]');

        // If there is prefix, remove it
        if($type !== false)
        {
            $arr = explode('=', $seat_ids);
            $seat_ids = $arr[1];
        }

        //Parse psql to php array
        return self::accessPgArray($seat_ids);
    }

    public function totalWin()
    {
        $totalWinArray = $this->win;
        //   $totalWin = self::accessPgArray($this->win);
        
        //$sum = 0;

        // Counters Indexes
        //$keys = [27, 28, 29];
        //foreach ($keys as $key)
        //{
        //  $sum += $counters[$key];
        //}

        return  $totalWinArray;
    }
	
}

