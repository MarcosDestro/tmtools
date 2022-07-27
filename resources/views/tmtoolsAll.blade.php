@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ url(asset('css/toolsall.css')) }}">
@endsection

@section('content')
    <div class="container_tools_all">
        <h3>
            Olá {{ $user_name }}, esta é a home
        </h3>
        @if (session()->exists('message'))         
            <p class="message">{{ session()->get('message') }}</p>
        @endif

        @if (!count($all_tools))

            <div class="message">
                Ainda não existem ferramentas cadastradas no sistema.
            </div>

        @else

            <table>
                <tr>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Diâmetro
                    </th>
                    <th>
                        Raio de Canto
                    </th>
                    <th>
                        Comprimento
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>

                @foreach ($all_tools as $tool)
                    <tr>
                        <td>{{ $tool->type }}</td>
                        <td>{{ $tool->diameter }}</td>
                        <td>{{ $tool->radius }}</td>
                        <td>{{ $tool->length }}</td>
                        <td>
                            <a
                                href="{{ route('showtool', ['id' => $tool->id]) }}"
                            >
                                <img src="{{ url(asset('svgs/solid/pen-to-square.svg')) }}" alt="Editar">
                            </a>
                            <a
                                href="{{ route('deletetool', ['id' => $tool->id]) }}"
                                onclick="return confirm('Tem certeza que deseja excluir?')"
                            >
                                <img src="{{ url(asset('svgs/solid/trash.svg')) }}" alt="">        
                            </a>
                        </td>           
                    </tr>
                @endforeach
            </table>

        @endif

    </div>
    <a href="{{ route('createTool') }}">Cadastrar Nova Ferramenta</a>
    <br>
    <a href="{{ route('logout') }}">Sair</a>
@endsection
