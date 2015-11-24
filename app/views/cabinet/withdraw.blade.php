<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.09.15
 * Time: 15:34
 */ ?>

@extends('layout.layout')

@section('content')

    {{$messages}}

    You have {{$user->coins['coins']}} coins
    <div class="accountInfo">
        <div class="container">
            <form action="{{ action('CabinetController@withdraw') }}" method="POST">
                <input type="text" name="coins">
                <input type="submit" value="Withdraw coins">
            </form>
        </div>
    </div>
@stop