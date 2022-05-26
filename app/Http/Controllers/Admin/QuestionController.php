<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Option;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\QuestionType;

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

    public function create()
    {
        $courses = Course::all();
        $types = QuestionType::all();
        return view('admin.question.create',compact('courses','types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lesson' => 'required',
            'question' => 'required',
            'type' => 'required',
            'marks' => 'required | numeric'
        ]);

        $options = $this->processOptions($request->all()['options']);

        if($options['errorTrue']){
            return back()->withErrors("All Options Can't be True 😔");
        }elseif($options['errorFalse']){
            return back()->withErrors("All Options Can't be False 😔");
        }
        DB::transaction(function() use($request,$options){

            $question = Question::create([
                'question' => $request['question'],
                'marks' => $request['marks'],
                'type' => $request['type'],
                'lesson' => $request['lesson'],
            ]);

            foreach ($options['options'] as $key => $option) {
                Option::create([
                    'question' => $question->id,
                    'letter' => $option['letter'],
                    'option' => $option['option'],
                    'explaination' => $option['explaination'],
                    'correct' => $option['correct']
                ]);
            }

        });
        
        return redirect()->route('admin.question')->with('success','Question Added with Options');
    }

    public function question()
    {
        $questions = Question::all();
        return view('admin.question.question',compact('questions'));
    }

    public function assign(Request $request)
    {
        $questions = Question::with('options')->get();
        return view('admin.question.assign',compact('questions'));
    }

    public function assignToTest(Request $request)
    {

        $request->validate([
            'question' => 'required',
            'test' => 'required'
        ]);

        DB::table('question_test')->insert([
            'question_id' => $request->question,
            'test_id' => $request->test
        ]);

        return redirect()->route('admin.question.assign')->with('success','Question Assigned');
    }

    public function fetch(Request $request)
    {
        $questions = Question::with('options')->get();
        return json_encode($questions);
    }

    public function fetchTest(Request $request)
    {
        $tests = DB::select("SELECT 
        tests.name, tests.id
        from lesson_test as lt
        join tests on tests.id = lt.test_id
        join lessons on lessons.id = lt.lesson_id
        where lessons.id = '{$request->lesson}'
        ;");
        return json_encode($tests);
    }

    public function processOptions($options)
    {
        $foundTrue = 0;
        $errorTrue = false;
        $foundFalse = 0;
        $errorfalse = false;
        $proccessed = [];
        $letter = 65;

        foreach ($options as $key => $option) {

            $option['letter'] = chr($letter);

            $proccessed[$key] = $option; // pass all data to options

            if(isset($option['correct']))
            {
                $proccessed[$key]['correct'] = 1; // override array with 0 | 1
                $foundTrue++;
            }else{
                $proccessed[$key]['correct'] = 0; // override array with 0 | 1
                $foundFalse++;
            }
            $letter++;
        } // process options

        $length = count($proccessed);

        if($foundTrue == $length){
            $errorTrue = true;
        } //checks if all are not true

        if($foundFalse == $length){
            $errorfalse = true;
        } //checks if all are not false

        return [
            'options' => $proccessed,
            'errorTrue' => $errorTrue,
            'errorFalse' => $errorfalse
        ];
    }
}
