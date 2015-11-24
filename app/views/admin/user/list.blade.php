<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/userAction/add" title="add type" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new user
    </a>
    {{ $userList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($userList)
        @foreach($userList as $user)
        <tr>

            <td>{{$user->login}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{($user->is_admin == 1) ? 'admin':'user'}}</td>
            <td >
                {{--<a href="/admin/userAction/delete/{{$user->id}}" title="delete type" onclick="return confirm('sure?')" class="btn btn-default btn-sm">--}}
                    {{--<span class="glyphicon glyphicon-remove"></span> delete--}}
                {{--</a>--}}
                <a href="/admin/user/{{$user->id}}" title="edit user" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $userList->links(); }}



@stop