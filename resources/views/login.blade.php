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
            <h2>LOGIN</h2>

            @if (session()->exists('message'))         
                <p class="message">{{ session()->get('message') }}</p>
            @endif

            
            <div class="input-content">
                <div class="icon">        
                    <img src="{{ url(asset('/svgs/regular/envelope.svg')) }}" alt="">     
                </div>
                <input type="email" name="email" placeholder="E-mail">
            </div>
            <br>
            <div class="input-content">
                <div class="icon">
                    <img src="{{ url(asset('/svgs/solid/user-lock.svg')) }}" alt="">     
                </div>

                <input type="password" name="password" placeholder="Senha">
            </div>

            <button type="submit">ENTRAR</button>
        </form>
    </div>

    
</body>
</html>