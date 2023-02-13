<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;

    public $theme;

    public function __construct($theme, $text)
    {
        $this->theme = $theme;
        $this->text = $text;
    }

    public function build()
    {
        return $this->view('emails.send_mail')
            ->subject($this->theme);
    }
}
