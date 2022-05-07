<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $user = User::where('is_admin',1)->get(['id','name','email','created_at']);
            $data = $user->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($data)->toJson();
        }
        return view('admin.user.index');
    }

    public function create(Request $request)
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | unique:users',
            'password' => 'required',
        ]);
        
        $user_id = Str::uuid()->toString();
        $user = new User();
        
        $user->fill($request->all());
        $user->id = $user_id;
        $user->is_admin = '1';
        $user->password = Hash::make($request->password);
        $user->save();

        //retrieve intance for role assignment
        $obj = User::where('id',$user_id)->first();
        $role = Role::findById($request->role);
        $obj->assignRole($role->name);

        return redirect()->route('admin.user')->with('inserted','User Created & Role Assigned 👍');
    }

    public function profile(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.user.profile',compact('user'));
    }

    public function checkEmail(Request $request)
    {
        if($request->email){
            $request->validate([
                'email' => 'email | required | unique:users',  
            ]);
        }else{
            return false;
        } 
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'email' => 'email | required | unique:users,email'
        ]);

        $user = User::find($request->user);

        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success','Email Updated Successsfully`');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user')->with('Deleted','User Deleted 👍');
    }

}
