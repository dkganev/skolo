<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BingoWins_History extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'wins_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}