<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class BingoPsCounters extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'ps_counters';

	protected $primaryKey  = 'psid';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}