<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Message;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    // protected $commands = [
    //     \App\Console\Commands\Inspire::class,
    // ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $date = date('Y-m-d');
            $date = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) ));

            Message::whereDate('created_at', $date)->delete();
        })->cron('* * */2 * *');

        // I could not fix time(09:15);
        
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
