<?php

namespace App\Console;

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
        Commands\Cron\MySqlDumpOnsite::class,
        Commands\Cron\MySqlDumpEstructuraTablasConfigOnSite::class,
        Commands\Cron\MySqlDumpDataUsers::class,
        Commands\Cron\MySqlDumpDataExample::class,
        //Commands\OnsiteDBBackupExport::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $email_for_dump = env('MAIL_FOR_DUMP');
        
        $schedule->command('db:dumpOnsite') 
        ->dailyAt('00:05')
        ->withoutOverlapping();



        $schedule->command('db:dumpEstructuraTablasConfig '.$email_for_dump)
        ->weeklyOn(1, '5:00')
        ->withoutOverlapping();        


        $schedule->command('db:dumpDataUsers '.$email_for_dump) 
        ->weeklyOn(1, '5:15')
        ->withoutOverlapping();
        
        $schedule->command('db:dumpDataExample '.$email_for_dump) 
        ->weeklyOn(1, '5:30')
        ->withoutOverlapping();
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
