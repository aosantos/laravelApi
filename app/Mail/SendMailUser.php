<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;
   
    public function __construct($contato)
    {
       $this->contato = $contato;
    }
    
    public function build()
    {        
        return $this->markdown('detalhes')
                    ->subject($this->contato['title'])
                    ->with('contato', $this->contato);  
               
    }
}
