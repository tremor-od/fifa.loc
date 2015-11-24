<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/pageAction/add" title="add page" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new page
    </a>
    {{ $pageList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Page url</th>
            <th>title</th>
            <th>text</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($pageList)
        @foreach($pageList as $page)
        <tr>
            <td>{{ $page->pag_url}}</td>
            <td>{{ $page->pag_title;}}</td>
            <td style="max-width: 600px;">
                {{ strip_tags(substr($page->pag_text, 0, 200).'...');}}
                <div style="clear: both;"?></div>
            </td>
            <td >
                <a href="/admin/pageAction/delete/{{$page->pag_id}}" title="delete page" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/page/{{$page->pag_id}}" title="edit page" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $pageList->links(); }}



@stop