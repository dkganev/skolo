<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
    	return view('settings.users');
    }
}
