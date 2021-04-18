<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class UserLogs extends Model
{
    protected $connection = 'pgsql2';

    protected $table = 'user_logs';

    protected $guarded = [];
}