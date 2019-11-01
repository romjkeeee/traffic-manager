{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Внешние ссылки</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Внешние ссылки</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')

    <?php
    $form_fields = array(
        'id',
        'application_id',
        'black_link',
        'webmaster_id',
        'offer_id',
        'sub1',
        'sub2',
        'sub3',
        'comment',
    );

    ?>
    <div class="primary">
        <p>
    <a href="{{ route('deep_link.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>User</th>
                    @foreach($form_fields as $fields)
                        <th>@lang('adminlte.'.$fields)</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>

                @foreach($data as $deeplink)

                    <form action="{{ route('deep_link.update', $deeplink) }}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                    <tr>
                        <td>{{ \Auth::user()->email }}</td>
                    <td>
                        <p class="form-control-static">{{ $deeplink->id }}</p>
                    </td>
                        <td>
                        <p class="form-control-static">{{ $deeplink->application_id }}</p>
                    </td>
                    <td>
                        <input name="black_link" id="black_link" type="text" class="form-control" size="16" value="{{ $deeplink->black_link }}">
                            <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="webmaster_id" id="webmaster_id" type="text" class="form-control" size="16" value="{{ $deeplink->webmaster_id }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="offer_id" id="offer_id" type="text" class="form-control" size="16" value="{{ $deeplink->offer_id }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="sub1" id="sub1" type="text" class="form-control" size="16" value="{{ $deeplink->sub1 }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="sub2" id="sub2" type="text" class="form-control" size="16" value="{{ $deeplink->sub2 }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="sub3" id="sub3" type="text" class="form-control" size="16" value="{{ $deeplink->sub3 }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    <td>
                        <input name="comment" id="comment" type="text" class="form-control" size="16" value="{{ $deeplink->comment }}">
                        <button type="submit"><i class="fas fa-save"></i></button>
                    </td>
                    </tr>
                    </form>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

