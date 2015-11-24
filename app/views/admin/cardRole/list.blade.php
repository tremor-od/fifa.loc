<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/cardRoleAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new role
    </a>
    {{ $cardRoleList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($cardRoleList)
        @foreach($cardRoleList as $role)
        <tr>

            <td>{{$role->name}}</td>
            <td >
                <a href="/admin/cardRoleAction/delete/{{$role->id}}" title="delete type" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/cardRole/{{$role->id}}" title="edit type" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $cardRoleList->links(); }}



@stop