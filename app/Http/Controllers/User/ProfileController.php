<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\{Country, State, City, Profile};

class ProfileController extends Controller
{
    public function profile()
    {
        $countries = Country::get(["name", "id"]);
        return view('user.profile.profile',compact('countries'));
    }

    public function profileUpdate(Request $request)
    {
        $profile = new Profile(); // TODO get profile based on current logged in user

        $profile->phone = $request->phone;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->country = $request->country;
        $profile->address = $request->address;
        $profile->save();

        return redirect()->back()->with('updated','Details Updated👌');
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

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        auth()->logout();
        return redirect()->route('login')->with('success','Pasword Changed, You may login now');
    }
}
