{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
    <link href="../node_modules/air-datepicker/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="../node_modules/air-datepicker/dist/js/datepicker.min.js"></script>

    @if($data != null)
    <form action="{{ route('offers.stat', $data->offers_id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="created_at" data-range="true" class="datepicker-here" data-language='ru' data-time-format='hh:ii aa'>
            <button class="btn-success">Искать</button>
        </div>
    </form>

        <div class="form-control">Переходов - {{ $data->redirect_view }}</div>
        <div class="form-control">Установок - {{ $data->install_view }}</div>
        <div class="form-control">Дата - {{ $data->created_at }}</div>
    @else
        <div>Нету данных</div>
        <a href="{{ route('offers.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>
    @endif
    <script>
        // Инициализация
        $('#my-element').datepicker([options])

        // Доступ к экземпляру объекта
        $('#my-element').data('datepicker')
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
