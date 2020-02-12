<?php

namespace App\Http\Controllers;

use App\Models\ContatoFaleConosco;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Mail\ContatoFaleConoscoMail;
use Illuminate\Support\Facades\Mail;

class ContatoFaleConoscoController extends Controller
{
    private $app;

    public function __construct(){
        $this->app= App::getFacadeRoot();
    }

    public function send(Request $request){
        $model = $this->app->make('App\Models\ContatoFaleConosco');
        
        $model->assunto = $request->input('assunto');
        $model->mensagem = $request->input('mensagem');
        $model->remetente->nome = $request->input('remetente.nome');
        $model->remetente->email = $request->input('remetente.email');

        Mail::to($model->remetente->email)->send(new ContatoFaleConoscoMail($model));
        return (new ContatoFaleConoscoMail($model))->render();
    }
}
