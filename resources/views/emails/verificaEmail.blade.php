<!DOCTYPE html>
<html>
    <head>
        <title>Verificação de email</title>
    </head>
    <body>
        <h2>Bem vindo ao site, {{$user['name']}}!</h2>
        <br/>
        Você se registrou com o email: {{$user['email']}} , por favor, clique no link a seguir para verificar se esse é realmente teu email.
        <br/>
        <a href="{{url('user/verify', $user->token)}}">Verifique Teu Email</a>
    </body>
</html>
