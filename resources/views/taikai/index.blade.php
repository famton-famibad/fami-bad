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

$taikai_year_kari = "0000";
$taikai_month_kari = "00";

?>


@extends('layouts.app')

@section('title')
<title>大会情報一覧 | Famton</title>
@endsection

@section('topic-path')
<div class="topic-path">
    <ul class="clearfix" style="display: flex;">
        <li class="home"><a href="{{ url('/') }}">ホーム</a></li>
        <li>大会情報</li>
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

    <a class="btn-create" href="{{ route('taikai.create') }}">新規登録</a>


    <!-- 大会のデータ分ループ　selectデータ　-->
    <?php foreach ($taikais as $taikai):

    $taikai_year = date("Y", strtotime($taikai["kaisai_date"]));
    $taikai_month = date("n", strtotime($taikai["kaisai_date"]));
    $taikai_day = date("j", strtotime($taikai["kaisai_date"])); ?>

    <!-- もし大会の年が異なっていたら、大会年を表示 -->
    <?php    if ($taikai_year_kari != $taikai_year) { ?>
    <?php        if ($taikai_year_kari != "0000") { ?>
    </table>
</div>
<?php        } ?>
<div class="calendar_cls">
    <h2 class="ttl-b"><?php        echo $taikai_year; ?>年</h2>
    <?php        $taikai_year_kari = $taikai_year; ?>
    <table class="table_cls">

        <tr>
            <th scope="col">開催日</th>
            <th scope="col">大会名</th>
            <th scope="col">開催場所</th>
            <th scope="col">受付状況</th>
            <th scope="col"></th>
        </tr>
        <?php    } ?>

        <!-- もし大会の月が異なっていたら、大会月を表示 -->
        <?php    if ($taikai_month_kari != $taikai_month) { ?>
        </tr>
        <tr>
            <?php        $taikai_month_kari = $taikai_month; ?>
            <?php    } else { ?>
        <tr>
            <?php    } ?>


            <td class="kaisaibi_td">
                <?php    echo $taikai_month; ?>月<?php    echo $taikai_day; ?>日（<?php    echo $week[date("w", strtotime($taikai["kaisai_date"]))] . ')' ?>
            </td>
            <td class="taikai_name_td"><?php    echo $taikai["taikai_name"]; ?></td>
            <td class="kaisai_basyo_td"><?php    echo $taikai["prefecture"]; ?></td>
            <td class="status_td"><?php    echo $taikai["status"]; ?></td>
            <td class="button-td">
                <form action="{{ route('taikai.show', [$taikai->id])}}" method="GET">
                    <input type="submit" value="詳細" class="detail-button">
                </form>
            </td>


            <?php endforeach; ?>
    </table>
    <div class="pagination">
        {{$taikais->links()}}
    </div>
</div>
</div>


@endsection