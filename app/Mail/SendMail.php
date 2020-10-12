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
    protected $body;

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
        
        $this->body = $message;
        
        $this->view('mail');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->with(['body' => $this->body]);
    }
}
