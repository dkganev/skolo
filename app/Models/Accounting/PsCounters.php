<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;
use Smiarowski\Postgres\Model\Traits\PostgresArray;

class PsCounters extends Model
{
    use PostgresArray;

    protected $table = 'ps_counters';

    public $timestamps = false;
    
    public $incrementing = false;

    protected $guarded = [];
    
    public function server_ps()
    {
        return $this->belongsTo(ServerPs::class, 'psid', 'psid');
    }

    public function setCounters(array $counters)
    {
        $this->counter = self::mutateToPgArray($counters);
    }

    // Get All  Counters
    public function getCounters()
    {
        $counters = $this->counter;
        // Checks for prefix in postgres arrays 
        $type = strpos($counters, '[0:256]');
        // If there is prefix, remove it
        if($type !== false)
        {
            $arr = explode('=', $counters);
            $counters = $arr[1];
        }
        //Parse psql to php array
        return self::accessPgArray($counters);
    }

    // Total In  - (0x000b + 0x0017 + 0x0015)
    //                11   +  23    + 21
    public function totalIn()
    {
        $counters = $this->getCounters();
        $sum = 0;
        // Counters Indexes 
        $keys = [11, 23, 21];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

    // Total Out - (0x0002 + 0x0003 + 0x0016 + 0x0018) 
    //              2      +   3    +  22    +  24
    public function totalOut()
    {
        $counters = $this->getCounters();
        $sum = 0;
        // Counters Indexes 
        $keys = [2, 3, 22, 24];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

    // Total Out
    public function totalBet()
    {
        return $this->getCounters()[0];
    }

    // Total Win - 0x0022
    // Total Win - 34
    public function totalWin()
    {
        $counters = $this->getCounters();
        $sum = 0;
        // Counters Indexes
        $keys = [34];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

    // Total Credit - index 12
    public function totalCredit()
    {
        $counters = $this->getCounters();
        $sum = 0;
        // Counters Indexes
        $keys = [12];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

}
