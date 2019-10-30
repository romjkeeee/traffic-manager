{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.name')</h3>
        </div>
    <div class="panel panel-default">
        <div class="card-body">
            <form action="{{ route('offers.update', $data) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <?php
                $form_fields = array(
                    'url',
                    'countries_id',
                    'application_id',
                    'deeplink',
                );

                ?>
                @foreach($form_fields as $field)
                    <div class="form-group">
                        <label for="inputFor{{ $field }}">@lang('adminlte.'.$field)</label>
                        <input class="form-control"  style="" class="" name="{{ $field }}" id="input{{ $field }}"  placeholder="@lang('anketa.placeholder_'.$field)"  value="{{$data[$field]}}" >
                    </div>
                @endforeach



                <div class="form-group">
                    <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                    <a href="{{ route('offers.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
