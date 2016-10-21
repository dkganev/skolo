<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class MyBonus extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'my_bonus';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}
