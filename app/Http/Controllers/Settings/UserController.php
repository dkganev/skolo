<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Excel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests;
use App\Models\Cms\User;
use App\Models\Cms\CmsLangs;
use App\Events\TerminalAdded;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'asc')->get();
        $roles = Role::all();
        //$CmsLangs = CmsLangs::get();
        return view('settings.users', compact('users', 'roles') );
        //return view('settings.users', compact('users', 'roles', 'CmsLangs') );  //['historys' => $historys, 'page' => $page ] compact('users', 'roles') ['users' => $users, 'roles' => $roles, 'CmsLangs' => $CmsLangs]
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'User Created', 2));
        return response()->json($response, 200);
	}

    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:15',
            'phone' => 'required|max:15'
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
        event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'User Updated', 2));
        return response()->json($response, 200);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        
        if($user->delete()) {
            event(new TerminalAdded(request()->ip(), request()->user()->name, NULL , 'User removed from records!', 2));
            return response()->json(['msg' => 'User removed from records!'], 200);
        }
    }

    public function export_users()
    {
        //$export = User::all();
        $users = User::orderBy('id', 'asc')->get();
        $roles = Role::all();
        $export = array();
        foreach ($users as $key => $val) {
            //$roles = Role::where() all();
            foreach($roles as $role) {
                if ($val->hasRole($role->name)){
                    $userRole =  $role->name ;
                }
            }
            
            $export[$key] = array(
                'Username' => $val->name, 
                'Full Name' => $val->fullName(), 
                'Role' => $userRole, 
                'Phone' => $val->phone
            );
            
        }
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