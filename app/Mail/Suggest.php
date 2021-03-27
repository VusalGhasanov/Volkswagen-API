<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Suggest extends Mailable
{
    public $data;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Təklif və Şikayətlər')
            ->from(config('emails.no_reply_email'))
            ->to(config('emails.suggest_email'))
            ->markdown('emails.suggest')
            ->with('data',$this->data);
    }
}
