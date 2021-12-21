<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class QueueActiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:queue-active {timeout} {tries}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Active queue covid';

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
        $timeout = $this->argument('timeout');
        $tries = $this->argument('tries');
        Artisan::call("queue:work --stop-when-empty --timeout=$timeout --tries=$tries");
        return 0;
    }
}
