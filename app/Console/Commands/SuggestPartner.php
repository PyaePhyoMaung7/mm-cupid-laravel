<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SuggestPartner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suggest:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to suggest parnters';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $queryLog = date('Y-m-d H:i:s') . ' cron success';
        Log::info("Suggest Partner - \n" . $queryLog);
        return Command::SUCCESS;
    }
}
