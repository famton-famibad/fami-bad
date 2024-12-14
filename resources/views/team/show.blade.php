<link rel="stylesheet" href="{{asset('css/team.css')}}" />
<link rel="stylesheet" href="{{asset('css/show.css')}}" />

@extends('layouts.app')

@section('title')
<title>チーム情報詳細 | Famton</title>
@endsection

@section('topic-path')
<div class="topic-path">
    <ul class="clearfix" style="display: flex;">
        <li class="home"><a href="{{ route('team.index') }}">ホーム</a></li>
        <li><a href="{{ route('team.index') }}">チーム情報一覧</a></li>
        <li>チーム情報詳細</li>
    </ul>
</div>
@endsection

@section('content-nav')
<div class="content-main-nav">
    <nav class="main-nav">
        <div class="rnav">
            <h2 class="title">チーム一覧</h2>
            <ul class="list-nest">
                <li>
                    <a class="trigger" onclick="toggleList(this)">チーム一覧</a>
                    <ul class="list-sub target" style="display: none;">
                        <li><a href="{{ route('team.index') }}">一覧</a></li>
                        <li><a href="{{ route('team.create') }}">登録</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
@endsection

@section('content-main')
<div class="content-show">
    <h2>チーム情報</h2>

    <div class="flash_message">
        @if(session('flash_message_update'))
            <div class="flash_message_update">
                {{session('flash_message_update')}}
            </div>
        @endif
        @if(session('flash_error_message_update'))
            <div class="flash_error_message_update">
                {{session('flash_error_message_update')}}
            </div>
        @endif

        @if(session('flash_message_delete'))
            <div class="flash_message_delete">
                {{session('flash_message_delete')}}
            </div>
        @endif
        @if(session('flash_error_message_delete'))
            <div class="flash_error_message_delete">
                {{session('flash_error_message_delete')}}
            </div>
        @endif
    </div>
    <div class="team-details">
        <div class="detail-item_img">
            <img src="{{ asset('storage/team/' . $team['file_name']) }}" class="team-image"
                onerror="this.onerror=null; this.src='{{ asset('images/noimage.png') }}';">

        </div>
        <div class="detail-item">
            <h3>チーム名:</h3>
            <p>{{ $team->team_name }}</p>
        </div>
        <div class="detail-item">
            <h3>拠点:</h3>
            <p>{{ $team->prefecture }} {{ $team->city }}</p>
        </div>
        <div class="detail-item">
            <h3>練習・活動情報:</h3>
            <p>{!! nl2br(e($team->practice_info)) !!}</p>
        </div>
        <div class="detail-item">
            <h3>チーム代表者:</h3>
            <p>{{ $team->delegate }}</p>
        </div>
        <div class="detail-item">
            <h3>連絡先:</h3>
            <p>{{ $team->contact }}</p>
        </div>
        <div class="detail-item">
            <h3>SNS1:</h3>
            <p>{{ $team->sns1 }}</p>
        </div>
        <div class="detail-item">
            <h3>SNS2:</h3>
            <p>{{ $team->sns2 }}</p>
        </div>
        <div class="detail-item">
            <h3>SNS3:</h3>
            <p>{{ $team->sns3 }}</p>
        </div>
        <div class="detail-item">
            <h3>その他:</h3>
            <p>{!! nl2br(e($team->optional)) !!}</p>
        </div>
    </div>

    <div class="button-group">
        <a href="{{ route('team.edit', $team->id) }}" class="edit-button">編集</a>
        <a href="{{ route('team.destroy', $team->id) }}" class="delete-button"
            onclick="event.preventDefault(); if(confirmDelete('{{ $team->team_name }}')) { document.getElementById('delete-form').submit(); }">
            削除
        </a>
        <form id="delete-form" action="{{ route('team.destroy', $team->id) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
        <a href="{{ route('team.index') }}" class="back-button">戻る</a>
    </div>
</div>

<script>
    function confirmDelete(eventName) {
        return confirm('「' + eventName + '」の情報を削除してもよろしいですか？');
    }
</script>

@endsection