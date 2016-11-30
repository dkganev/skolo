<?php  

namespace App\Models\IMS;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'settings';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}