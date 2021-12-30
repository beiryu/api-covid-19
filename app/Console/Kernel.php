<?php

namespace App\Console;

use App\Jobs\GetCasesJob;
use App\Jobs\GetLocationJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new GetCasesJob)->everyMinute();
        $schedule->job(new GetLocationJob)->everyMinute();
        $schedule->command('covid:queue-active 60 1')->everyMinute();
        $schedule->command('covid:cache')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
