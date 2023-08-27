<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Categoria;
use App\Models\Votacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $votacao = Votacao::limit(5)->get();
        $categoria = Categoria::limit(5)->get();
        $candidato = Candidato::limit(5)->get();

        return view('home', ['votacoes' => $votacao, 'categorias' => $categoria, 'candidatos' => $candidato]);
    }
}
