<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseCovidRequest;
use App\Http\Requests\LocationCovidRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    public function covidByDay(CaseCovidRequest $request)
    {
        $case = DB::table('case_covids')->whereDate('created_at', '=', $request->date)->get();
        return response()->json([
            'message' => __('controller.succeed'),
            'data' => $case,
        ], 200);
    }

    public function covidByLocation(LocationCovidRequest $request)
    {
        $location = DB::table('location_covids')->whereDate('created_at', '=', $request->date)->where('code', $request->code)->get();
        return response()->json([
            'message' => __('controller.succeed'),
            'data' => $location,
        ], 200);
    }
}