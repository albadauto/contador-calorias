@extends('template/template')
@section('content')
    @php
        $soma = 0
    @endphp
    <div style="text-align: center; margin-bottom: 10px">
        <h2>(Contador de calorias) Calorias Consumidas durante o mes {{ date('m') }}:</h2>
    </div>
    <div style="text-align: center">
        <h3>Café da manhã:</h3>
        @foreach($data['cafe'] as $relacafe)
            @if(date('m', strtotime($relacafe['created_at']) == date('m')))
                <p>{{ $relacafe['cafalimento']}} - <b>{{ $relacafe['cafkcal'] }} KCAL</b></p>
                @php
                    $soma += $relacafe['cafkcal']
                @endphp
            @endif

        @endforeach

        <h3>Almoço:</h3>
        @foreach($data['almoco'] as $relaalmoco)
            @if(date('m', strtotime($relacafe['created_at']) == date('m')))
                <p>{{ $relaalmoco['alalimento']}} - <b>{{ $relaalmoco['alkcal'] }} KCAL</b></p>
                @php
                    $soma += $relaalmoco['alkcal']
                @endphp
            @endif

        @endforeach

        <h3>Café da tarde:</h3>
        @foreach($data['cafetarde'] as $relacaftarde)
            @if(date('m', strtotime($relacaftarde['created_at']) == date('m')))
                <p>{{ $relacaftarde['caftalimento']}} - <b>{{ $relacaftarde['caftkcal'] }} KCAL</b></p>
                @php
                    $soma += $relacaftarde['caftkcal']
                @endphp
            @endif

        @endforeach

        <h3>Jantar:</h3>
        @foreach($data['jantar'] as $relajantar)
            @if(date('m', strtotime($relajantar['created_at']) == date('m')))
                <p>{{ $relajantar['jantalimento']}} - <b>{{ $relajantar['jantkcal'] }} KCAL</b></p>
                @php
                    $soma += $relajantar['jantkcal']
                @endphp
            @endif

        @endforeach

        <h2>Calorias totais ingeridas esse mês: {{ $soma }} KCAL</h2>
    </div>
@endsection
