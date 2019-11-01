{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('adminlte.offers')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">@lang('adminlte.offers')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('offers.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('adminlte.offers')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('adminlte.link')</th>
                            <th>@lang('adminlte.countries')</th>
                            <th>@lang('adminlte.application')</th>
                            <th>@lang('adminlte.user')</th>
                            <th>Deep Link</th>
                            <th>@lang('adminlte.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $offers)
                        <tr>
                        <td>{{$offers->id}}</td>
                        <td>{{ $offers->url }}</td>
                        <td>{{ $offers->countries_id? $offers->countries->name: '' }}</td>
                        <td>{{ $offers->application_id? $offers->applications->name: '' }}</td>
                        <td>{{ $offers->user_id? $offers->user->email: '' }}</td>
                        <td>{{ $offers->deeplink }}</td>
                        <td>
                        <a href="{{ route('offers.show',[$offers->id]) }}"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('offers.edit',[$offers->id]) }}"><i class="fas fa-edit"></i></a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
