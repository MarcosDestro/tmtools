<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class ToolController extends Controller
{
    /** Display a listing of the resource. */
    public function tmtoolsAll()
    {
        // Pesquisa o nome de usuário
        $user_name = Auth::user()->name;

        // Busca todas as ferramentas do banco
        $all_tools = Tool::all();

        // Monta a view e repassa os dados
        return view('tmtoolsAll', [
            'user_name' => $user_name,
            'all_tools' => $all_tools
        ]);
    }

    /** Show the form for creating a new resource */
    public function createTool()
    {
        // Chama a view
        return view('createTool');
    }

    /** Store a newly created resource in storage */
    public function storeTool(Request $request)
    {
        // Regras para o campo
        $rules = [
            'type' => 'required',
            'diameter' => 'required',
            'radius' => 'required',
            'length' => 'required',
        ];

        // Mensagens para cada regra
        $messages = [
            'diameter.required' => 'O campo :attribute é obrigatório.',
            'radius.required' => 'O campo :attribute é obrigatório.',
            'length.required' => 'O campo :attribute é obrigatório.',
        ];

        // $request->validate($rules); // Validação simples

        // Cria uma validação dos campos, passando as regras e as mensagens
        $validate = Validator::make($request->all(), $rules, $messages);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        // Cria a ferramenta
        $toolCreate = Tool::create($request->all());

        // Caso não salve por algum motivo
        if (!$toolCreate->save()) {
            return redirect()->back()->withInput()->withError();
        }

        // Caso sucesso
        return redirect()->route('tmtoolsall')->with([
            'message' => 'Ferramenta cadastrada com sucesso'
        ]);;
    }

    /** Display the specified resource */
    public function showTool($id)
    {
        // Encontra a ferramenta pelo id
        $tool = Tool::find($id);

        // Monta a view e passa os parâmetros
        return view('showTool', [
            'tool' => $tool
        ]);
    }

    /** Update the specified resource in storage */
    public function updateTool(Request $request, $id)
    {
        // Pesquisa a ferramenta pelo id
        $newTool = Tool::find($id);
        // Alimenta com os novos dados
        $newTool->fill($request->all());

        // Caso não salve
        if (!$newTool->save()) {
            // Retornar com os erros
            return redirect()->back()->withInput()->withError();
        }

        // Caso sucesso
        return redirect()->route('showtool', ['id' => $newTool->id])->with([
            'message' => 'Ferramenta atualizado com sucesso!'
        ]);
    }

    /** Remove the specified resource from storage */
    public function deletetool($id)
    {
        // Pesquisa a ferramenta pelo id e deleta do banco
        Tool::destroy($id);

        // Caso sucesso
        return redirect()->route('tmtoolsall')->with([
            'message' => 'Ferramenta apagada com sucesso'
        ]);;
    }
}
