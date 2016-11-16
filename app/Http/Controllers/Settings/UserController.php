<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Cms\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
		return view('settings.users', compact('users'));
	}
}