<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class PsErrors extends Model
{
	protected $table = 'ps_errors';

  	public $timestamps = false;
	
    public $incrementing = false;

    protected $guarded = [];
    
    public function server_ps()
    {
    	return $this->belongsTo('App\Models\ServerPs', 'psid', 'psid');
    }
}
