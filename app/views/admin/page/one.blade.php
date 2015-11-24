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

        {{ Form::model($page, array('url' => '/admin/pageAction/edit/'.$page->pag_id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="pag_title" class="col-sm-2 control-label">Title:</label>
            <div class="col-sm-10">
                {{ Form::text('pag_title', null, ['class' => 'form-control', 'id' => 'pag_title']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="pag_text" class="col-sm-2 control-label">Text:</label>
            <div class="col-sm-10">
                {{ Form::textarea('pag_text', null, ['class' => 'tinymce', 'id' => 'pag_text',]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="pag_url" class="col-sm-2 control-label">Url:</label>
            <div class="col-sm-10">
                {{ Form::text('pag_url', null, ['class' => 'form-control', 'id' => 'pag_url']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="pag_active" class="col-sm-2 control-label">Active:</label>
            <div class="col-sm-10">
               {{ Form::select('pag_active', array(1 => 'show', 0 => 'hide'), null, array('class' => 'form-control', 'id' => 'pag_active'));}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/page">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop