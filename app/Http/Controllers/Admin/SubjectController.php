<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Subject::get(['id','name','description','course','created_at']);  
            $course = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'description' => $data->description,
                    'course' => $data->getCourse->name,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($course)->toJson();
        }
        return view('admin.subject.index');
    }
}
