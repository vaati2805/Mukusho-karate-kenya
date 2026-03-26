<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $memberType,
        public string $names,
        public int $count,
        public string $phone,
        public string $club,
        public float $amount,
        public ?string $guardian = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🥋 New Mukusho Registration — ' . $this->names,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.registration-notification',
        );
    }
}
