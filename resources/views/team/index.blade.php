<link rel="stylesheet" href="{{asset('css/team.css')}}" />

@extends('layouts.app')

@section('title')
<title>チーム情報一覧 | Famton</title>
@endsection

@section('topic-path')
<ul class="clearfix" style="display: flex;">
    <li class="home"><a href="{{ url('/') }}">ホーム</a></li>
    <li>チーム一覧</li>
</ul>
@endsection


@section('content-nav')
<div>
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

@endsection

@section('content-main')
<div class="content-team-main">
    <img src="{{asset('images/icon/チーム一覧_section-image.png')}}" class="section-image">

    <div class="flash_message">
        @if(session('flash_message_create'))
            <div class="flash_message_create">
                {{session('flash_message_create')}}
            </div>
        @endif
        @if(session('flash_error_message_create'))
            <div class="flash_error_message_create">
                {{session('flash_error_message_create')}}
            </div>
        @endif

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

    <a class="btn-create" href="{{ route('team.create') }}">新規登録</a>

    <a class="team-explain">各都道府県をクリックすると、<br>都道府県毎のチーム一覧を確認できます。<br>※()：登録チーム数</a>

    <div id="japan-map" class="clearfix">

        <div id="hokkaido-touhoku" class="clearfix">
            <p class="area-title">北海道・東北</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="北海道">
                    <div id="hokkaido" style="background-color: {{ isset($teamsCnt['北海道']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>北海道</br>
                            @if(isset($teamsCnt["北海道"]))
                                {{ '(' . $teamsCnt["北海道"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="青森県">
                    <div id="aomori" style="background-color: {{ isset($teamsCnt['青森県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>青森</br>
                            @if(isset($teamsCnt["青森県"]))
                                {{ '(' . $teamsCnt["青森県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="秋田県">
                    <div id="akita" style="background-color: {{ isset($teamsCnt['秋田県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>秋田</br>
                            @if(isset($teamsCnt["秋田県"]))
                                {{ '(' . $teamsCnt["秋田県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="岩手県">
                    <div id="iwate" style="background-color: {{ isset($teamsCnt['岩手県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>岩手</br>
                            @if(isset($teamsCnt["岩手県"]))
                                {{ '(' . $teamsCnt["岩手県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="山形県">
                    <div id="yamagata" style="background-color: {{ isset($teamsCnt['山形県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>山形</br>
                            @if(isset($teamsCnt["山形県"]))
                                {{ '(' . $teamsCnt["山形県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="宮城県">
                    <div id="miyagi" style="background-color: {{ isset($teamsCnt['宮城県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>宮城</br>
                            @if(isset($teamsCnt["宮城県"]))
                                {{ '(' . $teamsCnt["宮城県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="福島県">
                    <div id="fukushima"
                        style="background-color: {{ isset($teamsCnt['福島県']) ? '#7478c2' : '#d3d3d3' }};">
                        <p>福島</br>
                            @if(isset($teamsCnt["福島県"]))
                                {{ '(' . $teamsCnt["福島県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="kantou">
            <p class="area-title">関東</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="群馬県">
                    <div id="gunma" style="background-color: {{ isset($teamsCnt['群馬県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>群馬</br>
                            @if(isset($teamsCnt["群馬県"]))
                                {{ '(' . $teamsCnt["群馬県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="栃木県">
                    <div id="tochigi" style="background-color: {{ isset($teamsCnt['栃木県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>栃木</br>
                            @if(isset($teamsCnt["栃木県"]))
                                {{ '(' . $teamsCnt["栃木県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="茨城県">
                    <div id="ibaraki" style="background-color: {{ isset($teamsCnt['茨城県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>茨城</br>
                            @if(isset($teamsCnt["茨城県"]))
                                {{ '(' . $teamsCnt["茨城県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="埼玉県">
                    <div id="saitama" style="background-color: {{ isset($teamsCnt['埼玉県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>埼玉</br>
                            @if(isset($teamsCnt["埼玉県"]))
                                {{ '(' . $teamsCnt["埼玉県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="千葉県">
                    <div id="chiba" style="background-color: {{ isset($teamsCnt['千葉県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>千葉</br>
                            @if(isset($teamsCnt["千葉県"]))
                                {{ '(' . $teamsCnt["千葉県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="東京都">
                    <div id="tokyo" style="background-color: {{ isset($teamsCnt['東京都']) ? '#31beca' : '#d3d3d3' }};">
                        <p>東京</br>
                            @if(isset($teamsCnt["東京都"]))
                                {{ '(' . $teamsCnt["東京都"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="神奈川県">
                    <div id="kanagawa"
                        style="background-color: {{ isset($teamsCnt['神奈川県']) ? '#31beca' : '#d3d3d3' }};">
                        <p>神奈川</br>
                            @if(isset($teamsCnt["神奈川県"]))
                                {{ '(' . $teamsCnt["神奈川県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="tyubu" class="clearfix">
            <p class="area-title">中部</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="新潟県">
                    <div id="nigata" style="background-color: {{ isset($teamsCnt['新潟県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>新潟</br>
                            @if(isset($teamsCnt["新潟県"]))
                                {{ '(' . $teamsCnt["新潟県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="富山県">
                    <div id="toyama" style="background-color: {{ isset($teamsCnt['富山県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>富山</br>
                            @if(isset($teamsCnt["富山県"]))
                                {{ '(' . $teamsCnt["富山県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="石川県">
                    <div id="ishikawa" style="background-color: {{ isset($teamsCnt['石川県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>石川</br>
                            @if(isset($teamsCnt["石川県"]))
                                {{ '(' . $teamsCnt["石川県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="福井県">
                    <div id="fukui" style="background-color: {{ isset($teamsCnt['福井県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>福井</br>
                            @if(isset($teamsCnt["福井県"]))
                                {{ '(' . $teamsCnt["福井県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="長野県">
                    <div id="nagano" style="background-color: {{ isset($teamsCnt['長野県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>長野</br>
                            @if(isset($teamsCnt["長野県"]))
                                {{ '(' . $teamsCnt["長野県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="岐阜県">
                    <div id="gifu" style="background-color: {{ isset($teamsCnt['岐阜県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>岐阜</br>
                            @if(isset($teamsCnt["岐阜県"]))
                                {{ '(' . $teamsCnt["岐阜県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="山梨県">
                    <div id="yamanashi"
                        style="background-color: {{ isset($teamsCnt['山梨県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>山梨</br>
                            @if(isset($teamsCnt["山梨県"]))
                                {{ '(' . $teamsCnt["山梨県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="愛知県">
                    <div id="aichi" style="background-color: {{ isset($teamsCnt['愛知県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>愛知</br>
                            @if(isset($teamsCnt["愛知県"]))
                                {{ '(' . $teamsCnt["愛知県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="静岡県">
                    <div id="shizuoka" style="background-color: {{ isset($teamsCnt['静岡県']) ? '#4ab969' : '#d3d3d3' }};">
                        <p>静岡</br>
                            @if(isset($teamsCnt["静岡県"]))
                                {{ '(' . $teamsCnt["静岡県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="kinki" class="clearfix">
            <p class="area-title">近畿</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="京都府">
                    <div id="kyoto" style="background-color: {{ isset($teamsCnt['京都府']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>京都</br>
                            @if(isset($teamsCnt["京都府"]))
                                {{ '(' . $teamsCnt["京都府"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="滋賀県">
                    <div id="shiga" style="background-color: {{ isset($teamsCnt['滋賀県']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>滋賀</br>
                            @if(isset($teamsCnt["滋賀県"]))
                                {{ '(' . $teamsCnt["滋賀県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="大阪府">
                    <div id="osaka" style="background-color: {{ isset($teamsCnt['大阪府']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>大阪</br>
                            @if(isset($teamsCnt["大阪府"]))
                                {{ '(' . $teamsCnt["大阪府"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="奈良県">
                    <div id="nara" style="background-color: {{ isset($teamsCnt['奈良県']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>奈良</br>
                            @if(isset($teamsCnt["奈良県"]))
                                {{ '(' . $teamsCnt["奈良県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="三重県">
                    <div id="mie" style="background-color: {{ isset($teamsCnt['三重県']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>三重</br>
                            @if(isset($teamsCnt["三重県"]))
                                {{ '(' . $teamsCnt["三重県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="和歌山県">
                    <div id="wakayama"
                        style="background-color: {{ isset($teamsCnt['和歌山県']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>和歌山</br>
                            @if(isset($teamsCnt["和歌山県"]))
                                {{ '(' . $teamsCnt["和歌山県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="兵庫県">
                    <div id="hyougo" style="background-color: {{ isset($teamsCnt['兵庫県']) ? '#b0b72f' : '#d3d3d3' }};">
                        <p>兵庫</br>
                            @if(isset($teamsCnt["兵庫県"]))
                                {{ '(' . $teamsCnt["兵庫県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="tyugoku" class="clearfix">
            <p class="area-title">中国</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="鳥取県">
                    <div id="tottori" style="background-color: {{ isset($teamsCnt['鳥取県']) ? '#ef9f27' : '#d3d3d3' }};">
                        <p>鳥取</br>
                            @if(isset($teamsCnt["鳥取県"]))
                                {{ '(' . $teamsCnt["鳥取県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="岡山県">
                    <div id="okayama" style="background-color: {{ isset($teamsCnt['岡山県']) ? '#ef9f27' : '#d3d3d3' }};">
                        <p>岡山</br>
                            @if(isset($teamsCnt["岡山県"]))
                                {{ '(' . $teamsCnt["岡山県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="島根県">
                    <div id="shimane" style="background-color: {{ isset($teamsCnt['島根県']) ? '#ef9f27' : '#d3d3d3' }};">
                        <p>島根</br>
                            @if(isset($teamsCnt["島根県"]))
                                {{ '(' . $teamsCnt["島根県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="広島県">
                    <div id="hiroshima"
                        style="background-color: {{ isset($teamsCnt['広島県']) ? '#ef9f27' : '#d3d3d3' }};">
                        <p>広島</br>
                            @if(isset($teamsCnt["広島県"]))
                                {{ '(' . $teamsCnt["広島県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="山口県">
                    <div id="yamaguchi"
                        style="background-color: {{ isset($teamsCnt['山口県']) ? '#ef9f27' : '#d3d3d3' }};">
                        <p>山口</br>
                            @if(isset($teamsCnt["山口県"]))
                                {{ '(' . $teamsCnt["山口県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="shikoku" class="clearfix">
            <p class="area-title">四国</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="香川県">
                    <div id="kagawa" style="background-color: {{ isset($teamsCnt['香川県']) ? '#d08f68' : '#d3d3d3' }};">
                        <p>香川</br>
                            @if(isset($teamsCnt["香川県"]))
                                {{ '(' . $teamsCnt["香川県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="愛媛県">
                    <div id="ehime" style="background-color: {{ isset($teamsCnt['愛媛県']) ? '#d08f68' : '#d3d3d3' }};">
                        <p>愛媛</br>
                            @if(isset($teamsCnt["愛媛県"]))
                                {{ '(' . $teamsCnt["愛媛県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="徳島県">
                    <div id="tokushima"
                        style="background-color: {{ isset($teamsCnt['徳島県']) ? '#d08f68' : '#d3d3d3' }};">
                        <p>徳島</br>
                            @if(isset($teamsCnt["徳島県"]))
                                {{ '(' . $teamsCnt["徳島県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="高知県">
                    <div id="kouchi" style="background-color: {{ isset($teamsCnt['高知県']) ? '#d08f68' : '#d3d3d3' }};">
                        <p>高知</br>
                            @if(isset($teamsCnt["高知県"]))
                                {{ '(' . $teamsCnt["高知県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div id="kyusyu" class="clearfix">
            <p class="area-title">九州・沖縄</p>
            <div class="area">
                <a href="#" class="prefecture-link" data-prefecture="福岡県">
                    <div id="fukuoka" style="background-color: {{ isset($teamsCnt['福岡県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>福岡</br>
                            @if(isset($teamsCnt["福岡県"]))
                                {{ '(' . $teamsCnt["福岡県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="佐賀県">
                    <div id="saga" style="background-color: {{ isset($teamsCnt['佐賀県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>佐賀</br>
                            @if(isset($teamsCnt["佐賀県"]))
                                {{ '(' . $teamsCnt["佐賀県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="長崎県">
                    <div id="nagasaki" style="background-color: {{ isset($teamsCnt['長崎県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>長崎</br>
                            @if(isset($teamsCnt["長崎県"]))
                                {{ '(' . $teamsCnt["長崎県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="大分県">
                    <div id="oita" style="background-color: {{ isset($teamsCnt['大分県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>大分</br>
                            @if(isset($teamsCnt["大分県"]))
                                {{ '(' . $teamsCnt["大分県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="熊本県">
                    <div id="kumamoto" style="background-color: {{ isset($teamsCnt['熊本県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>熊本</br>
                            @if(isset($teamsCnt["熊本県"]))
                                {{ '(' . $teamsCnt["熊本県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="宮崎県">
                    <div id="miyazaki" style="background-color: {{ isset($teamsCnt['宮崎県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>宮崎</br>
                            @if(isset($teamsCnt["宮崎県"]))
                                {{ '(' . $teamsCnt["宮崎県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="鹿児島県">
                    <div id="kagoshima"
                        style="background-color: {{ isset($teamsCnt['鹿児島県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>鹿児島</br>
                            @if(isset($teamsCnt["鹿児島県"]))
                                {{ '(' . $teamsCnt["鹿児島県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
                <a href="#" class="prefecture-link" data-prefecture="沖縄県">
                    <div id="okinawa" style="background-color: {{ isset($teamsCnt['沖縄県']) ? '#ff7575' : '#d3d3d3' }};">
                        <p>沖縄</br>
                            @if(isset($teamsCnt["沖縄県"]))
                                {{ '(' . $teamsCnt["沖縄県"] . ')' }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>

    </div> <!-- japan-map -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.prefecture-link').forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const prefecture = this.dataset.prefecture;
                    const baseUrl = "{{ url('team/search-by-prefecture') }}";
                    window.location.href = `${baseUrl}/${encodeURIComponent(prefecture)}`;
                });
            });
        });
    </script>

    <script>
        function confirmDelete(eventName) {
            return confirm('「' + eventName + '」の情報を削除してもよろしいですか？');
        }
    </script>



    @if(isset($teams) && !$teams->isEmpty())
        @foreach ($teams as $team_info)
            @if ($loop->first)
                <h1 class="team_num">チーム一覧： {{ $team_info["prefecture"] }} ({{ $teams->count() }} チーム)</h1>
            @endif

            <div class="team_info">
                <h2 class="team_name"><span>New</span>{{ $team_info["team_name"] }}</h2>
                <div id="main_box">
                    <div id="box1">
                        <img src="{{ asset('storage/team/' . $team_info['file_name']) }}" class="team-image"
                            onerror="this.onerror=null; this.src='{{ asset('images/noimage.png') }}';">
                    </div>
                    <div id="box2">
                        <h3>拠点</h3>
                        <p>{{ $team_info["prefecture"] }} {{ $team_info["city"] }}</p>

                        <h3>練習・活動情報</h3>
                        <p>{!! nl2br(e($team_info["practice_info"])) !!}</p>
                    </div>
                </div>
                <p class="wrap-btn">
                    <a href="{{ route('team.show', [$team_info->id]) }}" class="team-detail-btn">
                        詳細を見る
                    </a>
                </p>
            </div>
        @endforeach
    @else
        @if (isset($indexFlg))
            <p></p>
        @else
            <p>※チームデータが登録されていません。</p>
        @endif
    @endif

</div>
@endsection