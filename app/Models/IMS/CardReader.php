<?php

namespace App\Models\IMS;

use Illuminate\Database\Eloquent\Model;

class CardReader extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'card_reader';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}