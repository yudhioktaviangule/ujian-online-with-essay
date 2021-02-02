<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AllMail extends Mailable
{
    use Queueable, SerializesModels;

    private $cview = 'mails.kirimpass';
    private $data;
    private $hid = 'User Anda telah dibuat';
    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function build()
    {
        $email=$this->data->email;
        $pass=$this->data->pass;
        $markdown = $this->markdown($this->cview,compact('email','pass'))->subject($this->hid);
        
        return $markdown;

    }
}
