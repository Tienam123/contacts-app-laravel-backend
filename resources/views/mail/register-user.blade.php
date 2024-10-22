<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Добро пожаловать {{$user->name}}</h1>
   Перейдите пожалуйста по ссылке ниже для подтверждения вашего аккаунта
   <a href="{{route('verification.verify',['id'=>$user->id,'hash'=>\Illuminate\Support\Str::random(16)])}}">{{\Illuminate\Support\Str::random(16)}}</a>

   Если вы не регистрироввали аккаунт , просто проигнорируйте это сообщение

   Спасибо,
    Команда разработчик Kontaktler

</body>
</html>
