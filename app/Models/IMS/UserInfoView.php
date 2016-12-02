<?php 

namespace App\Models\IMS;

use Illuminate\Database\Eloquent\Model;

class UserInfoView extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'user_info_view';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}

