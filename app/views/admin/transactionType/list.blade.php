<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/transactionTypeAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new type
    </a>
    {{ $transactionTypeList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($transactionTypeList)
        @foreach($transactionTypeList as $type)
        <tr>

            <td>{{$type->name}}</td>
            <td >
                <a href="/admin/transactionTypeAction/delete/{{$type->id}}" title="delete type" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/cardType/{{$type->id}}" title="edit type" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $transactionTypeList->links(); }}



@stop