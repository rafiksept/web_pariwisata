<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeleteNonActiveAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:account';

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
        DB::table('users')
                    -> where('active', 0)
                    -> where('created_at', '<=', Carbon::now()->subMinutes(60)->toDateTimeString())
                    -> delete();
       
        echo 'Account Delete!';
        \Log::info('Account Delete!');
        return Command::SUCCESS;
    }
}
