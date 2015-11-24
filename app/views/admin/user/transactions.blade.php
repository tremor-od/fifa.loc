<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.09.15
 * Time: 14:33
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Type</th>
            <th>Value</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>

        @if($transactionList)
            @foreach($transactionList as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>
                        <a href="/admin/userAction/edit/{{$transaction->user_id}}">{{$transaction->user['login']}}</a>
                    </td>
                    <td class="row-title {{ ($transaction->type == 'purchase') ? 'green':'red' }}">
                        <code>{{$transaction->type['name']}}</code>
                    </td>
                    <td>{{$transaction->value}}</td>
                    <td>{{date("F j, Y, g:i a", strtotime($transaction->updated_at))}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop