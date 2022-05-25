<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Test;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $courses = Course::all();
        return view('admin.test.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'duration' => 'numeric', 
            'course' => 'required',
            'subject' => 'required',
            'lesson' => 'required'
        ]);

        DB::transaction(function() use($request){
            
            $test_id = Str::uuid()->toString();

            Test::create([
               'id' => $test_id,
               'name' => $request->name,
               'description' => $request->description,
               'course' => $request->course,
               'subject' => $request->subject,
               'duration' => $request->duration,
               'status' => 'generated' 
            ]);

            foreach ($request->lesson as $lesson) {
                DB::table('lesson_test')->insert([
                    'lesson_id' => $lesson,
                    'test_id' => $test_id
                ]);
            }

        });
        return redirect()->route('admin.test')->with('success','Test Created');
    }

    public function view($id)
    {
        $test = Test::where('id',$id)->get()->first();
        return view('admin.test.view', compact('test'));
    }

}
