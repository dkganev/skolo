<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class MainConfig extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'mainconf';

	protected $primaryKey = null;

	public $timestamps = false;

	public $increments = false;

}
