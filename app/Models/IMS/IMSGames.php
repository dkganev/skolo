<?php  

namespace App\Models\IMS;

use Illuminate\Database\Eloquent\Model;

class IMSGames extends Model
{
	protected $connection = 'pgsql7';

	protected $table = 'games';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}