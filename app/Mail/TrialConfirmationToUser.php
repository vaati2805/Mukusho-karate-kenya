<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrialConfirmationToUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $userName,
        public ?string $program = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🥋 Welcome to Mukusho Karate Kenya — Free Trial Confirmed!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.trial-confirmation-user',
        );
    }
}
