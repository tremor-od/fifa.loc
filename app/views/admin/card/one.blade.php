<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <div class="col-md-12">

        <a href="/admin/cardAction/add" title="add card" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-plus"></span> Add new type
        </a>

        {{ Form::model($card, array('url' => '/admin/cardAction/edit/'.$card->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="title" class="col-sm-2 control-label">Title:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="rating" class="col-sm-2 control-label">Rating:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('rating', null, ['class' => 'form-control', 'id' => 'rating']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="d1v" class="col-sm-2 control-label">DIV:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('d1v', null, ['class' => 'form-control', 'id' => 'd1v']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="han" class="col-sm-2 control-label">HAN:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('han', null, ['class' => 'form-control', 'id' => 'han']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="kic" class="col-sm-2 control-label">KIC:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('han', null, ['class' => 'form-control', 'id' => 'kic']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="ref" class="col-sm-2 control-label">REF:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('ref', null, ['class' => 'form-control', 'id' => 'ref']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="spe" class="col-sm-2 control-label">SPE:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('spe', null, ['class' => 'form-control', 'id' => 'spe']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="pos" class="col-sm-2 control-label">POS:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::text('pos', null, ['class' => 'form-control', 'id' => 'pos']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="coins" class="col-sm-2 control-label">Coins:</label>
            <div class="col-sm-10">
                {{ Form::text('coins', null, ['class' => 'form-control', 'id' => 'coins']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="type_id" class="col-sm-2 control-label">Type:</label>
            <div class="col-sm-10">
               {{ Form::select('type_id', $cardType, null, array('class' => 'form-control', 'id' => 'type_id'));}}
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="role_id" class="col-sm-2 control-label">Role:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::select('role_id', $cardRole, null, array('class' => 'form-control', 'id' => 'role_id'));}}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/card">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop