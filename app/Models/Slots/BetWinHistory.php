<?php

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class BetWinHistory extends Model
{
	protected $connection = 'pgsql107';

	protected $table = 'bet_win_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}