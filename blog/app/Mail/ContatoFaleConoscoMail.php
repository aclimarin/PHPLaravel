<?php

namespace App\Mail;

use App\Models\ContatoFaleConosco;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContatoFaleConoscoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $model;

    public function __construct(ContatoFaleConosco $contatoFaleConosco)
    {
        $this->model = $contatoFaleConosco;
    }

    public function build()
    {
        return $this->view('emails.contato-fale-conosco')
                ->from($this->model->remetente->email, $this->model->remetente->nome);
    }
}
