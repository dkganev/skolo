<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class GameState extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'game_state';

	protected $primaryKey = null;

	public $timestamps = false;

	public $increments = false;
}
