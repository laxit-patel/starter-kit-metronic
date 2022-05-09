<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function fetch(Request $request)
    {
        $options = Option::where('question',$request->question)->get();
        return response()->json($options);
    }
}
