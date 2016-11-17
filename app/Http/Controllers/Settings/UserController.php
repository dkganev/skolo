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

	public function store(Request $request)
    {
    	$user = new User;
    	$user->name = $request->username;
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->phone = $request->phone;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	$response = 'User Created';
    	return response()->json($response, 200);
	}
}