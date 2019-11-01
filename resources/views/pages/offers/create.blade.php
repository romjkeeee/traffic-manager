{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Создание предложения</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('offers.store') }}" method="POST">
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'url',
                        'countries_id',
                        'application_id',
                        'deeplink',
                    );
                    ?>

                        <div class="form-group">
                            <label for="inputForurl">@lang('adminlte.url')</label>
                            <input class="form-control"  style="" name="url" id="inputurl" >
                        </div>
                    <div class="form-group">
                        <label for="inputForurl">@lang('adminlte.countries_id')</label>
                        <p><select name="countries_id">
                            <option selected disabled>Выберите страну</option>
                            @foreach($countries as $key => $strana)
                                <option value="{{ $key }}">{{ $strana }}</option>
                            @endforeach
                        </select></p>
                    </div>
                    <div class="form-group">
                        <label>Приложения</label>
                        <p><select name="application_id">
                            <option selected disabled>Выберите приложение</option>
                            @foreach($app as $key => $application)
                                <option value="{{ $key }}">{{ $application }}</option>
                            @endforeach
                        </select></p>
                    </div>
                    <div class="form-group">
                        <label>@lang('adminlte.webmaster')</label>
                        <p><select name="user_id">
                            <option selected disabled>Выберите пользователя</option>
                            @foreach($user as $key => $master)
                                <option value="{{ $key }}">{{ $master }}</option>
                            @endforeach
                        </select></p>
                    </div>




                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                        <a href="{{ route('offers.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop



        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
@stop
