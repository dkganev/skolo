<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingConfig extends Model
{
    protected $table = 'billing_config';

    public $timestamps = false;
	
    public $incrementing = false; 

    protected $guarded = [];
    
    public function server_ps()
    {
    	return $this->belongsTo(ServerPs::class,'psid','psid');
    }

    public function bill_types()
    {
    	return $this->belongsTo(BillTypes::class, 'idtype', 'idtype');
    }
}
