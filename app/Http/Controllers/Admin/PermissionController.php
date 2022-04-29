<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Permission::all();
            return DataTables::of($data)->toJson();
        }
        return view('admin.permission.index');
    }

    public function store(Request $request)
    {
        $request->validate(['permission_name' => 'required']);

        try {
            Permission::create(['name' => $request->permission_name]);
        } catch (\Throwable $th) {
            return back()->withErrors('Permission Already Exist 👎');
        }

        return redirect()->route('admin.permission')->with('success','Permission Added');
    }

    public function delete($id)
    {
        Permission::findById($id)->delete();
        return redirect()->route('admin.permission')->with('deleted','Permission Deleted');
    }
}
