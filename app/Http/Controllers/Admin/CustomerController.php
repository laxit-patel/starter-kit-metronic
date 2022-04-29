<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('is_admin',0)->get(['id','name','email']);
            return DataTables::of($data)->toJson();
        }
        return view('admin.customer.index');
    }

    public function profile(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.customer.profile',compact('user'));
    }
}
