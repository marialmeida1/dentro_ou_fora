@extends('layouts.main')

@section('content')


<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="display-4 title-rota">Encerrada!</h1>
            <p class="lead">A votação está encerrada, vote em uma <a href="{{ url('votacao/create') }}">nova votação</a> ou vá para a <a href="{{ url('votacao/create')}}">página principal!</a></p>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <img src="{{ asset('img/inative.png') }}" alt="Foto" class="img-fluid">
        </div>
    </div>
</div>
@endsection