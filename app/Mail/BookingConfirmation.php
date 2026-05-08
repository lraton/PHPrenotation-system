<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Collection;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BookingConfirmation extends Mailable
{

    public Collection $booking;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Collection $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@phpprenotationsystem.com', 'Jeffrey Way'),
            subject: 'Booking confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'mail.booking_confirmation'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn() => (string) QrCode::format('svg')
                    ->size(300)
                    ->generate('http://localhost/conferma-prenotazione?token=' . $this->booking->get('qr_token')),
                'qrcode.svg'
            )->withMime('image/svg+xml'),
        ];
    }
}
