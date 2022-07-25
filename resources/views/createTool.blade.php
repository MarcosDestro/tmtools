@extends('layout.layout')

@section('content')

    <div class="container">

        <form action="{{ route('storetool') }}" method="POST">
            @csrf

            <h2>Cadastar Ferramenta</h2>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            <select name="type">
                <option value="Broca" {{ (old('type') == 'Broca' ? 'selected' : '') }} >Broca</option>
                <option value="Fresa" {{ (old('type') == 'Fresa' ? 'selected' : '') }} >Fresa</option>
                <option value="Macho" {{ (old('type') == 'Macho' ? 'selected' : '') }} >Macho</option>
                <option value="Mandrilhadora" {{ (old('type') == 'Mandrilhadora' ? 'selected' : '') }} >Mandrilhadora</option>
                <option value="Interpolador" {{ (old('type') == 'Interpolador' ? 'selected' : '') }} >Interpolador</option>
                <option value="Alargador" {{ (old('type') == 'Alargador' ? 'selected' : '') }} >Alargador</option>
                <option value="Cabeçote" {{ (old('type') == 'Cabeçote' ? 'selected' : '') }} >Cabeçote</option>
              </select>
            
            <input type="number" name="diameter" placeholder="Diâmetro" step="0.01" value="{{ old('diameter') ?? ''}}">
            <input type="number" name="radius" placeholder="Raio" step="0.01" value="{{ old('radius') ?? ''}}">
            <input type="number" name="length" placeholder="Comprimento" step="0.01" value="{{ old('length') ?? ''}}">
    
            <button type="submit">Cadastrar</button>
    
        </form>
        <br>

        <a href="{{ route('tmtoolsall') }}">Voltar</a>

    </div>

@endsection