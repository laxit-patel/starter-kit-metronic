<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile.profile');
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
}
