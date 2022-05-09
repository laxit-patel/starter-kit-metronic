<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\QuestionType;

class QuestionTypeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = QuestionType::get(['id','type','instructions','created_at']);  
            $question_type = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'type' => $data->type,
                    'instructions' => $data->instructions,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($question_type)->toJson();
        }
        return view('admin.question.type.index');
    }
}
