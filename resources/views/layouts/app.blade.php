<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="/favicon.ico" type="image/ico">

    @yield('title')
</head>

<body>

    <div id="container">
        <header id="header">
            <div class="site-header">
                <div>
                    <a href="{{ url('/') }}">
                        <logo>
                            <img class="logo-img" src="{{asset('images/タイトルロゴ.png')}}">
                        </logo>
                    </a>
                </div>
                <div class="center">
                    <button id="js-hamburger" type="button" class="hamburger" aria-controls="navigation"
                        aria-expanded="false" aria-label="メニューを開く">
                        <span class="hamburger__line"></span>
                        <span class="hamburger__text"></span>
                    </button>
                    <div class="header__nav-area js-nav-area" id="navigation">
                        <nav id="js-global-navigation" class="global-navigation">
                            <ul class="global-navigation__list">
                                <li>
                                    <a href="{{ url('/') }}" class="global-navigation__link">
                                        トップ
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/rank') }}" class="global-navigation__link">
                                        ランキング
                                    </a>
                                </li>
                                <li>
                                    <button type="button"
                                        class="global-navigation__link -accordion js-sp-accordion-trigger"
                                        aria-expanded='false' aria-controls="accordion1">
                                        大会情報
                                    </button>
                                    <div id="accordion1" class="accordion js-accordion">
                                        <ul class="accordion__list">
                                            <li>
                                                <a href="{{route('taikai.index')}}" class="accordion__link">
                                                    大会一覧
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('taikai.create')}}" class="accordion__link">
                                                    大会登録
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <button type="button"
                                        class="global-navigation__link -accordion js-sp-accordion-trigger"
                                        aria-expanded='false' aria-controls="accordion1">
                                        チーム情報
                                    </button>
                                    <div id="accordion1" class="accordion js-accordion">
                                        <ul class="accordion__list">
                                            <li>
                                                <a href="{{route('team.index')}}" class="accordion__link">
                                                    チーム一覧
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('team.create')}}" class="accordion__link">
                                                    チーム登録
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div id="js-focus-trap" tabindex="0"></div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ナビゲーション -->
            <nav class="site-nav">
                <div class="inner">
                    <ul>
                        <li class=”current”>
                            <a href="{{ url('/') }}">トップ</a>
                        </li>
                        <li>
                            <a href="{{ url('/rank') }}">ランキング</a>
                        </li>
                        <li>
                            <a href="{{route('taikai.index')}}">大会情報</a>
                        </li>
                        <li>
                            <a href="{{route(name: 'team.index')}}">チーム情報</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="content">
            @yield('topic-path')
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            @yield('content-nav')
            <div class="content-main">
                @yield('content-main')
            </div>
        </div>
    </div>
</body>


<script>
    function toggleList(element) {
        const subList = element.nextElementSibling;
        if (subList.style.display === "none" || subList.style.display === "") {
            subList.style.display = "block";
        } else {
            subList.style.display = "none";
        }
    }
</script>

<script>
    // メニュー展開時に背景を固定
    const backgroundFix = (bool) => {
        const scrollingElement = () => {
            const browser = window.navigator.userAgent.toLowerCase();
            if ("scrollingElement" in document) return document.scrollingElement;
            return document.documentElement;
        };

        const scrollY = bool
            ? scrollingElement().scrollTop
            : parseInt(document.body.style.top || "0");

        const fixedStyles = {
            height: "100vh",
            position: "fixed",
            top: `${scrollY * -1}px`,
            left: "0",
            width: "100vw"
        };

        Object.keys(fixedStyles).forEach((key) => {
            document.body.style[key] = bool ? fixedStyles[key] : "";
        });

        if (!bool) {
            window.scrollTo(0, scrollY * -1);
        }
    };

    // 変数定義
    const CLASS = "-active";
    let flg = false;
    let accordionFlg = false;

    let hamburger = document.getElementById("js-hamburger");
    let focusTrap = document.getElementById("js-focus-trap");
    let menu = document.querySelector(".js-nav-area");
    let accordionTrigger = document.querySelectorAll(".js-sp-accordion-trigger");
    let accordion = document.querySelectorAll(".js-sp-accordion");

    // メニュー開閉制御
    hamburger.addEventListener("click", (e) => { //ハンバーガーボタンが選択されたら
        e.currentTarget.classList.toggle(CLASS);
        menu.classList.toggle(CLASS);
        if (flg) {// flgの状態で制御内容を切り替え
            backgroundFix(false);
            hamburger.setAttribute("aria-expanded", "false");
            hamburger.focus();
            flg = false;
        } else {
            backgroundFix(true);
            hamburger.setAttribute("aria-expanded", "true");
            flg = true;
        }
    });
    window.addEventListener("keydown", () => {　//escキー押下でメニューを閉じられるように
        if (event.key === "Escape") {
            hamburger.classList.remove(CLASS);
            menu.classList.remove(CLASS);

            backgroundFix(false);
            hamburger.focus();
            hamburger.setAttribute("aria-expanded", "false");
            flg = false;
        }
    });

    // メニュー内アコーディオン制御
    accordionTrigger.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.currentTarget.classList.toggle(CLASS);
            e.currentTarget.nextElementSibling.classList.toggle(CLASS);
            if (accordionFlg) {
                e.currentTarget.setAttribute("aria-expanded", "false");
                accordionFlg = false;
            } else {
                e.currentTarget.setAttribute("aria-expanded", "true");
                accordionFlg = true;
            }
        });

    });

    // フォーカストラップ制御
    focusTrap.addEventListener("focus", (e) => {
        hamburger.focus();
    });
</script>

</html>