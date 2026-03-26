<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FreeTrialNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $trialName,
        public string $trialPhone,
        public ?string $trialProgram = null,
        public ?string $trialMessage = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🥋 New Free Trial Request — ' . $this->trialName,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.trial-notification',
        );
    }
}
