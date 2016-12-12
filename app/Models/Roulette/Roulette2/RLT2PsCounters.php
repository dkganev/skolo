<?php

namespace App\Models\Roulette\Roulette2;

use Illuminate\Database\Eloquent\Model;

class RLT2PsCounters extends Model
{
	protected $connection = 'pgsql6';

	protected $table = 'ps_counters';

	protected $primaryKey = 'psid';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}