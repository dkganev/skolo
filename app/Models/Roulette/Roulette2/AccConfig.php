<?php

namespace App\Models\Roulette\Roulette2;

use Illuminate\Database\Eloquent\Model;

class AccConfig extends Model
{
	protected $connection = 'pgsql6';

	protected $table = 'acc_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}