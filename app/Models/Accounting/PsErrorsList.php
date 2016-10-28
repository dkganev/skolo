<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class PsErrorsList extends Model
{
    protected $table = 'ps_errors_list';

    public $timestamps = false;
	
    public $primaryKey = 'err_code';
    
    public $incrementing = false;

    protected $guarded = [];
    
    public function err_lvl()
    {
		return $this->belongsTo(PsErrorLevels::class, 'err_level', 'err_level');
    }
}