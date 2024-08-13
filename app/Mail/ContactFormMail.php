<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $filePath;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $filePath = null)
    {
        $this->data = $data;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->subject('Nuovo messaggio! - Italianos Forever') // Set the email subject
                      ->view('emails.contact-form')
                      ->with('data', $this->data);

        if ($this->filePath) {
            $email->attach(storage_path('app/public/' . $this->filePath));
        }

        return $email;
    }
}
