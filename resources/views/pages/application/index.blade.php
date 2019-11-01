{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('adminlte.application')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">@lang('adminlte.application')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('application.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('adminlte.application')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table   class="table table-responsive table-responsive" id="myTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('adminlte.name')</th>
                            <th>@lang('adminlte.link_android')</th>
                            <th>@lang('adminlte.link_ios')</th>
                            <th>@lang('adminlte.deeplink')</th>
                            <th>@lang('adminlte.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->name }}</td>
                                <td>{{ $application->link_android }}</td>
                                <td>{{ $application->link_ios }}</td>
                                <td style="width: 100%">{{ $application->deeplink }}</td>
                                <td>
                                    <a href="{{ route('application.show',[$application->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('application.edit',[$application->id]) }}"><i class="fas fa-edit"></i></a>
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
@section('js')
{{--        <script>--}}
{{--            $(document).ready(function() {--}}
{{--                $('#myTable').DataTable();--}}
{{--            } );--}}
{{--        </script>--}}
@stop
