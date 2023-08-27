<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function show()
    {
        $categorias = Categoria::all();

        return view('categoria.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $event = new Categoria();
        $event->nome = $request->nome;

        $event->save();

        return redirect('/home')->with('msg', 'Categoria criada com sucesso');
    }

    public function delete($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect('/home')->with('delete', 'Categoria deletada com sucesso!');
    }
}
