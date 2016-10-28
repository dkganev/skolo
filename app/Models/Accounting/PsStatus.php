<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class PsStatus extends Model
{
	public $timestamps = false;

    protected $table = 'server_ps_status';

    public $incrementing = false;

    protected $primaryKey = 'psid'; 
    
    protected $guarded = [];

    public function server_ps()
    {
    	return $this->belongsTo(ServerPs::class, 'psid', 'psid');
    }
}