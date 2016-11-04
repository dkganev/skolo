<?php  

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class WheelConfig extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'wheel_conf';

	protected $primaryKey = 'wheeltype';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}