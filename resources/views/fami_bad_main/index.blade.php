<link rel="stylesheet" href="{{asset('css/top.css')}}" />

@extends('layouts.app')

@section('title')
<title>ファミリーバドミントン情報サイト | Famton</title>
@endsection

<div>
    <img src="{{asset('images/TOP/FamtonCUP.png')}}" class="top-image">

    </img>
</div>


<div class="wrapper " id="top">
    <section id="concept">
        <div class="inner">
            <h2>ようこそ！<br>ファミリーバドミントン情報サイトへ</h2>
            <p class="desc _anm _f-up _is-inview">
                このサイトは、子供からお年寄りの方まで誰でも気軽に楽しめるニュースポーツ「ファミリーバドミントン」を楽しむための発信をしています。<br>
                イベント情報や最新ニュースなど、幅広い内容を掲載していきます。 <br>
                初心者から経験者まで、どなたでも楽しめるコンテンツをご用意していますので、ぜひご覧ください！<br>
                ファミリーバドミントンを新しい世界へ！！
            </p>
        </div>
    </section>
</div>

<div class="conteiner-category">
    <h1 class="category-top">　カテゴリー　</h1>
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