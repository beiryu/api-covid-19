<?php

namespace App\Http\Controllers;

use App\Models\CaseCovid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CovidController extends Controller
{
    protected $date;

    public function covidByDay(Request $request)
    {
        $this->date = $request->day.'/'.$request->month;

        $cases = ($this->date != '/') ? CaseCovid::where('date', $this->date)->get() : Cache::get('allData');
        
        return response()->json([
            'message' => __('controller.succeed'),
            'data' => $cases,
        ], 200);
    }

    public function covidByLocation()
    {
        // ...
        return 1;
    }
}