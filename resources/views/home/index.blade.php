@extends('template/template')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">
                <h2>Contador de calorias </h2>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <h3>@if(date('H:i') >= '04:00' && date('H:i') < '12:00')
                        {{ 'Bom dia!' }}
                    @elseif(date('H:i') >= '12:00' && date('H:i') < '18:00')
                        {{ 'Boa tarde!' }}
                    @else
                        {{ 'Boa noite!' }}
                    @endif


                </h3>
            </div>
        </div>

        <div class="row  mb-5">
            <div class="col">
                <h4>Calorias consumidas hoje: <b>{{ $kcalTotal . ' KCAL'}}  </b>
                </h4>
            </div>
        </div>
    </div>
    @if($msg = Session::get('success'))
        <div class="container">
            <div class="alert alert-success text-center">
                {{ $msg }}
            </div>
        </div>

    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="container">
                <div class="text-center">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="container bg-warning text-black">
        <div class="row text-center">
            <div class="col">
                <h3>Café da manhã
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="abrirpopup('Café da manhã', '{{ @route('home.inserircafe') }}')">+
                    </button>
                </h3>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Alimento</th>
                <th scope="col">KCAL</th>
                <th scope="col">Quantidade (gramas)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(!is_null($result))
                @foreach($result['cafe'] as $cafe)
                    <tr>
                        <td>{{ $cafe->cafalimento }}</td>
                        <td>{{ $cafe->cafkcal }}</td>
                        <td>{{ $cafe->cafqtd }}</td>
                        <td><a href="{{ route('home.deletarkcal', ['tabela' => 'cafe', 'id' => $cafe->id]) }}"
                               class="btn btn-danger">Deletar</a></td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
    <div class="container bg-danger text-white">
        <div class="row text-center">
            <div class="col">
                <h3>Almoço
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="abrirpopup('Almoço', '{{ route('home.inseriralmoco') }}')">+
                    </button>
                </h3>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Alimento</th>
                <th scope="col">KCAL</th>
                <th scope="col">Quantidade (gramas)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(!is_null($result) && !is_null($result['almoco']))
                @foreach($result['almoco'] as $almoco)
                    <tr>
                        <td>{{ $almoco->alalimento }}</td>
                        <td>{{ $almoco->alkcal }}</td>
                        <td>{{ $almoco->alqtd }}</td>
                        <td><a href="{{ route('home.deletarkcal', ['tabela' => 'almoco', 'id' => $almoco->id]) }}"
                               class="btn btn-danger">Deletar</a></td>

                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>
    <div class="container bg-secondary text-white">
        <div class="row text-center">
            <div class="col">
                <h3>Café da tarde
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="abrirpopup('Café da tarde', '{{ route('home.inserircafetarde') }}')">+
                    </button>
                </h3>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Alimento</th>
                <th scope="col">KCAL</th>
                <th scope="col">Quantidade (gramas)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(!is_null($result) && !is_null($result['cafetarde']))
                @foreach($result['cafetarde'] as $cafetarde)
                    <tr>
                        <td>{{ $cafetarde->caftalimento }}</td>
                        <td>{{ $cafetarde->caftkcal }}</td>
                        <td>{{ $cafetarde->caftqtd  }}</td>
                        <td><a href="{{ route('home.deletarkcal', ['tabela' => 'cafetarde', 'id' => $cafetarde->id]) }}"
                               class="btn btn-danger">Deletar</a></td>

                    </tr>
                @endforeach

            @endif


            </tbody>
        </table>
    </div>
    <div class="container bg-light text-white">
        <div class="row text-center">
            <div class="col">
                <h3 class="text-dark">Jantar
                    <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="abrirpopup('Jantar', '{{ route('home.inserirjanta') }}')">+</button>
                </h3>
            </div>
        </div>
        <table class=" table table-striped table-hover
                    ">
                    <thead>
                    <tr>
                        <th scope="col">Alimento</th>
                        <th scope="col">KCAL</th>
                        <th scope="col">Quantidade (gramas)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!is_null($result['jantar']))
                        @foreach($result['jantar'] as $jantar)
                            <tr>
                                <td>{{ $jantar->jantalimento }}</td>
                                <td>{{ $jantar->jantkcal }}</td>
                                <td>{{ $jantar->jantqtd }}</td>
                                <td>
                                    <a href="{{ route('home.deletarkcal', ['tabela' => 'jantar', 'id' => $jantar->id]) }}"
                                       class="btn btn-danger">Deletar</a></td>

                            </tr>
                        @endforeach
                    @else
                        <div class="container text-center">
                            <h3>Não há dados</h3>
                        </div>
                    @endif
                    </tbody>
                    </table>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAdicionarKcal" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" name="alimento" placeholder="Alimento" type="text">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="kcal" placeholder="KCAL" type="number">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="gramas" placeholder="Qtd. (gramas)"
                                               type="number">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

@endsection

