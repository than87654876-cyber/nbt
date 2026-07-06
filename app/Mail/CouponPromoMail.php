<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CouponPromoMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $fullname;
    public $couponCode;
    public $subjectText;
    public $bodyText;
    public $expiryDays;

    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $couponCode, $subjectText, $bodyText, $expiryDays)
    {
        $this->fullname = $fullname;
        $this->couponCode = $couponCode;
        $this->subjectText = $subjectText;
        $this->bodyText = $bodyText;
        $this->expiryDays = $expiryDays;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText ?: 'Quà tặng ưu đãi đặc biệt từ FOODELICIOUS 🎁',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.coupon_promo',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
