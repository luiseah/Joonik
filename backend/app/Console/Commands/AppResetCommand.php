<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Run Refreshing Database (migrate:fresh).');

        \Artisan::call('migrate:fresh');

        $this->info('Execute seeds');

        \Artisan::call('db:seed');
    }
}
