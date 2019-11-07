{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.application_edit')</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('users.update', $data) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'name',
                        'email',
                        'role_id',
                    );

                    ?>
                    @foreach($form_fields as $field)
                        @if($field == 'role_id')
                            <div class="form-group">
                                <label for="inputForurl">@lang('adminlte.role_id')</label>
                                <p><select name="countries_id">
                                        <option selected disabled>Выберите роль</option>
                                        @foreach($roles as $key => $role)
                                            @if($key == $data->role_id)
                                                <option value="{{ $key }}" selected>{{ $role }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $role }}</option>
                                            @endif
                                        @endforeach
                                    </select></p>
                            </div>
                            @else
                        <div class="form-group">
                            <label for="inputFor{{ $field }}">@lang('adminlte.'.$field)</label>
                            <input class="form-control"  style="" class="" name="{{ $field }}" id="input{{ $field }}"  placeholder="@lang('anketa.placeholder_'.$field)"  value="{{$data[$field]}}" >
                        </div>
                        @endif
                    @endforeach



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">@lang('adminlte.save')</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default">@lang('adminlte.backtolist')</a>

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
