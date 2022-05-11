<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $group = Group::all();  
            $data = $group->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'description' => $data->description,
                    'batch' => $data->getBatch->name,
                    'course' => $data->getBatch->getCourse->name,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($data)->toJson();
        }
        return view('admin.group.index');
    }
}
