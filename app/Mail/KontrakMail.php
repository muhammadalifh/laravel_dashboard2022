<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KontrakMail extends Mailable
{
    use Queueable, SerializesModels;

    public $portofolio_detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($portofolio_detail)
    {
        $this->portofolio_detail = $portofolio_detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $portofolio_file = $this->portofolio_detail['spk_po_wo'];

        $mail =  $this->subject('Notifikasi Kontrak')
        ->view('emails.kontrak');

        if(isset($portofolio_file) && $portofolio_file != null){
            $mail->attach($portofolio_file->getRealPath(), [
                'as' => $portofolio_file->getClientOriginalName(),
                'mime' => $portofolio_file->getMimeType(),
            ]);
        }
        // else{
        //     $mail->text('Kontrak belum diupload');
        // }
        return $mail;

    }
}
