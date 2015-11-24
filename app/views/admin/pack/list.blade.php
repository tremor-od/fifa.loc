<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/packAction/add" title="add page" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new pack
    </a>
    {{ $packList->links(); }}


    @foreach($packList as $pack)
        <div class="inside admin-card-types pack">
            <h3 class="">
                <span>{{$pack->name}}</span>
            </h3>
            <a href="/admin/packAction/delete/{{$pack->id}}" title="delete pack" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-remove"></span> delete
            </a>
            <a href="/admin/pack/{{$pack->id}}" title="edit pack" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-pencil"></span> edit
            </a>
            <div >

                @foreach($pack->pctList as $key => $value)
                    <h3>{{$key}}</h3>
                    <table class="table table-striped">

                        @foreach($value as $packCardType)
                            <tr>
                                <td class="row-title">
                                    <label>{{$packCardType->card['name']}}</label>
                                    {{$packCardType->percent}}
                                    {{--<input type="text" class="small-text on" name="pct[{{$packCardType->id}}]" value="{{$packCardType->percent}}" placeholder="%">--}}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <br>
                @endforeach

            </div>
        </div>

    @endforeach





    {{ $packList->links(); }}



@stop