<link rel="stylesheet" href="{{asset('css/taikai.css')}}" />

<?php
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
    '日', //0
    '月', //1
    '火', //2
    '水', //3
    '木', //4
    '金', //5
    '土', //6
];
?>

@extends('layouts.app')

@section('title')
<title>過去の大会情報一覧 | Famton</title>
@endsection

@section('topic-path')
<div class="topic-path">
    <ul class="clearfix" style="display: flex;">
        <li class="home"><a href="{{ url('/') }}">ホーム</a></li>
        <li><a href="{{ route('taikai.index') }}">大会情報</a></li>
        <li>過去の大会</li>
    </ul>
</div>
@endsection


@section('content-nav')
<div class="content-main-nav">
    <nav class="main-nav">
        <div class="rnav">
            <h2 class="title">大会情報</h2>
            <ul class="list-nest">
                <li>
                    <a class="trigger" onclick="toggleList(this)">大会</a>
                    <ul class="list-sub target" style="display: none;">
                        <li><a href="{{ route('taikai.index') }}">一覧</a></li>
                        <li><a href="{{ route('taikai.past') }}">過去の大会一覧</a></li>
                        <li><a href="{{ route('taikai.create') }}">登録</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
@endsection

@section('content-main')
<div class="content-taikai-main">
    <img src="{{asset('images/icon/大会カレンダー_section-image.png')}}" class="section-image">
    
    <div class="calendar_cls">
        <h2 class="ttl-b">過去の大会一覧</h2>
        <table class="table_cls">
            <tr>
                <th scope="col">開催日</th>
                <th scope="col">大会名</th>
                <th scope="col">開催場所</th>
                <th scope="col">受付状況</th>
                <th scope="col"></th>
            </tr>
            @foreach($pastTaikais as $taikai)
            <tr>
                <td class="kaisaibi_td">
                    {{ date('n月j日', strtotime($taikai->kaisai_date)) }}
                    ({{ $week[date('w', strtotime($taikai->kaisai_date))] }})
                </td>
                <td class="taikai_name_td">{{ $taikai->taikai_name }}</td>
                <td class="kaisai_basyo_td">{{ $taikai->prefecture }}</td>
                <td class="status_td">{{ $taikai->status }}</td>
                <td class="button-td">
                    <form action="{{ route('taikai.show', [$taikai->id])}}" method="GET">
                        <input type="submit" value="詳細" class="detail-button">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{$pastTaikais->links()}}
        </div>
    </div>
</div>
@endsection 