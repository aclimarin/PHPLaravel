<?php

namespace App\Models;

use Illuminate\Support\Facades\App;

class ContatoFaleConosco
{    
    public $remetente;
    public $mensagem;
    public $assunto;

    private $app;

    public function __construct(){
        $this->app= App::getFacadeRoot();
        $this->remetente = $this->app->make('App\Models\Remetente');
    }
}