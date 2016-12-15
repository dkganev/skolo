<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Excel;
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
        $this->validate($request, [
            'name' => 'required|min:5|max:15',
            'phone' => 'required|min:8|max:15'
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;

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

    public function export_users()
    {
        $export = User::all();

        Excel::create('Users Data', function($excel) use($export){

            $excel->sheet('Users', function($sheet) use($export){
                $sheet->fromArray($export);

                $sheet->setFontFamily('Verdana');
                $sheet->setFontSize(10);
                $sheet->row(1, function ($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->setBorder('A1', 'thin');
                $sheet->setHeight(1, 20);

            });
        })->export('xls');
    }
}