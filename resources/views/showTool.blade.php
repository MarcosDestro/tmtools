@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ url(asset('css/createtools.css')) }}">
@endsection

@section('content')

    <div class="container">


        <form action="{{ route('updatetool', $tool->id) }}" method="POST">
            @csrf

            <h2>Atualizar Ferramenta</h2>

            @if (session()->exists('message'))         
                <p class="message">{{ session()->get('message') }}</p>
            @endif

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            <select name="type">
                <option value="Broca" {{ (old('type') == 'Broca' ? 'selected' : ( $tool->type == 'Broca' ? 'selected' : '' )) }} >Broca</option>
                <option value="Fresa" {{ (old('type') == 'Fresa' ? 'selected' : ( $tool->type == 'Fresa' ? 'selected' : '' )) }} >Fresa</option>
                <option value="Macho" {{ (old('type') == 'Macho' ? 'selected' : ( $tool->type == 'Macho' ? 'selected' : '' )) }} >Macho</option>
                <option value="Mandrilhadora" {{ (old('type') == 'Mandrilhadora' ? 'selected' : ( $tool->type == 'Mandrilhadora' ? 'selected' : '' )) }} >Mandrilhadora</option>
                <option value="Interpolador" {{ (old('type') == 'Interpolador' ? 'selected' : ( $tool->type == 'Interpolador' ? 'selected' : '' )) }} >Interpolador</option>
                <option value="Alargador" {{ (old('type') == 'Alargador' ? 'selected' : ( $tool->type == 'Alargador' ? 'selected' : '' )) }} >Alargador</option>
                <option value="Cabeçote" {{ (old('type') == 'Cabeçote' ? 'selected' : ( $tool->type == 'Cabeçote' ? 'selected' : '' )) }} >Cabeçote</option>
              </select>
            
            <input type="number" name="diameter" placeholder="Diâmetro" step="0.01" value="{{ old('diameter') ?? ( $tool->diameter ?? '' )}}">
            <input type="number" name="radius" placeholder="Raio" step="0.01" value="{{ old('radius') ?? ( $tool->radius ?? '' )}}">
            <input type="number" name="length" placeholder="Comprimento" step="0.01" value="{{ old('length') ?? ( $tool->length ?? '' )}}">
    
            <button type="submit">Atualizar</button>
    
        </form>
        <br>

        <a href="{{ route('tmtoolsall') }}">Voltar</a>

    </div>

@endsection