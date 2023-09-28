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
        $devMail = 'arielferaguirre.2001@gmail.com';
        $businessMail = Business::first()->email ?? '';
        $recipients = [$devMail, $businessMail];
        Mail::to($recipients)->send(new DailyReport());
    }
}
