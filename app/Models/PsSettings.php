<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Smiarowski\Postgres\Model\Traits\PostgresArray;

class PsSettings extends Model
{
	use PostgresArray;

	public $timestamps = false;
	
    protected $table = 'ps_settings';

    public $primaryKey = 'psid';
    
    public $incrementing = false; 

    public function server_ps()
    {
    	return $this->belongsTo(ServerPs::class, 'psid','psid');
    }

    public function setSubscribedGames(array $games)
	{
	    $this->subscribed = self::mutateToPgArray($games);
	}

	public function getGames()
	{
		$games = $this->subscribed;

		$postgresStr = trim($games,'{}');
		$gam = explode(',', $postgresStr);
		return $gam;
	}

}
