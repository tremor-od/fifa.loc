<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.09.15
 * Time: 15:14
 */ ?>


@extends('admin.layout.layout')

@section('content')

    <div class="col-md-12">

        {{ Form::model($exchange, array('url' => '/admin/exchange', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="course" class="col-sm-2 control-label">Course(1 point = ):</label>
            <div class="col-sm-10">
                {{ Form::text('course', null, ['class' => 'form-control', 'id' => 'course']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{--<a class="btn btn-default btn-md" href="/admin/cardType">Back</a>--}}
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop