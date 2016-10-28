<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'playlist';

	protected $primaryKey = 'idx';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
}

