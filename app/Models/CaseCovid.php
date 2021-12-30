<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Panther\Client;

class CaseCovid extends Model
{
    use HasFactory;

    protected $fillable = ['today_case', 'total_case'];

    public function getFields()
    {
        return $this->fillable;
    }

    public function getData()
    {
        $client = Client::createChromeClient();
        $client->request('GET', 'https://vnexpress.net/covid-19/covid-19-viet-nam');
        $today = $client->waitFor('.total_case_today')->filter('.total_case_today')->text();
        $total = $client->waitFor('.total_case')->filter('.total_case')->text();
        $today = (float)preg_replace(array('/\+/','/\./'), '', $today); 
        $total = (float)preg_replace(array('/\+/','/\./'), '', $total); 
        return [$today, $total];
    }
}
