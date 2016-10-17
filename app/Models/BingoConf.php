<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BingoConf extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'mainconf';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}
