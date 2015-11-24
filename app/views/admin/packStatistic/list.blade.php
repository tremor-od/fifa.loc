<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 13.08.15
 * Time: 15:17
 */ ?>


@extends('admin.layout.layout')

@section('content')
    {{ $packList->links(); }}
    {{--<table class="table table-striped">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>#</th>--}}
            {{--<th>Pack</th>--}}
            {{--<th>Value(coins)</th>--}}
            {{--<th>Price(points)</th>--}}
            {{--<th>User</th>--}}
            {{--<th>Cards</th>--}}
            {{--<th>Date</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}

    <table class="table table-bordered" >
        <tbody>
        <tr>
            <td>{{($general['sum'] > 0)?'+'.$general['sum']:$general['sum']}}</td>
            <td>{{$general['winPercent']}}% Win</td>
        </tr>
        <tr>
            <td>{{$general['countPack']}} Packs</td>
            <td>{{$general['avg']}} AVG Value</td>
        </tr>
        </tbody>
    </table>

        @if($packList)
            @foreach($packList as $packStatistic)
                <div class="inside pack">


                    <h3 class="">
                        <span>{{ $packStatistic->pack['name'] }}({{$statistic[$packStatistic->pack_id]['countOpened']}} Packs Opened)</span>
                    </h3>

                    <table class="table table-bordered" >
                        <tbody>
                        <tr>
                            <td>{{($statistic[$packStatistic->pack_id]['sum'] > 0)?'+'.$statistic[$packStatistic->pack_id]['sum']:$statistic[$packStatistic->pack_id]['sum']}}</td>
                            <td>{{$statistic[$packStatistic->pack_id]['winPercent']}}% Win</td>
                        </tr>
                        <tr>
                            <td>{{$statistic[$packStatistic->pack_id]['recentPacks']}} Recent Packs</td>
                            <td>{{$statistic[$packStatistic->pack_id]['avg']}} AVG Value</td>
                        </tr>
                        <tr>
                            <td>{{$statistic[$packStatistic->pack_id]['min']}} Min</td>
                            <td>{{$statistic[$packStatistic->pack_id]['max']}} Max</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
        {{--</tbody>--}}
    {{--</table>--}}
    {{ $packList->links(); }}



@stop