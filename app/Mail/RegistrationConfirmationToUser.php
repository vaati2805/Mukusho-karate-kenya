<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationToUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $memberType,
        public string $names,
        public int $count,
        public string $club,
        public float $amount,
        public ?string $guardian = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🥋 Registration Confirmed — Welcome to Mukusho Karate Kenya!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.registration-confirmation-user',
        );
    }
}
