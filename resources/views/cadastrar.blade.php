@extends('layouts.app')

@section('content')
<div class="container" data-bs-theme="dark">
    <div class="row justify-content-around">
        <!-- Candidato -->
        <div class="card card-zoom col-md-3 mt-5" style="width: 18rem;">
            <img src="{{ asset('img/people.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Candidato</h5>
                <p class="card-text">Registre uma novo candidato para o nosso game!</p>
                <a href="#" class="btn btn-pink">Cadastrar</a>
            </div>
        </div>

        <!-- Categoria -->
        <div class="card card-zoom col-md-3 mt-5" style="width: 18rem;">
            <img src="{{ asset('img/category.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Categoria</h5>
                <p class="card-text">Registre uma nova categoria para o nosso game!</p>
                <a href="#" class="btn btn-purple">Cadastrar</a>
            </div>
        </div>

        <!-- Votacao -->
        <div class="card card-zoom col-md-3 mt-5" style="width: 18rem;">
            <img src="{{ asset('img/vote.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Votação</h5>
                <p class="card-text">Crie uma nova votação para o nosso game!</p>
                <a href="#" class="btn btn-blue">Cadastrar</a>
            </div>
        </div>
    </div>
</div>
@endsection