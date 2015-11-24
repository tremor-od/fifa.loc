<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.09.15
 * Time: 14:34
 */ ?>



@extends('admin.layout.layout')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Pack name</th>
            <th>Value(coins)</th>
            <th>Price(points)</th>
            <th>User</th>
            <th>Cards</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>

        @if($orderList)
            @foreach($orderList as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td><a href="/admin/pack/{{$order->pack_id}}">{{$order->pack['name']}}</a></td>
                    <td>{{$order->value}}</td>
                    <td>{{$order->price}}</td>
                    <td>
                        <a href="/admin/userAction/edit/{{$order->user_id}}">{{$order->user['login']}}</a>
                    </td>
                    <td>{{$order->cards}}</td>
                    <td>{{date("F j, Y, g:i a", strtotime($order->created_at))}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop