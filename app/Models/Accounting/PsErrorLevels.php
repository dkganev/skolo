<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class PsErrorLevels extends Model
{
    protected $table = 'ps_error_levels';

    public $timestamps = false;
	
    public $primaryKey = 'err_level';
    
    public $incrementing = false;

    protected $guarded = [];
    
    public function error_list()
    {
    	return $this->hasMany('App\Models\Accounting\PsErrorsList', 'err_level');
    }
}
