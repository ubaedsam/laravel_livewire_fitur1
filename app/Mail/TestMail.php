<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    // Data yang disimpan
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //  Untuk memproses isi data pesan email
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    // Tampilan isi pesan email
    public function build()
    {
        return $this->subject('Percobaan Pesan dari Ubaed S.A.M')->view('emails.TestMail');
    }
}
