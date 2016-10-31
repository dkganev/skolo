<?php

namespace App\Models\Bingo;

use Illuminate\Database\Eloquent\Model;

class TemplateGames extends Model
{
	protected $connection = 'pgsql3';

	protected $table = 'template_games';

	protected $primaryKey = 'template_id';
	
	public $timestamps = false;

	public $increments = false;

	protected $guarded = [];

	public function template()
	{
		return $this->belongsTo(Template::class, 'template_id', 'template_id');
	}
}

