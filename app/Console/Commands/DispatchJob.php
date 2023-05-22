<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DispatchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:dispatch {job}';

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
    public function handle()
    {
        $class = '\\App\\Jobs\\' . $this->argument('job');
        dispatch(new $class());
    }
}
