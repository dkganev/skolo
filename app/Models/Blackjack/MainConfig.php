<?php

namespace App\Models\Blackjack;

use Illuminate\Database\Eloquent\Model;

class MainConfig extends Model
{
	protected $connection = 'pgsql5';

	protected $table = 'mainconf';

	protected $primaryKey = 'game_id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}