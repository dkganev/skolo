<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $table = 'games';

   	public $timestamps = false;

    protected $primaryKey = 'gameid';

	public $incrementing = false;

    protected $guarded = [];
    
    public function client_game_ids()
    {
    	return $this->belongsTo(ClientGameIds::class, 'client_game_id','client_game_id');
    }

    public function category()
    {
    	return $this->belongsTo(Categories::class,'game_category', 'idx');
    }

    public function type()
    {
        return $this->belongsTo(GameTypes::class, 'game_type', 'game_type');
    }
}
