<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class BillTypes extends Model
{
	protected $table = 'bill_types';

	public $timestamps = false;

	public $increments = false;

	public $primaryKey = 'idtype';

	protected $guarded = [];
	
	public function billing_config()
	{
		return $this->hasOne(BillingConfig::class);
	}
}
