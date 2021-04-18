<?php

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class AccConfig extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'acc_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}