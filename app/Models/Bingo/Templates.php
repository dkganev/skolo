<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'templates';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}

