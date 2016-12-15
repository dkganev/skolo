<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

	public $timestamps = false;
	
	protected $primaryKey = 'idx';
	
    public $incrementing = false;

    protected $guarded = [];
    
    public function game()
    {
    	return $this->hasMany(Games::class, 'game_category', 'idx');
    }
}
