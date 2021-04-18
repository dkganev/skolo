<?php

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class Cachelog extends Model
{
	protected $connection = 'pgsql107';

	protected $table = 'cachelog';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}