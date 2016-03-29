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
                    </li>
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
                            GET <strong>$host/api/save_result?input_file=$input&output_file=$output&api_key=$api_key</strong><br><br>
                            -> <b>$host</b> текущий домен <br>
                            -> <b>$input</b> входные данные <br>
                            -> <b>$output</b> результат <br>
                            -> <b>$api_key</b> ваш ключ api<br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop