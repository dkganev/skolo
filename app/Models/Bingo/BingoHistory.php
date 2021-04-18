<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class BingoHistory extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
        
    public function BingoWins_History()
	{
		return $this->hasMany(BingoWins_History::class, 'unique_game_seq', 'unique_game_seq');
	}
    public function BingoWins_HistorySum()
	{
		return $this->hasMany(BingoWins_History::class, 'unique_game_seq', 'unique_game_seq')->sum('win_val');
	}
}