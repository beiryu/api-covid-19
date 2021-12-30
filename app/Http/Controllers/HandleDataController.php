<?php

namespace App\Http\Controllers;

use App\Models\CaseCovid;
use App\Models\LocationCovid;
use Symfony\Component\Panther\Client;
use HoangPhi\VietnamMap\Models\Province;


class HandleDataController extends Controller
{
    public function saveCasesCovid()
    {
        $case = new CaseCovid();
        $case->fill(array_combine($case->getFields(), $case->getData()));
        $case->save();
    }

    public function saveLocationCovid()
    {
        $data = $this->set();
        foreach($data as $value)
        {
            $location = new LocationCovid();
            $location->fill(array_combine($location->getFields(), $location->get($data, $value[0])));
            $location->save();
        }
    }

    public function set()
    {
        $client = Client::createChromeClient();
        $client->request('GET', 'https://vnexpress.net/covid-19/covid-19-viet-nam');
        $client->executeScript("document.querySelectorAll('.xem-them')[1].click()");
        $all = $client->waitFor('#list-tinhthanh')->filter('#list-tinhthanh')->text();
        return array_chunk(explode("\n", $all), 7);
    }
}