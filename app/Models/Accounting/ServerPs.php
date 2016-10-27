<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerPs extends Model
{
	protected $table = 'server_ps';

	public $timestamps = false;
	
	protected $primaryKey = 'psid';
	
    public $incrementing = false;

    protected $guarded = [];

	public function casino()
	{
		return $this->belongsTo(Casinos::class, 'casinoid', 'casinoid');
	}

	public function ps_settings()
	{
		return $this->hasOne(PsSettings::class, 'psid', 'psid');
	}

	public function ps_status()
	{
		return $this->hasOne(PsStatus::class, 'psid','psid');
	}

	public function ps_counters()
	{
		return $this->hasOne(PsCounters::class, 'psid', 'psid');
	}

	public function billing_config()
	{
		return $this->hasOne(BillingConfig::class, 'psid', 'psid');
	}

	public function ps_errors()
	{
		return $this->hasOne(PsErrors::class);
	}
}
