<link rel="stylesheet" href="{{asset('css/inputoutput.css')}}" />
<link rel="stylesheet" href="{{asset('css/taikai.css')}}" />

@extends('layouts.app')

@section('title')
<title>大会情報登録 | Famton</title>
@endsection

@section('topic-path')
<ul class="clearfix" style="display: flex;">
    <li class="home"><a href="./index.php">ホーム</a></li>
    <li><a href="{{route('taikai.index')}}">大会カレンダー</a></li>
    <li>登録</li>
</ul>
@endsection


@section('content-main')

<form method="POST" action="{{ route('taikai.store') }}" class="formWrapper" enctype="multipart/form-data">
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
        <select id="prefecture" name="prefecture" class="{{ $errors->has('prefecture') ? 'error-input' : '' }}">
            <option value="">選択してください</option> <!-- 初期選択肢 -->
            <option value="北海道" {{ old('prefecture') == '北海道' ? 'selected' : '' }}>北海道</option>
            <option value="青森県" {{ old('prefecture') == '青森県' ? 'selected' : '' }}>青森県</option>
            <option value="岩手県" {{ old('prefecture') == '岩手県' ? 'selected' : '' }}>岩手県</option>
            <option value="宮城県" {{ old('prefecture') == '宮城県' ? 'selected' : '' }}>宮城県</option>
            <option value="秋田県" {{ old('prefecture') == '秋田県' ? 'selected' : '' }}>秋田県</option>
            <option value="山形県" {{ old('prefecture') == '山形県' ? 'selected' : '' }}>山形県</option>
            <option value="福島県" {{ old('prefecture') == '福島県' ? 'selected' : '' }}>福島県</option>
            <option value="茨城県" {{ old('prefecture') == '茨城県' ? 'selected' : '' }}>茨城県</option>
            <option value="栃木県" {{ old('prefecture') == '栃木県' ? 'selected' : '' }}>栃木県</option>
            <option value="群馬県" {{ old('prefecture') == '群馬県' ? 'selected' : '' }}>群馬県</option>
            <option value="埼玉県" {{ old('prefecture') == '埼玉県' ? 'selected' : '' }}>埼玉県</option>
            <option value="千葉県" {{ old('prefecture') == '千葉県' ? 'selected' : '' }}>千葉県</option>
            <option value="東京都" {{ old('prefecture') == '東京都' ? 'selected' : '' }}>東京都</option>
            <option value="神奈川県" {{ old('prefecture') == '神奈川県' ? 'selected' : '' }}>神奈川県</option>
            <option value="新潟県" {{ old('prefecture') == '新潟県' ? 'selected' : '' }}>新潟県</option>
            <option value="富山県" {{ old('prefecture') == '富山県' ? 'selected' : '' }}>富山県</option>
            <option value="石川県" {{ old('prefecture') == '石川県' ? 'selected' : '' }}>石川県</option>
            <option value="福井県" {{ old('prefecture') == '福井県' ? 'selected' : '' }}>福井県</option>
            <option value="山梨県" {{ old('prefecture') == '山梨県' ? 'selected' : '' }}>山梨県</option>
            <option value="長野県" {{ old('prefecture') == '長野県' ? 'selected' : '' }}>長野県</option>
            <option value="岐阜県" {{ old('prefecture') == '岐阜県' ? 'selected' : '' }}>岐阜県</option>
            <option value="静岡県" {{ old('prefecture') == '静岡県' ? 'selected' : '' }}>静岡県</option>
            <option value="愛知県" {{ old('prefecture') == '愛知県' ? 'selected' : '' }}>愛知県</option>
            <option value="三重県" {{ old('prefecture') == '三重県' ? 'selected' : '' }}>三重県</option>
            <option value="滋賀県" {{ old('prefecture') == '滋賀県' ? 'selected' : '' }}>滋賀県</option>
            <option value="京都府" {{ old('prefecture') == '京都府' ? 'selected' : '' }}>京都府</option>
            <option value="大阪府" {{ old('prefecture') == '大阪府' ? 'selected' : '' }}>大阪府</option>
            <option value="兵庫県" {{ old('prefecture') == '兵庫県' ? 'selected' : '' }}>兵庫県</option>
            <option value="奈良県" {{ old('prefecture') == '奈良県' ? 'selected' : '' }}>奈良県</option>
            <option value="和歌山県" {{ old('prefecture') == '和歌山県' ? 'selected' : '' }}>和歌山県</option>
            <option value="鳥取県" {{ old('prefecture') == '鳥取県' ? 'selected' : '' }}>鳥取県</option>
            <option value="島根県" {{ old('prefecture') == '島根県' ? 'selected' : '' }}>島根県</option>
            <option value="岡山県" {{ old('prefecture') == '岡山県' ? 'selected' : '' }}>岡山県</option>
            <option value="広島県" {{ old('prefecture') == '広島県' ? 'selected' : '' }}>広島県</option>
            <option value="山口県" {{ old('prefecture') == '山口県' ? 'selected' : '' }}>山口県</option>
            <option value="徳島県" {{ old('prefecture') == '徳島県' ? 'selected' : '' }}>徳島県</option>
            <option value="香川県" {{ old('prefecture') == '香川県' ? 'selected' : '' }}>香川県</option>
            <option value="愛媛県" {{ old('prefecture') == '愛媛県' ? 'selected' : '' }}>愛媛県</option>
            <option value="高知県" {{ old('prefecture') == '高知県' ? 'selected' : '' }}>高知県</option>
            <option value="福岡県" {{ old('prefecture') == '福岡県' ? 'selected' : '' }}>福岡県</option>
            <option value="佐賀県" {{ old('prefecture') == '佐賀県' ? 'selected' : '' }}>佐賀県</option>
            <option value="長崎県" {{ old('prefecture') == '長崎県' ? 'selected' : '' }}>長崎県</option>
            <option value="熊本県" {{ old('prefecture') == '熊本県' ? 'selected' : '' }}>熊本県</option>
            <option value="大分県" {{ old('prefecture') == '大分県' ? 'selected' : '' }}>大分県</option>
            <option value="宮崎県" {{ old('prefecture') == '宮崎県' ? 'selected' : '' }}>宮崎県</option>
            <option value="鹿児島県" {{ old('prefecture') == '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
            <option value="沖縄県" {{ old('prefecture') == '沖縄県' ? 'selected' : '' }}>沖縄県</option>
        </select>
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
            <label for="gym">会場：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="gym" name="gym" placeholder="例) ○○体育館" value="{{ old('gym') }}"
            class="{{ $errors->has('gym') ? 'error-input' : '' }}">
        @if($errors->has('gym'))
            <span class="error">{{$errors->first('gym')}}</span>
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
            <label for="contact">問い合わせ先：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="contact" name="contact" placeholder="例) xxx@gmail.com" value="{{ old('contact') }}"
            class="{{ $errors->has('contact') ? 'error-input' : '' }}">
        @if($errors->has('contact'))
            <span class="error">{{$errors->first('contact')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="fileid">要項等：</label>
            <span class="optional">任意</span>
        </div>
        <input type="file" id="fileid" name="fileid" class="{{ $errors->has('fileid') ? 'error-input' : '' }}">
        @if($errors->has('fileid'))
            <span class="error">{{$errors->first('fileid')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="status">受付状況：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="status" name="status" placeholder="例) ○○/○○ 受付開始, 締切済み等" value="{{ old('status') }}"
            class="{{ $errors->has('status') ? 'error-input' : '' }}">
        @if($errors->has('status'))
            <span class="error">{{$errors->first('status')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="others">その他:</label>
            <span class="optional">任意</span>
        </div>
        <textarea name="others" class="commentTextArea">{{ old('others') }}</textarea>
    </div>
    <div class="form-btn">
        <input type="submit" value="登録" name="submitButton" class="button">
    </div>
</form>


@endsection