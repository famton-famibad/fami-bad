<link rel="stylesheet" href="{{asset('css/top.css')}}" />
<script src="{{ asset('js/style.js') }}"></script>

@extends('layouts.app')

@section('title')
<title>ファミリーバドミントン情報サイト | Famton</title>
@endsection


@section('content-main')
<div class="banner">
    <div class="slides">
        <div class="slide">
            <img src="{{asset('images/banner/Welcome.png')}}" alt="Welcome">
        </div>
        <div class="slide">
            <img src="{{asset('images/banner/FamtonCUP.png')}}" alt="FamtonCUP開催！">
        </div>
    </div>
    <div class="controls">
        <button class="prev">❮</button>
        <button class="next">❯</button>
    </div>
    <div class="indicators">
        <button class="active"></button>
        <button></button>
    </div>
</div>

<div class="wrapper " id="top">
    <section id="concept">
        <div class="inner">
            <p class="desc _anm _f-up _is-inview">
                このサイトは、子供からお年寄りの方まで誰でも気軽に楽しめるニュースポーツ「ファミリーバドミントン」を楽しむための発信をしています。<br>
                イベント情報や最新ニュースなど、幅広い内容を掲載していきます。 <br>
                初心者から経験者まで、どなたでも楽しめるコンテンツをご用意していますので、ぜひご覧ください！<br>
                ファミリーバドミントンを新しい世界へ！！
            </p>
        </div>
    </section>
</div>

<h1 class="category-top">カテゴリー</h1>
<div class="conteiner-category">
    <div class="image-container" style="display: flex;">
        <div>
            <a href="{{route('taikai.index')}}">
                <img src="{{asset('images/TOP/category_taikai.png')}}" class="category-image">
            </a>
        </div>
        <div>
            <a href="{{route(name: 'team.index')}}">
                <img src="{{asset('images/TOP/category_team.png')}}" class="category-image">
            </a>
        </div>
    </div>
</div>
<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <a href="/">
                <img src="{{asset('images/footer/logo.png')}}" alt="Famton Logo">
            </a>
        </div>
        <div class="footer-sns">
            <p>↓ 最新情報はこちらをチェック ↓</p>
            <a href="https://instagram.com" target="_blank">
                <img src="{{asset('images/icon/instagram-icon.png')}}" alt="Instagram">
                <span>Instagram</span>
            </a>
        </div>
        <div class="footer-links">
            <ul>
                <li>お問い合わせ</a></li>
            </ul>
            <ul>
                <li>Famton オンラインショップ</a></li>
            </ul>
        </div>
        <p>&copy; 2024 Famton. All Rights Reserved.</p>
    </div>
</footer>
@endsection