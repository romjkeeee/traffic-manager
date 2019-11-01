{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Создание приложения</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('application.store') }}" method="POST">
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'name',
                        'link_android',
                        'link_ios',
                        'deeplink',
                    );
                    ?>
                    @foreach($form_fields as $field)
                        <div class="form-group">
                            <label for="inputFor{{ $field }}">@lang('adminlte.'.$field)</label>
                            <input class="form-control"  style="" name="{{ $field }}" id="input{{ $field }}" >
                        </div>
                    @endforeach



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                        <a href="{{ route('application.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

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
