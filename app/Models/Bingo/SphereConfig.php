<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class SphereConfig extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'sphere_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}