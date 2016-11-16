<?php  

namespace App\Models\Roulette;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
	protected $connection = 'pgsql4';

	protected $table = 'game_history';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}