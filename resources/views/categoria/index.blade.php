@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-around">

        <div class="col-md-12 mt-5 my-2">
            <h3>Categorias</h3>
            <table class="table table-hover my-2">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)

                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('categoria.delete', [$categoria->id]) }}"><button class="btn btn-darkpurple btn-sm">Excluir</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection