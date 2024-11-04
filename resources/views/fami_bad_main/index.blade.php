
@extends('layouts.app')

@section('content-nav')
    <h2 class="title">カレンダー</h2>
    <ul class="list-nest">
        <li>
            <a class="trigger" onclick="toggleList(this)">大会</a>
            <ul class="list-sub target" style="display: none;">
                <li><a href="{{ route('taikai.index') }}">一覧</a></li>
                <li><a href="{{ route('taikai.create') }}">登録</a></li>
            </ul>
        </li>
        <li><a class="trigger" onclick="toggleList(this)">練習会</a>
            <ul class="list-sub target" style="display: none;">
                <!-- 練習会のリンクをここに追加 -->
            </ul>
        </li>
    </ul>

@endsection