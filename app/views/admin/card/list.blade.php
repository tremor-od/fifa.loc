<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/cardAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new type
    </a>
    {{ $cardList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Coins</th>
            <th>Type name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($cardList)
        @foreach($cardList as $card)
        <tr>

            <td>{{$card->name}}</td>
            <td>{{$card->coins}}</td>
            <td>{{$card->subType['name']}}</td>
            <td >
                <a href="/admin/cardAction/delete/{{$card->id}}" title="delete type" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/card/{{$card->id}}" title="edit type" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $cardList->links(); }}



@stop