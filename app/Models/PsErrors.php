<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PsErrors extends Model
{
	protected $table = 'ps_errors';

  	public $timestamps = false;
	
    public $incrementing = false;

    public function server_ps()
    {
    	return $this->belongsTo('App\Models\ServerPs', 'psid', 'psid');
    }
}
