<?php

namespace App\Http\Controllers;

use App\Models\CaseCovid;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class HandleDataController extends Controller
{
    
    protected $preUrl = 'https://vnexpress.net/microservice/sheet/type/covid19_2021_by_';


    public function saveCasesCovid()
    {
        $responses = Http::get($this->preUrl.'day');

        if ($responses->ok())
        {
            $body = $this->handleResult($responses->body());

            foreach( $body as $key => $value )
            {
                if (preg_match('/\d{1,2}\/\d{1,2}\b/', $value, $matches) && strlen($value) < 6)
                {
                    $result = array_slice($body, $key, 3);

                    if (!in_array("", $result))
                    {
                        $case = new CaseCovid();
                    
                        $case->fill(array_combine( ['date', 'today_cases', 'total_cases'], $result));
                        
                        $case->save();
                    }
                }
            }
        }
        
        return 1;
        
    }

    public function saveLocationCovid()
    {
        echo 'this is location covid cases';

        return 1;

    }
    
    protected function handleResult($data)
    {
        preg_match_all('/\"(\w.*?)?\"/i', $data, $matches);

        $func = function($value) {
            return preg_replace('/\"(\w.*?)?\"/', '$1', $value);
        };

        return array_map($func, $matches[0]);
    }
}