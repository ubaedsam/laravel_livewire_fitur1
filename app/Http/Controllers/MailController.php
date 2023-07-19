<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        // Isi pesan email
        $details = [
            'title' => 'Email dari Ubaed S.A.M',
            'body' => 'Ini adalah percobaan mengirim pesan menggunakan gmail'
        ];
        
        // mengirim pesan email ke user
        Mail::to("ubaedasam@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
