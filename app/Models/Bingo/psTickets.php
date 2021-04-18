<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class psTickets extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'ps_tickets';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}


