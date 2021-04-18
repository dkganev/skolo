<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class ClientGameIds extends Model
{
	protected $table = 'client_game_ids';

	public $timestamps = false;
	
	protected $primaryKey = 'client_game_id';
	
	public $incrementing = false;

	protected $guarded = [];
	
	public function games()
	{
		return $this->hasMany(Games::class, 'client_game_id','client_game_id');
	}
}