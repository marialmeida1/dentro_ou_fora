@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-around">

        @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif

        @if(session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
        @endif

        <!-- Candidato -->
        <div class="card card-zoom col-md-3 my-5" style="width: 18rem;">
            <img src="{{ asset('img/people.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Candidato</h5>
                <p class="card-text">Registre uma novo candidato para o nosso game!</p>
                <a href="{{ url('candidato/create')}}" class="btn btn-purple">Criar</a>
            </div>
        </div>

        <!-- Categoria -->
        <div class="card card-zoom col-md-3 my-5" style="width: 18rem;">
            <img src="{{ asset('img/category.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Categoria</h5>
                <p class="card-text">Registre uma nova categoria para o nosso game!</p>
                <a href="{{ url('categoria/create')}}" class="btn btn-purple">Criar</a>
            </div>
        </div>

        <!-- Votacao -->
        <div class="card card-zoom col-md-3 my-5" style="width: 18rem;">
            <img src="{{ asset('img/vote.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Votação</h5>
                <p class="card-text">Crie uma nova votação para o nosso game!</p>
                <a href="{{ url('votacao/create')}}" class="btn btn-purple">Criar</a>
            </div>
        </div>

        <!-- Table Votação -->
        <div class="card p-0 mt-5">
            <h5 class="card-header">Votações</h5>
            <div class="card-body">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Código</th>
                            <th scope="col" class="d-flex justify-content-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($votacoes as $votacao)

                        <tr>
                            <td>{{ $votacao->titulo }}</td>
                            <td><a href="{{ route('votacao.votacao', [$votacao->codigo]) }}">{{ $votacao->codigo }}</a></td>

                            <td class="d-flex justify-content-end">
                                @if($votacao->publica != 1)
                                <a href="{{ route('votacao.true', [$votacao->id]) }}"><button class="btn btn-blue btn-sm mx-2">Publicar</button></a>
                                @else
                                <a href="{{ route('votacao.false', [$votacao->id]) }}"><button class="btn btn-purple btn-sm mx-2">Despublicar</button></a>
                                @endif
                                <a href="{{ route('votacao.delete', [$votacao->id]) }}"><button class="btn btn-darkpurple btn-sm mx-2">Excluir</button></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="more-table mt-2">
                    <a href="{{ url('votacao/index') }}">Ver todas as votações...</a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between p-0">
            <!-- Table Categoria -->
            <div class="col-md-6 card p-0 mt-5">
                <h5 class="card-header">Categorias</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col" class="d-flex justify-content-end">Ações</th>
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
                    <div class="more-table mt-2">
                        <a href="{{ url('categoria/index') }}">Ver todas as categorias...</a>
                    </div>
                </div>
            </div>
            <br>
            <!-- Table Candidato -->
            <div class="card col-md-6 p-0 mt-5">
                <h5 class="card-header">Candidatos</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col" class="d-flex justify-content-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidatos as $candidato)

                            <tr>
                                <td>{{ $candidato->nome }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('candidato.delete', [$candidato->id]) }}"><button class="btn btn-darkpurple btn-sm">Excluir</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="more-table mt-2">
                        <a href="{{ url('candidato/index') }}">Ver todas os candidatos...</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

<!-- Modal de Confirmação -->