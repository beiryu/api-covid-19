<?php

namespace App\Http\Controllers;

use App\Models\CaseCovid;
use App\Models\LocationCovid;
use Illuminate\Support\Facades\Http;

class HandleDataController extends Controller
{
    
    protected $preUrl = 'https://vnexpress.net/microservice/sheet/type/covid19_2021_by_';


    public function saveCasesCovid()
    {
        $responses = Http::get($this->preUrl.'day');

        if ($responses->ok())
        {
            $body = $this->handle($responses->body());

            foreach( $body as $key => $value )
            {
                if (preg_match('/\d{1,2}\/\d{1,2}\b/', $value, $matches) && strlen($value) < 6)
                {
                    $result = array_slice($body, $key, 3);

                    if (!in_array("", $result))
                    {
                        $case = new CaseCovid();
                    
                        $case->fill(array_combine( $case->get(), $result));

                        if (!CaseCovid::where('date', '=', $case->date)->where('today_cases', '!=', 0)->exists()) {
                            $case->save();    
                        }
                    }
                }
            }
        }
        
        return 1;
        
    }

    public function saveLocationCovid()
    {
        $responses = Http::get($this->preUrl.'location');

        if ($responses->ok())
        {
            $body = $this->handleLocation($responses->body());
            
            foreach( $body as $value )
            {
                $result = array_slice($value, 0, count($value) - 7);

                $location = new LocationCovid();

                $location->fill(array_combine($location->getProvince(), $result));
                
                $location->save();
            }
        }
        return 1;
    }
    
    protected function handle($data)
    {
        preg_match_all('/\"(\w.*?)?\"/i', $data, $matches);

        $func = function($value) {
            return preg_replace('/\"(\w.*?)?\"/', '$1', $value);
        };

        return array_map($func, $matches[0]);
    }

    protected function handleLocation($data)
    {
        $x = $this->handle($data);

        $temp = (array_chunk(array_slice($x, 134), 70));
        foreach($temp as $i => $arr)
        {
            foreach($arr as $j => $e)
            {
                if ($e == "")
                {
                    $temp[$i][$j] = 0;
                }
            }
        }

        return $temp;
    }
}