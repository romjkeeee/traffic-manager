{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@lang('adminlte.organisation')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('adminlte.home')</a></li>
                    <li class="breadcrumb-item active">@lang('adminlte.organisation')</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if(\Auth::user()->role == 'SuperAdmin')
        <div class="primary">
        <p>
            <a href="{{ route('organisation.create') }}" class="btn btn-success btn-lg">@lang('adminlte.create')</a>
        </p>
    </div>
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('adminlte.organisation')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table   class="table table-responsive table-responsive" id="myTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('adminlte.name')</th>
                            <th>@lang('adminlte.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $organisation)
                            <tr>
                                <td>{{ $organisation->id }}</td>
                                <td>{{ $organisation->name }}</td>
                                <td>
                                    <a href="{{ route('organisation.show',[$organisation->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('organisation.edit',[$organisation->id]) }}"><i class="fas fa-edit"></i></a>
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
