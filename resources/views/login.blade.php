<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login | Teste</title>
</head>
<body>

    <div class="container">
        <form action={{ route('loginDo') }} method="POST">
            @csrf
            <h2>Login</h2>

            @if (session()->exists('message'))         
                    <p class="message">{{ session()->get('message') }}</p>
            @endif

            <label> E-mail: </label>
                <input type="email" name="email">

            <label> Senha: </label>
                <input type="password" name="password">
                <br>


            <button type="submit">Entrar</button>
        </form>
    </div>
    
</body>
</html>