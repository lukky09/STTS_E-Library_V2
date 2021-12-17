@extends('customer.main')

@section('main')
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/product.css?version=#') }}" /> --}}
    <style type="text/css" class="styles">
        header {
            background: #05636d;
        }

        /* header-slider */
        .header_slider {
            /* background: #05636d; */
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 5%;
            padding-bottom: 5%;
        }

        .header_slider .img-slider {
            position: relative;
            width: 80%;
            height: 100vh;
            margin: 10px;
        }

        .header_slider .img-slider .slide {
            z-index: 1;
            position: absolute;
            width: 100%;
            height: 100vh;
            clip-path: circle(0% at 0 50%);
        }

        .header_slider .img-slider .slide.active_slide {
            clip-path: circle(150% at 0 50%);
            transition: 2s;
            transition-property: clip-path;
        }

        .header_slider .img-slider .slide img {
            z-index: 1;
            width: 100%;
            height: 100%;
            border-radius: 5px;
        }

        .header_slider .img-slider .slide .info {
            position: absolute;
            bottom: 0;
            padding: 15px 30px;
        }

        .header_slider .img-slider .slide .info h2 {
            color: #212F45;
            font-size: 45px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .header_slider .img-slider .slide .info p {
            color: #fff;
            /* background: rgba(0, 0, 0, 0.1); */
            background: linear-gradient(to left, #212F45, #065A60);
            font-size: 16px;
            width: 60%;
            padding: 10px;
            border-radius: 4px;
        }

        .header_slider .img-slider .navigation {
            z-index: 2;
            position: absolute;
            display: flex;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
        }

        .header_slider .img-slider .navigation .btn_nav {
            background: rgba(255, 255, 255, 0.5);
            width: 12px;
            height: 12px;
            margin: 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .header_slider .img-slider .navigation .btn_nav.active_slide {
            background: #212F45;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }

        /* end-slider */

        /* gallery-filter */
        .main_container {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .main_container .container-fluid {
            width: 100%;
            padding: 0px 15px;
            margin: 0 auto;
        }

        .main_container .filterbox {
            padding: 30px 0px;
        }

        .main_container .filter-tabs {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 0 35px;
            margin-left: 2%;
            margin-right: 2%;
        }

        .main_container .filter-sort {
            height: 100%;
        }

        .main_container .navigation a {
            margin-right: 5px;
            padding: 9px;
            text-decoration: none;
            border-radius: 6px;
            color: #6b6b6b;
            transition: all 0.5s;
        }

        .main_container .navigation a:hover {
            color: #fff;
            background-color: #05636d;
        }

        .main_container .navigation a.active {
            color: #fff;
            background-color: #05636d;
        }

        .main_container .main-wrap.wrap-inner {
            padding: 0px;
        }

        .main_container .main-wrap {
            padding: 32px 0px 40px;
            width: 100%;
            box-sizing: border-box;
        }

        #content {
            position: relative;
            margin: 0 auto;
            padding: 0px;
            font-size: 14px;
        }

        #main.main-full {
            float: none;
            width: none;
            max-width: none;
        }

        .main_container ol.content {
            margin: 0 auto;
        }

        .main_container .content {
            padding: 5%;
            display: flex;
            list-style: none;
            grid-template-columns: repeat(auto-fill, minmax(100px, 200px));
            grid-gap: 36px;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
        }

        .main_container .multi-shot {
            position: relative;
            width: 300px;
            height: 400px;
            transition: 3s all;
        }

        .main_container .dribbble-link {
            position: relative;
        }

        .main_container .dribbble-over {
            position: absolute;
            top: 0;
            background: rgba(0, 0, 0, 0.04);
            height: 80%;
            left: 0;
            right: 0;
            bottom: 0;
            color: #fff;
            opacity: 0;
            transition: 0.3s all;
        }

        /* card */
        .main_container .card {
            overflow: hidden;
            position: relative;
            width: 300px;
            height: 400px;
            background: #fff;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 255, 0.5);
            backdrop-filter: blur(15px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .main_container .imgBx {
            position: absolute;
            top: 0;
            left: 0;
            width: 300px;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            transform: translateY(30px) scale(0.5);
            transform-origin: top;
        }

        .main_container .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main_container .content_card {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            width: 100%;
            padding-bottom: 30px;
            margin-top: 80%;
        }

        .main_container .content_card .details {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .main_container .content_card .details h2 {
            color: #444;
            font-size: 1.5em;
            font-weight: 500;
            margin-left: 5%;
            margin-right: 5%;
        }

        .main_container .content_card .details h2 span {
            font-size: 0.7em;
            color: #05636d;
            font-weight: 400;
        }

        .main_container .sci {
            position: relative;
            display: flex;
            margin-top: 5px;
        }

        .main_container .sci li {
            list-style: none;
            margin: 4px;
        }

        .main_container .sci li a {
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: transparent;
            font-size: 1.25em;
            color: #444;
            text-decoration: none;
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            transition: 0.5s;
        }

        .main_container .sci button {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border: 1px solid #05636d;
            background: #fff;
            border-radius: 100%;
            padding: 5px 5px;
        }

        .sci button img {
            width: 80%;
            height: 80%;
        }

        .main_container .sci li button:hover {
            background: #05636d;
        }


        /* end-gallery */

    </style>

    <section class="header_slider" data-scene>
        <div class="img-slider" data-aos="zoom-out-right">
            <div class="slide active_slide">
                <img src="{{ url(URL::asset('rss/images/banner1.jpg')) }}">
                <div class="info">
                    <h2>Slide 01</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ url(URL::asset('rss/images/banner2.jpg')) }}">
                <div class="info">
                    <h2>Slide 02</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ url(URL::asset('rss/images/banner3.jpg')) }}">
                <div class="info">
                    <h2>Slide 03</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ url(URL::asset('rss/images/banner4.jpg')) }}">
                <div class="info">
                    <h2>Slide 04</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="slide">
                <img src="{{ url(URL::asset('rss/images/banner5.jpg')) }}">
                <div class="info">
                    <h2>Slide 05</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="navigation">
                <div class="btn_nav active_slide"></div>
                <div class="btn_nav"></div>
                <div class="btn_nav"></div>
                <div class="btn_nav"></div>
                <div class="btn_nav"></div>
            </div>
        </div>
    </section>

    @php
    $genres = DB::table('genres')->get();
    $books = DB::table('books')
        ->where('shop_qty', '>', 0)
        ->get();
    @endphp

    <div class="main_container" data-scene>
        <!-- Filter Gallery -->
        <div class="container-fluid filterbox">
            <div class="filter-tabs">
                <div class="filter-sort">
                    <div class="navigation">
                        <a href="javascript:void(0)" data-filter="all" class="button active">All</a>
                        @foreach ($genres as $genre)
                            <a href="javascript:void(0)" data-filter="{{ $genre->genre_id }}""
                                class="button active">{{ $genre->genre_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="main-wrap wrap-inner">
                <div id="content">
                    <div class="main-full" id="main">
                        <ol class="content">
                            @foreach ($books as $book)
                                @php
                                    $bauth = DB::table('authors')
                                        ->where('author_id', '=', $book->author_id)
                                        ->first();
                                @endphp
                                <li class="team shot-thumbnail {{ $book->genre_id }}">
                                    <div class="multi-shot">
                                        <div class="dribbble-img">
                                            <a class="dribbble-link">
                                                <picture>
                                                    <div class="card">
                                                        <div class="imgBx">
                                                            @if ($book->book_dir != 'Test')
                                                                <img src="{{ asset('storage' . $book->book_dir) }}"">
                                                            @else
                                                                            <img src="
                                                                    {{ url(URL::asset('rss/book/img1.jpg')) }}">
                                                            @endif
                                                        </div>
                                                        <div class="content_card">
                                                            <div class="details">
                                                                <h2>{{ $book->book_name }} <br>
                                                                    <span>{{ $bauth->author_name }}</span> <br>
                                                                    <span>Rp.
                                                                        {{ number_format($book->shop_price, 2, ',', '.') }}</span>
                                                                </h2>
                                                                <ul class="sci">
                                                                    @if (getAuthUserType() == 'user')
                                                                        <form
                                                                            action="{{ url('/addCart/' . $book->book_id) }}"
                                                                            method="GET">
                                                                            <li><button type="submit">
                                                                                    <img
                                                                                        src="{{ url(URL::asset('rss/icons/cart.png')) }}">
                                                                                </button></li>
                                                                        </form>
                                                                    @endif
                                                                    <form action="{{ url('/detail/' . $book->book_id) }}"
                                                                        method="GET">
                                                                        <li><button type="submit">
                                                                                <img
                                                                                    src="{{ url(URL::asset('rss/icons/loupe.png')) }}">
                                                                            </button></li>
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </picture>
                                            </a>
                                            <a class="dribbble-over" href="{{ url(URL::asset('rss/book/img1.jpg')) }}"
                                                data-lightbox="mygallery" data-title="Dribbble">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- img-slider -->
    <script type="text/javascript">
        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn_nav');
        let currentSlide = 1;

        // manual navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active_slide');
                btns.forEach((btn) => {
                    btn.classList.remove('active_slide');
                });
            });


            slides[manual].classList.add('active_slide');
            btns[manual].classList.add('active_slide');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });


        // autoplay navigation
        var repeat = function(activeClass) {
            let active = document.getElementsByClassName('active_slide');
            let i = 1;

            var repeater = () => {
                setTimeout(function() {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active_slide');
                    });

                    slides[i].classList.add('active_slide');
                    btns[i].classList.add('active_slide');
                    i++;

                    if (slides.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
        }
        repeat();
    </script>

    <!-- Filter section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".button").click(function() {
                var name = $(this).attr('data-filter');
                if (name == "all") {
                    $(".shot-thumbnail").show('2000');
                } else {
                    $(".shot-thumbnail").not("." + name).hide('2000');
                    $(".shot-thumbnail").filter("." + name).show('2000');
                }
            })

            $(".navigation a").click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            })
        })

        refreshCSS = () => {
            let links = document.getElementsByTagName('link');
            for (let i = 0; i < links.length; i++) {
                if (links[i].getAttribute('rel') == 'stylesheet') {
                    let href = links[i].getAttribute('href')
                        .split('?')[0];

                    let newHref = href + '?version=' +
                        new Date().getMilliseconds();

                    links[i].setAttribute('href', newHref);
                }
            }
        }
    </script>
@endsection
