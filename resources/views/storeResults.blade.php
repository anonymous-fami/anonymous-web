@extends('template.template')
@section('PageTitle','Хранилище результатов')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li>
                        <a href="/"><i class="icon-chevron-right"></i> Информация</a>
                    </li>
                    <li class="active">
                        <a href="/store_results"><i class="icon-chevron-right"></i> Хранилище результатов</a>
                    </li>
                </ul>
            </div>

            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid">
                    <h4>Хранилище результатов</h4>
                    <br>
                    @if(count($results) > 0)
                        <ul>
                            @foreach($results as $result)
                            <li>
                                <b>{{$result['date']}}</b> - <a href="{{$result['input']}}" target="_blank" download>Входные данные</a> - <a target="_blank" href="{{$result['output']}}" download>Результат</a><br>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <i>Вы пока не выгружали ниодного результата.</i>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop