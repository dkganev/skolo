<?php  

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class WheelSettings extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'wheel_settings';

	protected $primaryKey = 'interface';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];	
}