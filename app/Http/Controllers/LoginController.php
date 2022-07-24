<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        /** Verifica se existe uma sessão ativa, caso sim redirecione */
        if (Auth::check() === true) {
            return redirect()->route('tmtoolsAll');
        }

        return view('login');
    }


    public function loginDo(Request $request)
    {
        // Se no array possuir qualquer dado em branco, dentre as posições...
        if (in_array('', $request->only('email', 'password'))) {
            $msg = "Dados inválidos!";
            return redirect()->route('login')->with([
                'message' => $msg
            ]);
        }

        // Se o email for inválido...
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Informe um e-mail válido";
            return redirect()->route('login')->with([
                'message' => $msg,
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Se as credenciais para login não forem válidas...
        if (!Auth::attempt($credentials)) {
            $msg = "Dados não conferem!";
            return redirect()->route('login')->with([
                'message' => $msg
            ]);
        }

        // Salva o último login passando o ip do $request
        $this->authenticated($request->getClientIp());

        // Direciona para a rota de admin
        return redirect()->route('tmtoolsAll');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }

    public function logout(Request $request)
    {
        // Desloga o usuário
        Auth::logout();

        // Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Joga pra login
        return redirect()->route('login');
    }
}
