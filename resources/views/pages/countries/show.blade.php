{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.countries')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>@lang('adminlte.name')</label>
                    <input class="form-control" value="<?=$data->name?>" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('countries.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

        </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
