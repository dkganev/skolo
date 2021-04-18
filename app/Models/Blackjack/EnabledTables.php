<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class EnabledTables extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'enabled_tables';

	protected $primaryKey = 'id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}