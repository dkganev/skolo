<?php

namespace App\Models\Shkolo;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $connection = 'mysql';

    protected $table = 'Links';
    
    protected $primaryKey = 'ID';

    protected $guarded = [];
}