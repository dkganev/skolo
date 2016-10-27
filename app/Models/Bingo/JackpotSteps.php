<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class JackpotSteps extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'jackpot_steps';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}