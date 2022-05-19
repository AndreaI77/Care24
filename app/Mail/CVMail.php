<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CVMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cvEmail')->attach($this->details['archivo']->getRealPath(),[
            'as'=>$this->details['archivo']->getClientOriginalName()
        ]);

        /*sin guardar
        ->attachData($this->pdf, 'name.pdf', [
            'mime' => 'application/pdf',
        ]);;
        */
    }
}
