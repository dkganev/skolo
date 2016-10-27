<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TerminalPreviewDB2 extends Authenticatable
{
	protected $connection = 'pgsql2';

	public $timestamps = false;

	protected $table = 'PreviewTerminals';

	public $primaryKey = 'id';

	public $incrementing = false;
}