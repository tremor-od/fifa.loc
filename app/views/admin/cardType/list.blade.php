<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/cardTypeAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new subtype
    </a>
    {{ $cardTypeList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($cardTypeList)
        @foreach($cardTypeList as $type)
        <tr>

            <td>{{$type->name}}</td>
            <td >
                <a href="/admin/cardTypeAction/delete/{{$type->id}}" title="delete type" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
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
    {{ $cardTypeList->links(); }}



@stop