<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 17.09.15
 * Time: 16:23
 */ ?>
@extends('layout.layout')

@section('content')

    {{$messages}}
    <div class="container">
        <h1>Buy ninja points</h1>
    </div>
    <div class="accountInfo">
        <div class="container">

            {{ Form::open(array('class' => 'form-horizontal', 'action' => 'DepositController@index')) }}

                <div class="form-group">
                    <label for="points" class="control-label">Points:</label>
                    {{ Form::text('points', null, ['placeholder' => 'Number oj points', 'class' => 'form-control', 'id' => 'points']) }}
                </div>


                <div class="form-group">
                    <label for="platform" class="control-label">Platform:</label>
                    <select name="platform" class="form-control" id="platform">
                        <option value="0">Select your platform</option>
                        <option value="PC">Origin</option>
                        <option value="XboX">XboX</option>
                        <option value="Playstation">Playstation</option>
                    </select>
                </div>

            <div class="form-group">
                <label for="email" class=" control-label">Origin Email(WEB APP):</label>
                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Origin Password(WEB APP):</label>
                {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
            </div>


            <div class="form-group">
                <label for="email" class=" control-label">XBOX Microsoft Email Address:</label>
                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
            </div>
            <div class="form-group">
                <label for="password" class="control-label">XBOX Microsoft Password:</label>
                {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
            </div>

            <div class="form-group">
                <label for="email" class=" control-label">PSN Email Address:</label>
                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
            </div>
            <div class="form-group">
                <label for="password" class="control-label">PSN Password:</label>
                {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
            </div>


            {{ Form::submit("buy", ['class' => 'btn btn-primary']) }}



            {{ Form::close() }}


            </div>
        </div>

@stop