@extends('template.template')
@section('PageTitle','Личный кабинет')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="sidebar">
                <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    <li>
                        <a href="/api_access"><i class="icon-chevron-right"></i>Ключи</a>
                    </li>
                </ul>
            </div>

            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid">
                    <h4>Список ключей для доступа к API</h4>
                    <br>
                    <button class="btn btn-success" id="generateKey">Cгенерировать ключ</button>
                    <img id="progress_img" src="/img/loading.gif">
                    <br><br>
                    @if(count($keys) > 0)
                        <ul>
                            @foreach($keys as $key)
                            <li>{{$key->key}} <a class="delete" style="color: brown;cursor: pointer; text-decoration: none" data-keyid="{{$key->id}}">&nbsp;&nbsp;Удалить</a></li>
                            @endforeach
                        </ul>
                    @else
                       <i>Вы еще не создали ниодного ключа</i>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('custom_js')
    <script type="text/javascript">
        var csrf = '{{ csrf_token() }}';
        $(document).ready(function(){
            $('#progress_img').hide();
            $('#generateKey').prop('disabled', false);
        });

        $('#generateKey').on('click', function(event) {
            $('#generateKey').prop('disabled', true);
            $('#progress_img').show();
            $.ajax({
                type: "POST",
                url: "/ajax/generate_key",
                data: {
                    _token: csrf
                },
                dataType: 'json',
                success: function (data) {
                    $('#generateKey').prop('disabled', false);
                    $('#progress_img').hide();
                    location.reload();
                }
            });
        });

        $('.delete').on('click', function (event) {
            var id = $(this).data('keyid');
            $.ajax({
                type: "POST",
                url: "/ajax/delete_key",
                data: {
                    key_id: id,
                    _token: csrf
                },
                dataType: 'json',
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>
@stop