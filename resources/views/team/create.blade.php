<link rel="stylesheet" href="{{asset('css/inputoutput.css')}}" />
<link rel="stylesheet" href="{{asset('css/team.css')}}" />

@extends('layouts.app')

@section('content-main')

<form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data" class="formWrapper">
    <h2>チーム情報登録</h2>
    <hr>
    @csrf
    <div class="form-row">
        <div class="form-label">
            <label for="team_name">チーム名：</label>
            <span class="required">必須</span>
        </div>
        <input type="text" id="team_name" name="team_name" value="{{ old('team_name') }}"
            class="{{ $errors->has('team_name') ? 'error-input' : '' }}">
        @if($errors->has('team_name'))
            <span class="error">{{$errors->first('team_name')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="fileid">チーム画像：</label>
            <span class="optional">任意</span>
        </div>
        <input type="file" id="fileid" name="fileid" class="{{ $errors->has('fileid') ? 'error-input' : '' }}">
        @if($errors->has('fileid'))
            <span class="error">{{$errors->first('fileid')}}</span>
        @endif
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="prefecture">拠点 都道府県：</label>
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
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="city">市町村：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="city" name="city" value="{{ old('city') }}"
            class="{{ $errors->has('city') ? 'error-input' : '' }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="practice_info">練習・活動情報：</label>
            <span class="optional">任意</span>
        </div>
        <textarea name="practice_info" id="practice_info">{{ old('practice_info') }}</textarea>
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="delegate">チーム代表者：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="delegate" name="delegate" value="{{ old('delegate') }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="contact">連絡先：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="contact" name="contact" value="{{ old('contact') }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="sns1">SNS1：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="sns1" name="sns1" value="{{ old('sns1') }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="sns2">SNS2：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="sns2" name="sns2" value="{{ old('sns2') }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="sns3">SNS3：</label>
            <span class="optional">任意</span>
        </div>
        <input type="text" id="sns3" name="sns3" value="{{ old('sns3') }}">
    </div>
    <div class="form-row">
        <div class="form-label">
            <label for="optional">その他：</label>
            <span class="optional">任意</span>
        </div>
        <textarea name="optional" id="optional">{{ old('optional') }}</textarea>
    </div>
    <div class="form-btn">
        <input type="submit" value="登録" name="submitButton" class="button">
    </div>
</form>

@endsection
