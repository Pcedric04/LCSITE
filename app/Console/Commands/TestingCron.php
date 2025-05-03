<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */

     public function __construct()
     {
         parent::__construct();
     }
     
    public function handle()
    {
        \Log::info("Testing Cron is Running ... !");

        $this->info('testing:cron Command Run Successfully !');

        //return Command::SUCCESS;
    }
}
