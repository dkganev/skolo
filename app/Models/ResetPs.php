<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPs extends Model
{
	protected $table = 'reset_ps';

	public $timestamps = false;
	
	protected $primaryKey = 'psid';
	
    public $incrementing = false;
}