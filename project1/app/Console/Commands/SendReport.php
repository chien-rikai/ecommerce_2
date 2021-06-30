<?php

namespace App\Console\Commands;

use App\Enums\UserRole;
use App\Jobs\SendReport as JobsSendReport;
use App\Models\User;
use Illuminate\Console\Command;

class SendReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $admins= User::where('role',UserRole::admin)->get();
        JobsSendReport::dispatch($admins)->delay(now()->addMinute(1));
    }
}
