<p>
    Olá {{ $user_name }}, esta é a home <br>
    @if (session()->exists('message'))         
        <p class="message">{{ session()->get('message') }}</p>
    @endif

    <table>
        <tr>
            <th>
                Diâmetro
            </th>
            <th>
                Raio de Canto
            </th>
            <th>
                Comprimento
            </th>
        </tr>

        @foreach ($all_tools as $tool)
            <tr>
                <td>{{ $tool->diameter }}</td>
                <td>{{ $tool->radius }}</td>
                <td>{{ $tool->length }}</td>                
            </tr>
        @endforeach
    </table>
</p>
<a href="{{ route('createTool') }}">Cadastrar Nova Ferramenta</a>
<br>
<a href="{{ route('logout') }}">Sair</a>