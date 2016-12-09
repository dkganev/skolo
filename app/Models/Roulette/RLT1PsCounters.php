<?php

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class RLT1PsCounters extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'ps_counters';

	protected $primaryKey = 'psid';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}