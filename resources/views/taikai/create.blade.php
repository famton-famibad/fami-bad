<link rel="stylesheet" href="{{asset('css/inputoutput.css')}}" />
<link rel="stylesheet" href="{{asset('css/taikai.css')}}" />

@extends('layouts.app')

@section('topic-path')
<ul class="clearfix" style="display: flex;">
    <li class="home"><a href="./index.php">ホーム</a></li>
    <li><a href="{{route('taikai.index')}}">大会カレンダー</a></li>
    <li>登録</li>
</ul>
@endsection


@section('content-main')

<form method="POST" action="{{ route('taikai.store') }}" class="formWrapper">
    <h2>大会情報登録</h2>
    <hr>
    </hr>
    @csrf
    <div class="form-row">
        <div class="form-label">
            <label for="taikai_name">大会名：</label>
            <span class="required">必須</span>
        </div>
        <input type="text" id="taikai_name" name="taikai_name" value="{{ old('taikai_name') }}"
            placeholder="例) 第○○回 XX杯" class="{{ $errors->has('taikai_name') ? 'error-input' : '' }}">
        @if($errors->has('taikai_name'))
            <span class="error">{{$errors->first('taikai_name')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="kaisai_date">開催日：</label>
            <span class="required">必須</span>
        </div>
        <input type="date" id="kaisai_date" name="kaisai_date" value="{{ old('kaisai_date') }}"
            class="{{ $errors->has('kaisai_date') ? 'error-input' : '' }}">
        @if($errors->has('kaisai_date'))
            <span class="error">{{$errors->first('kaisai_date')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="prefecture">開催場所 都道府県：</label>
            <span class="required">必須</span>
        </div>
        <input type="text" id="prefecture" name="prefecture" placeholder="例) 兵庫県" value="{{ old('prefecture') }}"
            class="{{ $errors->has('prefecture') ? 'error-input' : '' }}">
        @if($errors->has('prefecture'))
            <span class="error">{{$errors->first('prefecture')}}</span>
        @endif
        <div class="form-label">
            <div id="form-label-city">
                <label for="city">市町村：</label>
                <span class="optional">任意</span>
            </div>
        </div>
        <input type="text" id="city" name="city" placeholder="例) 西脇市" value="{{ old('city') }}"
            class="{{ $errors->has('city') ? 'error-input' : '' }}">
        @if($errors->has('city'))
            <span class="error">{{$errors->first('city')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="team">開催団体・チーム：</label>
            <span class="required">必須</span>
        </div>
        <input type="text" id="team" name="team" placeholder="例) DON&BOSS" value="{{ old('team') }}"
            class="{{ $errors->has('team') ? 'error-input' : '' }}">
        @if($errors->has('team'))
            <span class="error">{{$errors->first('team')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="comment">コメント:</label>
        </div>
        <textarea name="comment" class="commentTextArea">{{ old('comment') }}</textarea>
    </div>
    <div class="form-btn">
        <input type="submit" value="登録" name="submitButton" class="button">
    </div>
</form>


@endsection