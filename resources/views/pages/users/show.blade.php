{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.users')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>@lang('adminlte.name_user')</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>@lang('adminlte.email')</label>
                    <input class="form-control" value="{{ $data->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>@lang('adminlte.role')</label>
                    <input class="form-control" value="{{ $data->role }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
