<?php  

namespace App\Models\Slots;

use Illuminate\Database\Eloquent\Model;

class PsConf extends Model
{
	protected $connection = 'pgsql107';

	protected $table = 'psconf';

	protected $primaryKey = 'ps_id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}