<?php

namespace App\Console;

use App\Offers;
use App\Statistics_offer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();'

        $schedule->call(function () {
            $offers = Offers::all();
            $stat = new Statistics_offer();
            foreach ($offers as $offer) {
                $stat->create([
                    'offers_id' => $offer->id,
                    'redirect_view' => $offer->redirect,
                    'install_view' => $offer->install,
                ]);
            }
        })->daily();
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
