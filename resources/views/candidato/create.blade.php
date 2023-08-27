@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="card col-md-10">
            <div class="card-body p-5">
                <h5 class="card-title">Crie um novo Candidato:</h5>
                <hr>
                <form method="POST" action="{{ route('candidato.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group flex-nowrap mt-3">
                        <span class="input-group-text" id="nome">@</span>
                        <input type="text" name="nome" class="form-control" placeholder="Nome do Candidato" aria-label="nome" aria-describedby="nome">

                    </div>

                    <div class="input-group mt-3">
                        <input class="form-control" type="file" id="foto" name="foto">
                    </div>

                    <div class="input-group mt-3  justify-content-center">
                        <input type="submit" class="btn btn-purple" value="Criar Candidato">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection