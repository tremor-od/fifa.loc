<?php
/**
 * Created by PhpStorm.
 * faq: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <div class="col-md-12">

        <a href="/admin/faqAction/add" title="add card" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-plus"></span> Add new faq
        </a>

        {{ Form::model($faq, array('url' => '/admin/faqAction/edit/'.$faq->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="question" class="col-sm-2 control-label">Question:</label>
            <div class="col-sm-10">
                {{ Form::text('question', null, ['class' => 'form-control', 'id' => 'question', 'required' => 'required']) }}
            </div>
        </div>

        <div class="form-group">
            <label for="answer" class="col-sm-2 control-label">Answer:</label>
            <div class="col-sm-10">
                {{ Form::textarea('answer', null, ['class' => 'tinymce', 'id' => 'answer']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="active" class="col-sm-2 control-label">Active:</label>
            <div class="col-sm-10">
                {{ Form::select('active', array(1 => 'show', 0 => 'hide'), null, array('class' => 'form-control', 'id' => 'active'));}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/faq">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop