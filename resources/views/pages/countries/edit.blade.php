

    {{-- resources/views/admin/dashboard.blade.php --}}

    @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.countries_edit')</h3>
        </div>
    <div class="panel panel-default">
        <div class="card-body">
            <form action="{{ route('countries.update', $data) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                    <div class="form-group">
                        <label for="inputForName">@lang('adminlte.name')</label>
                        <input class="form-control"  style="" name="name" id="inputname"  placeholder="name"  value="{{ $data->name }}" >
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                    <a href="{{ route('countries.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>
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
