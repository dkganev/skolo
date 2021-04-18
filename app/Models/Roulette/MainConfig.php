<?php

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class MainConfig extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'mainconf';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}