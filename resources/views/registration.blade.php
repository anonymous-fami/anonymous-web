<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Регистрация нового аккаунта</title>

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
                <h2 class="form-signin-heading">Регистрация</h2>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="name" type="text" class="form-control" placeholder="Имя" required autofocus>
                <input name="login" type="text" class="form-control" placeholder="Логин" required>
                <input name="password" type="password" class="form-control" placeholder="Пароль" required>
                <input name="re_password" type="password" class="form-control" placeholder="Повторите пароль" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
                <br>
                <a href="/login">У меня уже есть аккаунт</a>
            </form>
            @if(count($errors) > 0)
                <ul class="form_error">
                    @foreach($errors->all() as $error)
                        <li><strong>Ошибка!</strong> {{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div> <!-- /container -->

</body>
</html>