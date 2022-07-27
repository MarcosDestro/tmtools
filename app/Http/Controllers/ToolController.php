<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tmtoolsAll()
    {
        $user_name = Auth::user()->name;
        $all_tools = Tool::all();

        return view('tmtoolsAll', [
            'user_name' => $user_name,
            'all_tools' => $all_tools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTool()
    {
        return view('createTool');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTool(Request $request)
    {
        $rules = [
            'type' => ['required'],
            'diameter' => ['required'],
            'radius' => ['required'],
            'length' => ['required'],
        ];
        $messages = [
            'required' => 'O campo :attribute é requerido.',
        ];

        $validate = $request->validate($rules, $messages);

        $toolCreate = Tool::create($request->all());

        if (!$toolCreate->save()) {
            return redirect()->back()->withInput()->withError();
        }

        return redirect()->route('tmtoolsall')->with([
            'message' => 'Ferramenta cadastrada com sucesso'
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTool($id)
    {
        $tool = Tool::find($id);

        return view('showTool', [
            'tool' => $tool
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTool(Request $request, $id)
    {
        $newTool = Tool::find($id);
        $newTool->fill($request->all());

        if (!$newTool->save()) {
            return redirect()->back()->withInput()->withError();
        }

        return redirect()->route('showtool', ['id' => $newTool->id])->with([
            'message' => 'Ferramenta atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletetool($id)
    {
        Tool::destroy($id);

        return redirect()->route('tmtoolsall')->with([
            'message' => 'Ferramenta apagada com sucesso'
        ]);;
    }
}
