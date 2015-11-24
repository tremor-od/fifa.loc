<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 29.01.15
 * Time: 17:21
 */ ?>

@extends('layout.layout')

@section('content')

    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="#">Main</a></li>
            <li class="active">Registration</li>
        </ol>
    </div>

    <div class="col-md-12">

        {{$messages}}

        <h2 class="text-center">Registration:</h2>

        {{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@registration')) }}

        <div class="form-group">
            <label for="login" class="col-sm-4 control-label">Login:</label>
            <div class="col-sm-7">
                {{ Form::text('login', null, ['placeholder' => 'login', 'class' => 'form-control', 'id' => 'login']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-4 control-label">password:</label>
            <div class="col-sm-7">
                {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password', 'autocomplete' => 'off']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-4 control-label">email:</label>
            <div class="col-sm-7">
                {{ Form::email('email', null, ['placeholder' => 'email', 'class' => 'form-control', 'id' => 'email']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-7">
                {{ Form::submit('Reg', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>


@stop
