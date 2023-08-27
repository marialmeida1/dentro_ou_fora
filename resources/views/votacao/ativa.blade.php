@extends('layouts.main')

@section('content')


<div class="container">


    <div class=" justify-content-around">

        <div class="card mb-12" style="max-height: 150px;">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="{{ asset('img/votacao/' . $votacoes->foto_capa) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-9">
                    <div class="card-body p-3">
                        <h1 class="card-title title-rota">{{ $votacoes->titulo }}
                        </h1>
                        <hr>
                        <h6 class="card-text ps-1"><b>Categoria: {{ $categoria->nome }}</b></h6>

                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 text-dark bg-light">
            <div class="card-body">
                <form method="POST" action="{{ route('votacao.rodada') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="votacao_id" value="{{ $votacoes->id }}">
                    <input type="hidden" name="categoria_id" value="{{ $categoria->id }}">
                    <div class="candidatos md-12 mt-5">
                        @foreach(array_chunk($nome, 2) as $pares)
                        <div class="pares" id="row-picture" style="display: none;">
                            <div class="row d-flex justify-content-center">
                                @foreach($pares as $candidato)
                                <div class="col-md-6">
                                    <div class="candidato-card" style="background-image: url('{{ asset('img/candidatos/' . $candidato['foto']) }}');"></div>
                                    <h6 class="mt-3"><b>{{ $candidato['nome'] }}</b></h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="selecionados[]" value="{{ $candidato['id'] }}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <h4>Dentro?</h4>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-12 d-flex justify-content-center mt-3">
                        @if($txt != null)
                        <input type="submit" class="new btn btn-purple" style="display: none;" value="{{ $txt }}">
                        @else
                        <input type="submit" class="new btn btn-purple" style="display: none;" value="Próxima Rodada">
                        @endif
                    </div>
                </form>

                <div class=" col-md-12 d-flex justify-content-center mt-3">
                    <button id="btn" class="btn btn-purple">Próximo</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    var par = document.querySelectorAll('.pares');
    var index = 0;
    var btn = document.getElementById('btn');
    var candidatosContainer = document.querySelector('.candidatos');
    var iniciarNovaEtapa = document.querySelector('.new');

    btn.addEventListener('click', function() {
        par[index].style.display = 'none';
        index = (index + 1) % par.length;

        if (index === 0) {
            iniciarNovaEtapa.style.display = 'block';
            candidatosContainer.style.display = 'none';
            btn.style.display = 'none';

        } else {
            iniciarNovaEtapa.style.display = 'none';
            candidatosContainer.style.display = 'block';
        }

        par[index].style.display = 'block';
    });

    // Exibir o primeiro item
    par[index].style.display = 'block';
</script>


@endsection