<?php

namespace App\Models\Roulette\Roulette2;

use Illuminate\Database\Eloquent\Model;

class MainConfig extends Model
{
	protected $connection = 'pgsql6';

	protected $table = 'mainconf';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}