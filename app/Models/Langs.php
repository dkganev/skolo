<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langs extends Model
{
    protected $table = 'langs';

    public $timestamps = false;
	
	protected $primaryKey = 'langid';
	
    public $incrementing = false;
}
