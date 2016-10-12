<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillTypes extends Model
{
	protected $table = 'bill_types';

	public $timestamps = false;

	public $increments = false;

	public $primaryKey = 'idtype';

	public function billing_config()
	{
		return $this->hasOne(BillingConfig::class);
	}
}
