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
                    'type' => $data->getType->type,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($question)->toJson();
        }
        return view('admin.question.index');
    }

    public  function question()
    {
        $questions = Question::all();
        foreach ($questions as $key => $value) {
            echo "question loop";
            foreach($value->options as $option)
            {
                echo "option loop";
                dd($option,$option->getQuestion->getType);
            }
            
        }

        
        dd('yo');
        return view('admin.question.question',compact('questions'));
    }
}
