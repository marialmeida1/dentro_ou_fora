@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="card col-md-10">
            <div class="card-body p-5">
                <h5 class="card-title">Crie uma nova Votação:</h5>
                <hr>
                <form method="POST" action="{{ route('votacao.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="justify-content-center mt-3 ">
                        <img id="imagemPreview" src="#" alt="Imagem">
                    </div>

                    <div class=" input-group mt-3">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="exibirImagem()">
                    </div>

                    <div class="input-group flex-nowrap mt-3">
                        <input type="text" name="titulo" class="form-control" placeholder="Título da Votação" aria-label="titulo" aria-describedby="titulo" required>
                    </div>

                    <div class="input-group flex-nowrap mt-3">
                        <textarea class="form-control" aria-label="With textarea" name="descricao" placeholder="Descrição da Votação" required></textarea>
                    </div>

                    <div class="input-group mt-3">
                        <select class="form-select" aria-label="Default select example" name="categoria" id="categoria" placeholder="Categorias">
                            <option value="" disabled selected>Escolha uma Categoria</option>
                            @foreach ($categorias as $nome => $id)
                            <option value="{{ $id }}" required>{{ $nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="date" class="form-control" id="floatingPassword" placeholder="Data Início" name="start" required>
                        <label for="floatingPassword">Data Início</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="date" class="form-control" id="floatingPassword" placeholder="Data Final" name="end" required>
                        <label for="floatingPassword">Data Final</label>
                    </div>

                    <div class="mt-3 mx-1">
                        <label>A votação estará ativa ou desativada?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Ativa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Desativada</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mt-3  justify-content-center">
                        <input type="submit" class="btn btn-purple" value="Criar Votação">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection