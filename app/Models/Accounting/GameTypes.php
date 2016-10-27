<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class GameTypes extends Model
{
    protected $table = 'gametypes';

    public $timestamps = false;
    
    protected $primaryKey = 'game_type';
    
    public $incrementing = false;

    protected $guarded = [];
    
    public function games()
    {
        return $this->hasMany(Games::class, 'game_type','game_type');
    }
}
