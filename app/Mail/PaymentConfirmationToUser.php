<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationToUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $memberName,
        public float $amount,
        public string $monthFor,
        public string $receipt,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🥋 Payment Received — Mukusho Karate Kenya',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.payment-confirmation-user',
        );
    }
}
