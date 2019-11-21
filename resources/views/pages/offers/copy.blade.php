{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('adminlte.copy_offer')</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('offers.store') }}" method="POST">
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'url',
                        'countries_id',
                        'application_id',
                        'deeplink',
                    );
                    ?>

                    <div class="form-group">
                        <label for="inputForurl">@lang('adminlte.url')</label>
                        <input class="form-control"  style="" name="url" id="inputurl" value="{{ $data->url }}">
                    </div>
                    <?php $selected_countries = json_decode($data->countries_id,true);  ?>
                    <div class="form-group">
                        <label for="inputForurl">@lang('adminlte.countries_id')</label>
                        <p><select name="countries_id[]" multiple>


                                @foreach($countries as $strana)
                                    @if( in_array($strana->id, $selected_countries))
                                        <option value="{{ $strana->id }}" selected>{{ $strana->name }}</option>
                                    @else
                                        <option value="{{ $strana->id }}">{{ $strana->name }}</option>
                                    @endif
                                @endforeach
                            </select></p>
                    </div>
                    <div class="form-group">
                        <label>@lang('adminlte.application')</label>
                        <p><select name="application_id">
                                <option selected disabled>Выберите приложение</option>
                                @foreach($app as $key => $application)
                                    @if($key == $data->application_id)
                                        <option value="{{ $key }}" selected>{{ $application }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $application }}</option>
                                    @endif
                                @endforeach
                            </select></p>
                    </div>
                    <div class="form-group">
                        <label>@lang('adminlte.user')</label>
                        <p><select name="user_id">
                                <option selected disabled>Выберите пользователя</option>
                                @foreach($user as $key => $master)
                                    @if($key == $data->user_id)
                                        <option value="{{ $key }}" selected>{{ $master }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $master }}</option>
                                    @endif
                                @endforeach
                            </select></p>
                    </div>

                    <div class="form-group">
                        <label for="inputForadd_param">@lang('adminlte.add_param')</label>
                        <input class="form-control" value="{{ $data->add_param }}" type="number" step="1" min="0" style="" name="add_param" id="add_param" >
                    </div>

                    <div class="form-group">
                        <label for="inputForcomment">@lang('adminlte.comment')</label>
                        <input class="form-control"  style="" name="comment" id="inputcomment" value="{{ $data->comment }}">
                    </div>



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



        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
@stop