<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginDo(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $msg = "Dados inválidos!";
            return redirect()->route('login')->with([
                'message' => $msg
            ]);
        }

        var_dump($request->all());
    }
}
