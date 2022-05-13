<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Test;
use App\Models\Course;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Test::get(['id','name','duration','created_at']);  
            $question = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'duration' => $data->duration,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($question)->toJson();
        }
        return view('admin.test.index');
    }

    public function create()
    {
        $subjects = Subject::all();
        $courses = Course::all();
        
        return view('admin.test.create',compact('subjects','courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'course' => 'required',
            'batch' => 'required',
            'group' => 'required',
            'subject' => 'required',
            'lesson' => 'required'
        ]);
        dd($request->all());
    }

}
