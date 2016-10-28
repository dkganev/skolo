<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'templates';

	protected $primaryKey = 'template_id';

	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];
	
	public function template_games()
	{
		return $this->hasMany(TemplateGames::class, 'template_id', 'template_id');
	}
}

