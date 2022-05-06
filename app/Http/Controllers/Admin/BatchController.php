<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Batch::get(['id','name','description','course','created_at']);  
            $batch = $data->map(function ($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'description' => $data->description,
                    'course' => $data->getCourse->name,
                    'created' => $data->created_at->diffForHumans(),
                ];
            });
            return DataTables::of($batch)->toJson();
        }
        return view('admin.batch.index');
    }
}
