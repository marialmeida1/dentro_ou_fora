<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\CandidatoVotacao;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Votacao;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VotacaoController extends Controller
{
    public function show()
    {
        $votacoes = Votacao::all();

        $categoria_id = Votacao::pluck('categoria_id'); // pega o ID de todos os livros
        $categorias = Categoria::whereIn('id', $categoria_id)->get(); // Verifica os livros que possuem emprestimo cadastrado
        $nome_categoria = $categorias->pluck('nome', 'id')->toArray(); // Pega nome de acordo com o ID

        $usuario_id = Votacao::pluck('usuario_id'); // pega o ID de todos os livros
        $usuarios = User::whereIn('id', $usuario_id)->get(); // Verifica os livros que possuem emprestimo cadastrado
        $nome_usuario = $usuarios->pluck('name', 'id')->toArray(); // Pega nome de acordo com o ID

        return view('votacao.index', ['votacoes' => $votacoes, 'categorias' => $nome_categoria, 'usuarios' => $nome_usuario,]);
    }

    public function create()
    {
        $categorias = Categoria::pluck('id', 'nome')->toArray();

        return view('votacao.create', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {

        $event = new Votacao();

        $codigo = Str::random(8);
        $event->codigo = $codigo;

        $event->categoria_id = $request->categoria;

        $usuario = auth()->user();
        $event->usuario_id = $usuario->id;

        $event->titulo = $request->titulo;
        $event->descricao = $request->descricao;

        $event->datahora_inicio = $request->start;
        $event->datahora_fim = $request->end;

        $event->publica = boolval($request->input('status'));

        $imageName = "";

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage = $request->file('foto');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/votacao'), $imageName);
        }

        $event->foto_capa = $imageName;

        $event->save();

        return redirect('/home')->with('msg', 'Votação criado com sucesso');
    }

    public function delete($id)
    {
        $votacao = Votacao::findOrFail($id);
        $votacao->delete();
        return redirect('/home')->with('delete', 'Votacao deletado com sucesso!');
    }

    public function true(Request $request, $votacao)
    {
        Votacao::where('id', $votacao)->update([
            'publica' => 1,
        ]);

        return redirect()->route('home');
    }

    public function false(Request $request, $votacao)
    {
        Votacao::where('id', $votacao)->update([
            'publica' => 0,
        ]);

        return redirect()->route('home');
    }

    public function votacao($codigo)
    {
        $votacao = Votacao::where('codigo', $codigo)->first();

        if ($votacao) {
            if ($votacao->publica == 1 && now() >= $votacao->datahora_inicio && now() <= $votacao->datahora_fim) {

                // Pega o nome da categoria da votacao
                $categoria = Categoria::where('id', $votacao->categoria_id)->first();

                $candidatos = Candidato::all();
                $embaralha = $candidatos->shuffle(); // embaralha
                $nomeCand = $embaralha->toArray();

                return view('votacao/ativa', ['votacoes' => $votacao, 'categoria' => $categoria, 'nome' => $nomeCand, 'txt' => null]);
            } else {
                return view('votacao.inativa');
            }
        } else {
        }
    }

    public function rodada(Request $request)
    {
        $selecionados = $request->input('selecionados', []);
        $count = count($selecionados);

        $vot = $request->votacao_id;
        $cat = $request->categoria_id;

        $candidatos = Candidato::whereIn('id', $selecionados)->get();
        $votacao = Votacao::where('id', $vot)->first();

        $categoria = Categoria::where('id', $cat)->first();
        $embaralha = $candidatos->shuffle(); // embaralha
        $nomeCand = $embaralha->toArray();


        foreach ($selecionados as $sel) {
            $candVot = new CandidatoVotacao();
            $candVot->candidato_id = $sel;
            $candVot->votacao_id = $vot;
            $candVot->pontos = 1;
            $candVot->save();
        }

        if (count($selecionados) == 2) {
            $txt =  "O vencedor é...";
            return view('votacao/ativa', ['votacoes' => $votacao, 'categoria' => $categoria, 'nome' => $nomeCand, 'txt' => $txt]);
        } else if (count($selecionados) == 1) {
            return view('votacao/vencedor', ['votacoes' => $votacao, 'categoria' => $categoria, 'nome' => $nomeCand,]);
        } else {
            $txt =  null;
            return view('votacao/ativa', ['votacoes' => $votacao, 'categoria' => $categoria, 'nome' => $nomeCand, 'txt' => $txt]);
        }
    }
}
