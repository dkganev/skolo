<?php

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class Historylog extends Model
{
	protected $connection = 'pgsql107';

	protected $table = 'historylog';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}