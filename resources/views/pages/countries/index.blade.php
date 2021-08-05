{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('adminlte.countries')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('adminlte.home')</a></li>
                    <li class="breadcrumb-item active">@lang('adminlte.countries')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('countries.create') }}" class="btn btn-success btn-lg">@lang('adminlte.create')</a>
        </p>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Страны</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('adminlte.code')</th>
                            <th>@lang('adminlte.name')</th>
                            <th>@lang('adminlte.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $countries)
                            <tr>
                                <td>{{ $countries->id }}</td>
                                <td>{{ $countries->code }}</td>
                                <td>{{ $countries->name }}</td>
                                <td>
                                    <a href="{{ route('countries.show',[$countries->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('countries.edit',[$countries->id]) }}"><i class="fas fa-edit"></i></a>
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
