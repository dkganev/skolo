<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests;
use App\Models\Cms\User;
use App\Models\Cms\CmsLangs;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
        $roles = Role::all();
        $CmsLangs = CmsLangs::get();
    return view('settings.users', compact('users', 'roles', 'CmsLangs') );  //['historys' => $historys, 'page' => $page ] compact('users', 'roles') ['users' => $users, 'roles' => $roles, 'CmsLangs' => $CmsLangs]
	}

	public function store(Request $request)
    {
    	$user = new User;
    	$user->name = $request->username;
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->phone = $request->phone;
    	$user->password = bcrypt($request->password);
        $user->lang_id = $request->Language;
    	$user->save();
        $user->assignRole($request->role);

    	$response = 'User Created';
    	return response()->json($response, 200);
	}

    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:15',
            'phone' => 'required|min:8|max:15'
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->lang_id = $request->Language;

        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->syncRoles($request->role);
        $user->update();

        $response = 'User Created';
        return response()->json($response, 200);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if($user->delete()) {
            return response()->json(['msg' => 'User removed from records!'], 200);
        }
    }
}