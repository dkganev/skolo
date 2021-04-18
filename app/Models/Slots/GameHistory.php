<?php

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
	protected $connection = 'pgsql107';

	protected $table = 'game_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}