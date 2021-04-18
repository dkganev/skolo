<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Casinos extends Model
{
    protected $table = 'casinos';

	public $timestamps = false;
	
	protected $primaryKey = 'casinoid';
	
    public $incrementing = false;

    protected $guarded = [];
    
    public function server_ps()
    {
    	return $this->hasMany(ServerPs::class, 'casinoid', 'casinoid');
    }
}
