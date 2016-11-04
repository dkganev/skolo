<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class BlackjackTable extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'tableconf';

	protected $primaryKey = 'table_id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];

	public function game_state()
	{
		return $this->hasOne(GameState::class, 'table_idx', 'table_id');
	}
}