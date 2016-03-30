@extends('template.template')
@section('PageTitle','Личный кабинет')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li class="active">
                        <a href="/"><i class="icon-chevron-right"></i> Информация</a>
                    </li>
                    <li>
                        <a href="/store_results"><i class="icon-chevron-right"></i> Хранилище результатов</a>
                    </li>r
                </ul>
            </div>

            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid">
                    <h4>Добро пожаловать, {{Auth::user()->name}}!</h4>
                    <p>Для работы с приложением необходимо сгенерировать API ключ. Без него доступа к методам нет.</p>
                    <h5>Примеры запросов</h5>
                    <ul>
                        <li>
                            POST <strong>$host/api/save_result?api_key=$api_key</strong><br><br>
                            === Переменные ===
                            -> <b>$host</b> текущий домен (POST)<br>
                            -> <b>$matrix</b> входные данные(матрица) (POST)<br>
                            -> <b>$vector</b> входные данные(пр.часть) (POST)<br>
                            -> <b>$pribl</b> входные данные(приближение) (POST)<br>
                            -> <b>$result</b> результат (POST)<br>
                            -> <b>$api_key</b> ваш ключ api (GET url)<br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop