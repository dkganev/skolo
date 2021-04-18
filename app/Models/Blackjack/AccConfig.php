<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class AccConfig extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'acc_config';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}