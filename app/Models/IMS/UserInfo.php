<?php

namespace App\Models\IMS;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'user_info';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}
