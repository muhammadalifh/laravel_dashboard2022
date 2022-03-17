<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;


    public $detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = $this->detail['inquiry_upload_data'];

        return $this->subject('Ada Klien Baru')
        ->attach($file->getRealPath(), [
            'as' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
        ])
        ->view('emails.contact');
    }
}
