<?php  

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class PsConf extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'psconf';

	protected $primaryKey = 'ps_id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}