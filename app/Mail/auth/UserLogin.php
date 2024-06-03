<?php

    namespace App\Mail\auth;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class UserLogin extends Mailable implements ShouldQueue
    {
        use Queueable, SerializesModels;

        public array $data;

        /**
         * Create a new message instance.
         */
        public function __construct(array $data)
        {
            $this->data = $data;
        }

        /**
         * Get the message envelope.
         */
        public function envelope(): Envelope
        {
            return new Envelope(
                subject: 'User activity!!',
            );
        }

        /**
         * Get the message content definition.
         */
        public function content(): Content
        {
            return new Content(
                view: 'mail.user-login',
                with: [
                    'userName' => $this->data['userName'],
                    'userEmail' => $this->data['userEmail'],
                    'userAgent' => $this->data['userAgent'],
                    'userIP' => $this->data['userIP'],
                ]
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
