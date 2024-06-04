<?php

    namespace App\Mail\article;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class ArticleCreate extends Mailable implements ShouldQueue
    {
        use Queueable, SerializesModels;

        protected array $data;

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
                subject: 'Article Create',
            );
        }

        /**
         * Get the message content definition.
         */
        public function content(): Content
        {
            return new Content(
                view: 'mail.article.article-create',
                with: [
                    'title' => $this->data['title'],
                    'status' => $this->data['status'],
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
