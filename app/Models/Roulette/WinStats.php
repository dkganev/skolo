<?php

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class WinStats extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'win_stats';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}