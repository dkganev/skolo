<?php

namespace App\Models\Accounting;

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

	public function isOffline()
	{
		return ! $this->ps_status->bonline;
	}

	public function waitsForAttendant()
	{
		return $this->ps_status->attendant;
	}

	public function hasErrors()
	{
		return $this->ps_status->active_errors === '{}' ? false : true;
	}

	public function isFree()
	{
		if(!$this->isOffline() && !$this->waitsForAttendant() && !$this->hasErrors() && $this->ps_status->current_credit === 0) {
			return true;
		}
		return false;
	}

	public function isActive()
	{
		if(!$this->isOffline() && !$this->waitsForAttendant() && !$this->hasErrors() && $this->ps_status->current_credit > 0) {
			return true;
		}
		return false;
	}
}
