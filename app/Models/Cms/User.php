<?php

namespace App\Models\Cms;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

   	protected $connection = 'pgsql2';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function userRole()
    {
        $rep = ['["',  '"]'];

        return str_replace($rep,'' ,$this->roles()->pluck('name'));
    }
}