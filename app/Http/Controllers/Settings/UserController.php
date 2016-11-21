<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests;
use App\Models\Cms\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
        $roles = Role::all();
		return view('settings.users', compact('users', 'roles'));
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
        $user->assignRole($request->role);

    	$response = 'User Created';
    	return response()->json($response, 200);
	}

    public function edit(Request $request)
    {
        $user = User::find($request->id);   
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->syncRoles($request->role);
        $user->update();

        $response = 'User Created';
        return response()->json($response, 200);
    }
}