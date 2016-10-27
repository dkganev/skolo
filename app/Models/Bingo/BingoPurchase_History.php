<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class BingoPurchase_History extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'purchase_history';
        //protected $primaryKey = 'psid';

	//public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
        
        public function BingoWins_History()
	{
                return $this->hasMany(BingoWins_History::class, 'bingo_seq', 'bingo_seq');
	}
	
}