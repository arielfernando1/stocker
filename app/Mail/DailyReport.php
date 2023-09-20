<?php

namespace App\Mail;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class DailyReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reporte diario',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $today = DB::table('sales')
            ->whereDate('created_at', date('Y-m-d'))
            ->sum('total');
        $sales = Sale::whereDate('created_at', date('Y-m-d'))->get();


        return new Content(
            view: 'emails/dailyreport',
            with: [
                'today' => $today,
                'sales' => $sales,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
