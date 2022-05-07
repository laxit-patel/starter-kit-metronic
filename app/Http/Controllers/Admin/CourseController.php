<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Course::get(['id','name','description','created_at']);  
            $course = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'description' => $data->description,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($course)->toJson();
        }
        return view('admin.course.index');
    }

    public function fetchCourse(Request $request)
    {
        return response()->json(Course::find($request->course)->getBatch);
    }
}
