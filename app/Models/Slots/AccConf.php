<?php

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class AccConf extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'acc_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}