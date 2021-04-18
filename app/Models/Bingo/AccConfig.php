<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class AccConfig extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'acc_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}