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

        {{ Form::model($pack, array('url' => '/admin/packAction/edit/'.$pack->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Pack name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="fullName" class="col-sm-2 control-label">Pack full name:</label>
            <div class="col-sm-10">
                {{ Form::text('fullName', null, ['class' => 'form-control', 'id' => 'fullName']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-10">
                {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
            </div>
        </div>
        @foreach($percentList as $key => $value)
            <h3>{{$key}}</h3>
            <table class="table table-striped">

                    @foreach($value as $packCardType)
                    <tr>
                        <td class="row-title">
                            <label>{{$packCardType->card['name']}}</label>
                            <input type="text" class="small-text on" name="pct[{{$packCardType->id}}]" value="{{$packCardType->percent}}" placeholder="%">
                        </td>
                    </tr>
                     @endforeach

            </table>
            <br>
        @endforeach




        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Pack Price (Ninja Points):</label>
            <div class="col-sm-10">
                {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price']) }}
            </div>
        </div>

        <div class="form-group">
            <label for="basic_card_number" class="col-sm-2 control-label">Basic Cards Number in Pack:</label>
            <div class="col-sm-10">
                {{ Form::text('basic_card_number', null, ['class' => 'form-control', 'id' => 'basic_card_number']) }}
            </div>
        </div>

        <div class="form-group">
            <label for="special_card_number" class="col-sm-2 control-label">Special Cards Number in Pack:</label>
            <div class="col-sm-10">
                {{ Form::text('special_card_number', null, ['class' => 'form-control', 'id' => 'special_card_number']) }}
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Image url:</label>
            <div class="col-sm-10">
                {{ Form::text('image', null, ['class' => 'form-control', 'id' => 'image']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/pack">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop