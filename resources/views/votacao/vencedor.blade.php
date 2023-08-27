@extends('layouts.main')

@section('content')


<div class="container d-flex justify-content-center align-items-center min-vh-100">
    @foreach($nome as $candidato)
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 title-rota">{{ $candidato['nome'] }}!</h1>
            <p class="lead">{{ $candidato['nome']}} é o vencedor dessa votação na categoria {{ $categoria->nome }}!</p>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <img src="{{ asset('img/candidatos/' . $candidato['foto']) }}" alt="Foto" class="img-winner">
        </div>
    </div>
    @endforeach
</div>
@endsection