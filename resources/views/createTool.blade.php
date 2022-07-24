@extends('layout.layout')

@section('content')

    <div class="container">

        <form action="{{ route('storetool') }}" method="POST">
            @csrf

            <h2>Cadastar Ferramenta</h2>

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            <input type="number" name="diameter" placeholder="Diâmetro" step="0.01">
            <input type="number" name="radius" placeholder="Raio" step="0.01">
            <input type="number" name="length" placeholder="Comprimento" step="0.01">
    
            <button type="submit">Cadastrar</button>
    
        </form>

    </div>

@endsection