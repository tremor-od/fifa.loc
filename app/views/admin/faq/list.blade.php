<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/faqAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new
    </a>
    {{ $faqList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Question</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($faqList)
        @foreach($faqList as $faq)
        <tr>

            <td>{{$faq->question}}</td>

            <td >
                <a href="/admin/faqAction/delete/{{$faq->id}}" title="delete" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/faq/{{$faq->id}}" title="edit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $faqList->links(); }}



@stop