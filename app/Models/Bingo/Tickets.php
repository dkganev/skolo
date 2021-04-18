<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'tickets';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}


