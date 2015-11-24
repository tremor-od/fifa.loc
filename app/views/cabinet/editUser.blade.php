<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 11.09.15
 * Time: 11:00
 */ ?>
@extends('layout.layout')

@section('content')

    {{$messages}}
    <div class="container">
        <h1>Edit creds</h1>
    </div>
    <div class="accountInfo">
        <div class="container">


            {{ Form::model($user, array('url' => '/cabinet/editUser', 'class' => 'form-horizontal')) }}

            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">Login:</label>
                <div class="col-sm-10">
                    {{ Form::text('login', null, ['class' => 'form-control', 'id' => 'login', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="nickname" class="col-sm-2 control-label">Nickname:</label>
                <div class="col-sm-10">
                    {{ Form::text('nickname', null, ['class' => 'form-control', 'id' => 'nickname']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-sm-2 control-label">User url:</label>
                <div class="col-sm-10">
                    {{ Form::text('url', null, ['class' => 'form-control', 'id' => 'url']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="company_name" class="col-sm-2 control-label">Company name:</label>
                <div class="col-sm-10">
                    {{ Form::text('company_name', null, ['class' => 'form-control', 'id' => 'company_name']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="company_address" class="col-sm-2 control-label">Company address:</label>
                <div class="col-sm-10">
                    {{ Form::text('company_address', null, ['class' => 'form-control', 'id' => 'company_address']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="vat_no" class="col-sm-2 control-label">VAT NO.:</label>
                <div class="col-sm-10">
                    {{ Form::text('vat_no', null, ['class' => 'form-control', 'id' => 'vat_no']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Contact phone:</label>
                <div class="col-sm-10">
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="skype" class="col-sm-2 control-label">Skype:</label>
                <div class="col-sm-10">
                    {{ Form::text('skype', null, ['class' => 'form-control', 'id' => 'skype']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="qq_number" class="col-sm-2 control-label">QQ number:</label>
                <div class="col-sm-10">
                    {{ Form::text('qq_number', null, ['class' => 'form-control', 'id' => 'qq_number']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-default btn-md" href="/cabinet">Back</a>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop