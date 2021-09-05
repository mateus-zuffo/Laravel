@extends('layout')

@section('cabecalho')
    Temporadas
@endsection

@section('conteudo')

    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item">Temporada {{ $temporada->numero}}</li>
        @endforeach
    </ul>
    
@endsection