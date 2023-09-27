<?php

namespace App\Console\Commands;

use App\Mail\DailyReport;
use App\Models\Business;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReportDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:report-day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipient = Business::first()->email;
        Mail::to($recipient)->send(new DailyReport());
    }
}
