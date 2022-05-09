<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Question::get(['id','question','marks','type','created_at']);  
            $question = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'question' => $data->question,
                    'marks' => $data->marks,
                    'type' => $data->type,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($question)->toJson();
        }
        return view('admin.question.index');
    }

    public  function question()
    {
        $questions = Question::paginate(5);
        return view('admin.question.question',compact('questions'));
    }
}
