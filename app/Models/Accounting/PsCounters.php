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

    // all counters
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

    // Total In
    public function totalIn()
    {
        $counters = $this->getCounters();
        $sum = 0;

        // Counters Indexes // Keys are -1 indexed
        $keys = [199, 20, 12];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

    // Total Out
    public function totalOut()
    {
        $counters = $this->getCounters();
        $sum = 0;

        // Counters Indexes
        $keys = [202, 21, 23];
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

    // Total Win
    public function totalWin()
    {
        $counters = $this->getCounters();
        $sum = 0;

        // Counters Indexes
        $keys = [27, 28, 29];
        foreach ($keys as $key)
        {
          $sum += $counters[$key];
        }

        return $sum;
    }

    // Total Credit
    public function totalCredit()
    {
        $totalCredit = $this->totalIn() + $this->totalWin() - $this->totalOut() - $this->totalBet();

        return abs($totalCredit);
    }

}
