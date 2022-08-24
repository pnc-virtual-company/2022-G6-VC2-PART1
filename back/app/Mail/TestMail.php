<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $leave;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($leave)
    {
        //
        $this->leave = $leave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('oun.bav66@gmail.com','Admin')
                    ->to('oun.bav@student.passerellesnumeriques.org','OUN')
                    ->cc('vichet.morm@student.passerellesnumeriques.org')
                    ->subject('sublect line for the email')
                    ->markdown('emails.sample-email');
    }
}
