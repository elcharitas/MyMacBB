<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The message content
     * 
     * @var string
     */
    protected $messageCap;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $message
     * @param string $from
     * 
     * @return void
     */
    public function __construct(string $subject, string $message, ?string $from=null)
    {
        
        $this->subject($subject);
        
        if(!is_null($from)){
            $this->from($from);
        }
        
        $this->messageCap = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')
                    ->with(['cap' => $this->messageCap]);
    }
}
