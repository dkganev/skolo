<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class BlackjackGameHistory extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'game_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}

