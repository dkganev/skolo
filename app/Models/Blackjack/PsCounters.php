<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class PsCounters extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'ps_counters';

	protected $primaryKey = 'psid';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}