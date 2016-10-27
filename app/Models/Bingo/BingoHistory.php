<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class BingoHistory extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'history';
        //protected $primaryKey = 'psid';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
        
        public function BingoWins_History()
	{
                return $this->hasMany(BingoWins_History::class, 'bingo_seq', 'bingo_seq');
	}
	
}