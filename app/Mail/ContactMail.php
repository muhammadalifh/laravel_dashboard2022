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

        $mail =  $this->subject('Ada Klien Baru')
        ->view('emails.contact');

        if(isset($file) && $file != null){
            $mail->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        // else{
        //     $mail->text('Kontrak belum diupload');
        // }
        return $mail;
    }
}
