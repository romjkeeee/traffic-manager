{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('adminlte.users')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">@lang('adminlte.users')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if(\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Admin')
        <div class="primary">
        <p>
            <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('adminlte.users')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table   class="table table-responsive table-responsive" id="myTable">
                        <thead>
                        <tr>
                            <th>@lang('adminlte.name_user')</th>
                            <th>@lang('adminlte.email')</th>
                            <th>@lang('adminlte.role')</th>
                            @if(\Auth::user()->role == 'SuperAdmin')
                            <th>@lang('adminlte.organisation_id')</th>
                            <th>@lang('adminlte.action')</th>
                                @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td style="width: 100%">{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                @if(\Auth::user()->role == 'SuperAdmin')
                                    <td>{{ $user->organisation_id? $user->organisation->name: '' }}</td>
                                    <td>
                                    <a href="{{ route('users.show',[$user->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('users.edit',[$user->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                    @endif
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
