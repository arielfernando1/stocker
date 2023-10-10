<?php

namespace Tests\Feature;

use App\Mail\DailyReport;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailingTest extends TestCase
{

    public function test_send_email(): void
    {
        Mail::to('arielferaguirre.2001@gmail.com')->send(new DailyReport());
        $this->assertTrue(true);
    }
}
