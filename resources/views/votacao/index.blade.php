@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-around">

        <div class="col-md-12 mt-5 my-2">
            <h3>Votações</h3>
            <table class="table table-hover my-2">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Código</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Data Início</th>
                        <th scope="col">Data Término</th>

                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($votacoes as $votacao)

                    <tr>
                        <td>{{ $votacao->titulo }}</td>
                        <td>{{ $votacao->codigo }}</td>
                        <td>{{ $categorias[$votacao->categoria_id] }}</td>
                        <td>{{ $usuarios[$votacao->usuario_id] }}</td>
                        <td>{{ $votacao->datahora_inicio }}</td>
                        <td>{{ $votacao->datahora_fim }}</td>
                        <td class="d-flex justify-content-end">
                            @if($votacao->publica != 1)
                            <a href="{{ route('votacao.true', [$votacao->id]) }}"><button class="btn btn-blue btn-sm mx-2">Publicar</button></a>
                            @else
                            <a href="{{ route('votacao.false', [$votacao->id]) }}"><button class="btn btn-purple btn-sm mx-2 ">Despublicar</button></a>
                            @endif
                            <a href="{{ route('votacao.delete', [$votacao->id]) }}"><button class="btn btn-darkpurple btn-sm mx-2">Excluir</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection