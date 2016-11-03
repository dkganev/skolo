<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class GameState extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'game_state';

	protected $primaryKey = 'table_idx';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];

	public function blackjack_table()
	{
		return $this->belongsTo(BlackjackTable::class);
	}
}