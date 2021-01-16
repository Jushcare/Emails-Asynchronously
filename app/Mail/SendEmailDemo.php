<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailDemo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $msgbody;
    public $attach;
    public $name;
    public $extension;

    public function __construct($subject,$msgbody,$attach,$name,$extension)
    {
        $this->subject = $subject;
        $this->msgbody = $msgbody;
        $this->attach = $attach;
        $this->name = $name;
        $this->extension = $extension;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emailtest')
                    ->subject($this->subject)
                    ->attachData($this->attach, $this->name, [
                    'mime' => 'application/'.$this->extension,
                ]);
    }
}
