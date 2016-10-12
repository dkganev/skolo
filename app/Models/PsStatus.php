<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PsStatus extends Model
{
	public $timestamps = false;

    protected $table = 'server_ps_status';

    public $incrementing = false;

    protected $primaryKey = 'psid'; 
    
    public function server_ps()
    {
    	return $this->belongsTo(ServerPs::class, 'psid', 'psid');
    }
}
