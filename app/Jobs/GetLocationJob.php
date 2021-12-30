<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\LocationCovid;
use Symfony\Component\Panther\Client;

class GetLocationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = Client::createChromeClient();
        $client->request('GET', 'https://vnexpress.net/covid-19/covid-19-viet-nam');
        $client->executeScript("document.querySelectorAll('.xem-them')[1].click()");
        $all = $client->waitFor('#list-tinhthanh')->filter('#list-tinhthanh')->text();
        $data = array_chunk(explode("\n", $all), 7);
        foreach($data as $value)
        {
            $location = new LocationCovid();
            $location->fill(array_combine($location->getFields(), $location->get($data, $value[0])));
            $location->save();
        }
    }
}
