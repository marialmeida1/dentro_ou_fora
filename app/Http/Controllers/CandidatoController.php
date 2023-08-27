<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{

    public function show()
    {
        $candidatos = Candidato::all();

        return view('candidato.index', ['candidatos' => $candidatos]);
    }

    public function create()
    {
        return view('candidato.create');
    }

    public function store(Request $request)
    {
        $event = new Candidato();
        $event->nome = $request->nome;


        // Imagem
        $imageName = "";

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $requestImage = $request->file('foto');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/candidatos'), $imageName);
        }

        $event->foto = $imageName;

        $event->save();

        return redirect('/home')->with('msg', 'Candidato criado com sucesso');
    }

    public function delete($id)
    {
        Candidato::findOrFail($id)->delete();
        return redirect('/home')->with('delete', 'Candidato deletado com sucesso!');
    }
}
