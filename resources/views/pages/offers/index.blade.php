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
    @if(\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Admin' || \Auth::user()->role == 'WebMaster')
        <div class="primary">
        <p>
            <a href="{{ route('offers.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>
    @endif
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
                            <th>@lang('adminlte.add_param')</th>
                            <th>@lang('adminlte.comment')</th>
                            <th>Deep Link</th>
                            <th>@lang('adminlte.redirect')</th>
                            <th>@lang('adminlte.install')</th>
                            <th>@lang('adminlte.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $offers)
                        <tr>
                        <td>{{$offers->id}}</td>
                        <td>{{ $offers->url }}</td>
                        <td>
                            <?php
                                $country = json_decode($offers->countries_id, true);
                                foreach ($country as $countys => $key ){
                                    echo $countries[$key-1]['name'].' ';
                                }
                            ?>

                        </td>
                        <td>{{ $offers->application_id? $offers->applications->name: '' }}</td>
                        <td>{{ $offers->user_id? $offers->user->email: '' }}</td>
                        <td>{{ $offers->add_param }}</td>
                        <td>{{ $offers->comment }}</td>
                        <td>{{ $offers->deeplink }}</td>
                        <td>{{ $offers->redirect }}</td>
                        <td>{{ $offers->install }}</td>
                            @if(\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Admin' || \Auth::user()->role == 'WebMaster')
                            <td>
                        <a href="{{ route('offers.show',[$offers->id]) }}"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('offers.edit',[$offers->id]) }}"><i class="fas fa-edit"></i></a>
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
