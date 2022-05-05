<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\{User,Profile};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('is_admin',0)->get(['id','name','email']);
            return DataTables::of($data)->toJson();
        }
        return view('admin.student.index');
    }

    public function profile(Request $request)
    {
        $student = User::find($request->id);
        $countries = Country::all();
        return view('admin.student.profile',compact('student','countries'));
    }

    public function create(Request $request)
    {
        $countries = Country::all();
        return view('admin.student.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | unique:users',
            'password' => 'required',
        ]);

        DB::transaction(function() use($request){
            $user_id = Str::uuid()->toString();

            $user = new User();
            $user->id = $user_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $profile = new Profile();
            $profile->user = $user_id;
            $profile->phone = $request->phone;
            $profile->dob = $request->dob;
            $profile->gender = $request->gender;
            $profile->country = $request->country;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->address = $request->address;
            $profile->save();
        });
        
        return redirect()->route('admin.student')->with('inserted','Student Created with Profile 👍');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $profile = Profile::where('user',$request->student)->get()->first();
        $profile->phone = $request->phone;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->country = $request->country;
        $profile->state = $request->state;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->save();
        
        return redirect()->back()->with('updated','Student Details Updated 👍');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'name' => 'required'
        ]);

        $user = User::find($request->user);

        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success','Name Updated Successsfully`');
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

        return redirect()->back()->with('success','Email Updated Successsfully');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.student')->with('success','Student Deleted');
    }
}
