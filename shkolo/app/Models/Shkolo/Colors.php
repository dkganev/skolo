<?php

namespace App\Models\Shkolo;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $connection = 'mysql';

    protected $table = 'colors';
    
    protected $primaryKey = 'ID';

    protected $guarded = [];
}