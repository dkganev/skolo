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
        
        use PostgresArray;
    
   
    public function getArrayCards()
    {
        return self::accessPgArray($this->cards);
    }
    
    public function getArrayWin()
    {
        return self::accessPgArray($this->win);
    }
    
    public function getArrayBet()
    {
        return self::accessPgArray($this->bet);
    }
    
    public function getArrayDbl()
    {
        return self::accessPgArray($this->dbl);
    }
<<<<<<< HEAD
    
    public function getArraySurrender()
    {
        return self::accessPgArray($this->surrender);
    }
    
    public function getArrayInsurance()
    {
        return self::accessPgArray($this->insurance);
    }
    
}

=======
	
}
>>>>>>> 9fc3bc027e779d0c5c81fcf28fae020830e4f034
