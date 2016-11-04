<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bingo\Tickets;

class psTicketsArchive extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'ps_tickets_archive';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
        
        public function BingoWins_History()
	{
            return $this->hasMany(BingoWins_History::class, 'unique_game_seq', 'unique_game_seq');
	}
        public function BingoHistory()
	{
            return $this->hasOne(BingoHistory::class, 'unique_game_seq', 'unique_game_seq');
	}
	public function Tickets($ticketID)
	{
            //return $this->hasOne(BingoHistory::class, 'unique_game_seq', 'unique_game_seq');
            return Tickets::where('idx', $ticketID)->first()->content;
	}
}


