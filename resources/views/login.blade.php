<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Авторизация пользователя</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/old_bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-signin" role="form" method="POST">
                <h2 class="form-signin-heading">Вход в личный кабинет</h2>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="login" type="text" class="form-control" placeholder="Логин" required autofocus>
                <input name="password" type="password" class="form-control" placeholder="Пароль" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                <br>
                <a href="/registration">Регистрация</a>
            </form>
            @if(count($errors) > 0)
                <ul class="form_error">
                @foreach($errors->all() as $error)
                    <li><strong>Ошибка!</strong> {{$error}}</li>
                @endforeach
                </ul>
            @endif
            @if(Session::has('success'))
                <label style="color: #116a26;" class="form_text"><strong>Поздравляем!</strong> {{Session::get('success')}}</label>
            @endif
        </div>
    </div>
</div> <!-- /container -->

</body>
</html>