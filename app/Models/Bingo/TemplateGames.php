<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class TemplateGames extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'template_games';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
}

