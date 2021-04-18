<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class SphereVaprel extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'sphere_vaprel';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}