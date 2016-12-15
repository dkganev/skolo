<?php

namespace App\Models\Cms;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CmsLangs extends Authenticatable
{
	protected $connection = 'pgsql2';

	public $timestamps = false;

	protected $table = 'langs';

	public $primaryKey = 'langid';

	public $incrementing = false;
}