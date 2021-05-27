<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_message_readed extends Mailable
{
    use Queueable, SerializesModels;

  public $datetime_readed;
  public $recipent_email;

    public function __construct($datetime_readed,$recipent_email)
    {
        $this->datetime_readed = $datetime_readed;
        $this->recipent_email = $recipent_email;
    }


    public function build()
    {
        return $this->subject('One Time Message - Message readed'.$this->recipent_email)
                     ->view('emails.email_message_readed');

    }
}
