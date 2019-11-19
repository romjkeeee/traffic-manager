{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.application_copy')</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('application.store') }}" method="POST">
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'name',
                        'link_android',
                        'link_ios',
                        'comment',
                        'deeplink',
                    );

                    ?>
                    @foreach($form_fields as $field)
                        <div class="form-group">
                            <label for="inputFor{{ $field }}">@lang('adminlte.'.$field)</label>
                            <input class="form-control"  style="" class="" name="{{ $field }}" id="input{{ $field }}"  placeholder="@lang('anketa.placeholder_'.$field)"  value="{{$data[$field]}}" >
                        </div>
                    @endforeach

                    @if(\Auth::user()->role == 'SuperAdmin')
                        <div class="form-group">
                            <label for="inputForurl">@lang('adminlte.organisation_id')</label>
                            <p><select name="organisation_id">
                                    <option selected disabled>Выберите организацию</option>
                                    @foreach($organisation as $key => $org)
                                        @if($key == $data->organisation_id)
                                            <option value="{{ $key }}" selected>{{ $org }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $org }}</option>
                                        @endif
                                    @endforeach
                                </select></p>
                        </div>
                    @endif



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                        <a href="{{ route('application.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

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
