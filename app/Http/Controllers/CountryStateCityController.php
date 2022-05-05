<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City};
use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
