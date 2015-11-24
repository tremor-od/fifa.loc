
@extends('layout.layout')

@section('content')

    {{$messages}}
<h2 class="text-center">Login:</h2>

{{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@loginAdmin')) }}

    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Login:</label>
        <div class="col-sm-10">
            {{ Form::text('login', null, ['placeholder' => 'login', 'class' => 'form-control', 'id' => 'login']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
            {{ Form::text('password', null, ['placeholder' => 'pass', 'class' => 'form-control', 'id' => 'password', 'autocomplete' => 'off']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    {{Form::checkbox('remember', '1');}} remember
                </label>
                <label>
                    {{--<a href="/auth/forgot" class="forgotPassword">{{trans('note.auth.forgotPass')}}</a>--}}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit("Enter", ['class' => 'btn btn-primary']) }}
        </div>
    </div>
{{ Form::close() }}

@stop