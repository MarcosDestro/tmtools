<div>
    Olá {{ $user_name }}, esta é a home <br>
    @if (session()->exists('message'))         
        <p class="message">{{ session()->get('message') }}</p>
    @endif

    @if (!count($all_tools))

        <div>
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
                        <a href="">Editar</a>
                        <a
                            href="{{ route('deletetool', ['id' => $tool->id]) }}"
                            onclick="return confirm('Tem certeza que deseja excluir?')"
                        >Excluir</a>
                    </td>           
                </tr>
            @endforeach
        </table>

    @endif

</div>
<a href="{{ route('createTool') }}">Cadastrar Nova Ferramenta</a>
<br>
<a href="{{ route('logout') }}">Sair</a>