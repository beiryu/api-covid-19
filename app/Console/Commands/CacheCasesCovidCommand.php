<?php

namespace App\Console\Commands;

use App\Models\CaseCovid;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CacheCasesCovidCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Cache::rememberForever('allData', function(){
            return CaseCovid::all();
        });
        return 0;
    }
}
