<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Lesson::get(['id','name','description','subject','created_at']);  
            $lesson = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'subject' => $data->getSubject->name,
                    'description' => $data->description,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($lesson)->toJson();
        }
        return view('admin.lesson.index');
    }
}
