<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BingoBall_History extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'ball_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}

