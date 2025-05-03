<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;
    protected $posts;
    protected $recipient;
    protected $agendas;
    public function __construct($posts,$recipient/* ,$agendas */)
    {
        $this->posts = $posts;
        $this->recipient = $recipient;
       /*  $this->agendas = $agendas; */
    }

    public function build()
    {
        return $this->markdown('frontoffice.body.newsletters.newsletter')
        ->with(
                [
                'posts'=>$this->posts,
                'recipient'=> $this->recipient,
               /*  'agendas' => $this->agendas, */
                ]
            );
    }
}
