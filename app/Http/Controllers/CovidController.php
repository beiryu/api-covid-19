<?php

namespace App\Http\Controllers;

use App\Models\CaseCovid;
use App\Models\LocationCovid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    protected $date;

    public function __construct(Request $request)
    {
        $this->date = $request->day.'/'.$request->month;
    }

    public function covidByDay()
    {
        $cases = ($this->date != '/') ? CaseCovid::where('date', $this->date)->get() : Cache::get('allData');
        
        return response()->json([
            'message' => __('controller.succeed'),
            'data' => $cases,
        ], 200);
    }

    public function covidByLocation(Request $request)
    {
        $query = DB::table('location_covids');
        
        $query->select('date', $request->province);

        if ($this->date != '/')
        {
            $query->where('date', $this->date);
        }

        return response()->json([
            'message' => __('controller.succeed'),
            'data' => $query->get(),
        ], 200);
    }
}