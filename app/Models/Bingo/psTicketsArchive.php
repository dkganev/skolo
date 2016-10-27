<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class psTicketsArchive extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'ps_tickets_archive';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}


