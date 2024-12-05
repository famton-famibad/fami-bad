<link rel="stylesheet" href="{{asset('css/taikai.css')}}" />
<link rel="stylesheet" href="{{asset('css/show.css')}}" />

@extends('layouts.app')

@section('title')
<title>大会情報詳細 | Famton</title>
@endsection

@section('topic-path')
<ul class="clearfix" style="display: flex;">
    <li class="home"><a href="{{ route('taikai.index') }}">ホーム</a></li>
    <li><a href="{{ route('taikai.index') }}">大会情報一覧</a></li>
    <li>大会情報詳細</li>
</ul>
@endsection

@section('content-main')

<div class="content-show">
    <h2>大会情報</h2>

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
    <div class="taikai-details">
        <div class="detail-item">
            <h3>大会名:</h3>
            <p>{{ $taikai->taikai_name }}</p>
        </div>
        <div class="detail-item">
            <h3>要項等:</h3>
            <p>
                <a href="{{ asset('storage/taikai/' . $taikai->file_name) }}" target="_blank" class="file-link">
                    {{ $taikai->file_name }}
                </a>
            </p>
        </div>
        <div class="detail-item">
            <h3>開催日:</h3>
            <p>{{ date('Y年n月j日', strtotime($taikai->kaisai_date)) }}</p>
        </div>
        <div class="detail-item">
            <h3>開催場所:</h3>
            <p>{{ $taikai->prefecture }} {{ $taikai->city }}</p>
        </div>
        <div class="detail-item">
            <h3>会場:</h3>
            <p>{{ $taikai->gym }}</p>
        </div>
        <div class="detail-item">
            <h3>主催団体:</h3>
            <p>{{ $taikai->team }}</p>
        </div>
        <div class="detail-item">
            <h3>問い合わせ先:</h3>
            <p>{{ $taikai->contact }}</p>
        </div>
        <div class="detail-item">
            <h3>受付状況:</h3>
            <p>{{ $taikai->status }}</p>
        </div>
        <div class="detail-item">
            <h3>その他:</h3>
            <p>{!! nl2br(e($taikai->others)) !!}</p>
        </div>
    </div>

    <div class="button-group">
        <a href="{{ route('taikai.edit', $taikai->id) }}" class="edit-button">編集</a>
        <a href="{{ route('taikai.destroy', $taikai->id) }}" class="delete-button" 
           onclick="event.preventDefault(); if(confirmDelete('{{ $taikai->taikai_name }}')) { document.getElementById('delete-form').submit(); }">
            削除
        </a>
        <form id="delete-form" action="{{ route('taikai.destroy', $taikai->id) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
        <a href="{{ route('taikai.index') }}" class="back-button">戻る</a>
    </div>
</div>

<script>
    function confirmDelete(eventName) {
        return confirm('「' + eventName + '」の情報を削除してもよろしいですか？');
    }
</script>

@endsection