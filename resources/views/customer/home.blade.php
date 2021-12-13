@extends('customer.main')

@section('main')
    <style>
        /* header-landing */
        .header-landing {
            width: 100%;
            height: 100vh;
            background-image: url({{ URL::asset('rss/images/background.png') }});
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .logo {
            width: 100px;
            cursor: pointer;
        }

        .navbar {
            width: 85%;
            height: 15%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content {
            color: #fbfcfd;
            position: absolute;
            top: 50%;
            left: 8%;
            transform: translateY(-50%);
            z-index: 2;
        }

        .content h1 {
            font-size: 80px;
            margin: 10px 0 30px;
            line-height: 80px;
        }

        .bubbles img {
            width: 50px;
            animation: bubble 7s linear infinite;
        }

        .bubbles {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            position: absolute;
            bottom: -70px;
        }

        @keyframes bubble {
            0% {
                transform: translateY(0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            70% {
                opacity: 1;
            }

            100% {
                transform: translateY(-80vh);
                opacity: 0;
            }
        }

        .bubbles img:nth-child(1) {
            animation-delay: 2s;
            width: 25px;
        }

        .bubbles img:nth-child(2) {
            animation-delay: 1s;
        }

        .bubbles img:nth-child(3) {
            animation-delay: 3s;
            width: 25px;
        }

        .bubbles img:nth-child(4) {
            animation-delay: 4.5s;
        }

        .bubbles img:nth-child(5) {
            animation-delay: 3s;
        }

        .bubbles img:nth-child(6) {
            animation-delay: 6s;
            width: 20px;
        }

        .bubbles img:nth-child(7) {
            animation-delay: 7s;
            width: 35px;
        }

        .brand-logo {
            padding: 30px 0;
        }

        .brand-logo-inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo-inner img {
            width: 200px;
            height: 80%;
        }

        .brand-logo::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(to left, #fff, #0b2243, #fff);
        }

        /* sec2 */
        .sec2 {
            padding: 100px 0 0;
        }

        .sec2 h2 {
            text-transform: uppercase;
        }

        .sec2 p {
            line-height: 30px;
        }

        .sec2-inner {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .sec2-inner .img {
            width: 25%;
        }

        .sec2-inner .img img {
            width: 100%;
            height: 100%;
        }

        .sec2-inner .text {
            width: 50%;
            margin-left: 55px;
            z-index: 9;
        }

        .sec2 .text-inner {
            position: relative;
            margin: 55px 0 0 190px;
        }

        .sec2 .text-inner::before {
            content: "";
            position: absolute;
            top: 8px;
            left: -30px;
            width: 1px;
            height: 200px;
            background: linear-gradient(to top, #fff, #0b2243);
        }

        .left-right-sec:nth-child(odd) .text {
            margin-right: 55px;
            text-align: right;
        }

        .left-right-sec:nth-child(odd) .text-inner {
            margin: 55px 190px 0 0;
        }

        .left-right-sec:nth-child(odd) .text-inner::before {
            left: inherit;
            right: -30px;
        }

        .sec2 .btn {
            color: #130f40;
            text-decoration: none;
        }

        /* end-sec2 */

        /* sec3-slider */
        .sec3 {
            padding: 150px 0 0;
        }

        .sec3 h2 {
            text-transform: uppercase;
            max-width: 60%;
        }

        .sec3-slider {
            margin-top: 90px;
        }

        .slick-arrow {
            position: absolute;
            top: -160px;
        }

        .slick-prev {
            left: inherit;
            right: 180px;
        }

        .slick-next {
            right: 90px;
        }

        .slick-next::before,
        .slick-prev::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            background: #05636d url({{ URL::asset('rss/icons/right.png') }}) no-repeat;
            background-size: 14px;
            background-position: center;
            width: 70px;
            height: 70px;
            border: 1px solid #0b2243;
            opacity: 1;
        }

        .slick-prev::before {
            background: transparent url({{ URL::asset('rss/icons/left.png') }}) no-repeat;
            background-size: 14px;
            background-position: center;
        }

        .sec3-slider .item {
            height: 500px;
        }

        .sec3-slider .item img {
            height: 100%;
        }

        /* flip-card */
        .sec3 .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .sec3 .card {
            background: #fff;
            text-decoration: none;
            cursor: pointer;
            height: 500px;
        }

        .sec3 .front,
        .sec3 .back {
            width: 318px;
            height: 100%;
            overflow: hidden;
            backface-visibility: hidden;
            position: absolute;
            transition: transform 0.6s linear;
        }

        .sec3 .front img {
            height: 100%;
        }

        .sec3 .front {
            transform: perspective(600px) rotateY(0deg);
        }

        .sec3 .back {
            background: #fbfcfd;
            transform: perspective(600px) rotateY(180deg);
        }

        .sec3 .back-content {
            color: #05636d;
            text-align: center;
            width: 100%;
        }

        .sec3 .back h2 {
            margin-left: 20%;
        }

        .sec3 .sm {
            margin: 20px 0;
        }

        .sec3 .sm a {
            display: inline-flex;
            width: 40px;
            height: 40px;
            justify-content: center;
            align-items: center;
            color: #05636d;
            font-size: 18px;
            transition: 0.4s;
            border-radius: 50%;
        }

        .sec3 .sm a:hover {
            background: #05636d;
            color: #fff;
        }

        .sec3 .sm a img {
            height: 20px;
            width: 20px;
        }

        .sec3 .card:hover>.front {
            transform: perspective(600px) rotateY(-180deg);
        }

        .sec3 .card:hover>.back {
            transform: perspective(600px) rotateY(0deg);
        }

        /* end-slider */

        /* newsletter */
        .newsletter {
            background-image: url({{ URL::asset('rss/images/banner.jpg') }});
            /* background-attachment: fixed; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            margin-top: 5%;
            /* background: #05636d; */
            margin-bottom: 5%;
        }

        .newsletter form {
            padding: 10% 0;
            max-width: 45rem;
            margin-left: auto;
            text-align: center;
        }

        .newsletter form h3 {
            font-size: 2rem;
            color: #0b2243;
            padding-bottom: 0.5rem;
            font-weight: normal;
        }

        .newsletter form .box {
            width: 50%;
            height: 20px;
            margin: 0.2rem 0;
            padding: 1rem 1.2rem;
            font-size: 1rem;
            color: var(--black);
            border-radius: 0.5rem;
            text-transform: none;
        }

        .newsletter .btn {
            color: #0b2243;
        }

        .newsletter .btn:hover {
            color: #fff;
            background-color: #05636d;
        }

        /* end-news */

        .randombook{
            width: 100%;
            height: 100%;
            /* padding: 2vh; */
            padding-top: 16px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
    </style>
    <!-- header-banner -->
    <div class="header-landing" data-scene>
        <div class="content">
            @if (sudahLogin())
                @if(getAuthUserType() == "user")
                    <small>Welcome, {{getAuthUser()->user_fname}}, to our</small>
                @elseif (getAuthUserType() == "supp")
                    <small>Welcome, {{getAuthUser()->supplier_name}}, to our</small>
                @endif
                <h1>Book's<br> Creative Store</h1>
                <button type="button" class="btn">Take a tour</button>
            @else
                <small>Welcome, to our</small>
                <h1>Book's<br> Creative Store</h1>
                <button type="button" class="btn">Take a tour</button>
            @endif
        </div>
        <div class="bubbles">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
            <img src="{{ url(URL::asset('rss/images/bubble.png')) }}">
        </div>
    </div>

    <section class="brand-logo" data-scene>
        <div class="container">
            <div class="category-inner">
                <div class="brand-logo-inner" data-aos="fade-up">
                    <div class="item">
                        <a href="#"><img src={{ url(URL::asset('rss/images/gramedia.svg')) }}></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src={{ url(URL::asset('rss/images/bip.png')) }}></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src={{ url(URL::asset('rss/images/mnc.png')) }}></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src={{ url(URL::asset('rss/images/elex_media.svg')) }}></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src={{ url(URL::asset('rss/images/mizan.png')) }}></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec2 left-right-sec" data-scene>
        @php
            $randombook = DB::table('books')->inRandomorder()->first();
        @endphp
        <div class="container">
            <div class="sec2-inner">
                <div class="img" data-aos="zoom-out-up">
                    @if ($randombook->book_dir == "Test")
                        @php
                            $rand = rand(40,80) . rand(40,90) . rand(40,60);
                        @endphp
                        <div class="randombook" style="display: block; background-color: #{{$rand}} ;">
                            <div style="color: white; font-family: 'Times New Roman', Times, serif; border:solid white 2px;
                                font-size: 50px; height: 400px; margin: 10px 20px;">
                                {{$randombook->book_name}}
                            </div>
                        </div>
                    @else
                        <img src="{{asset('storage'.$randombook->book_dir) }}">
                    @endif
                </div>
                <div class="text" data-aos="zoom-out-left">
                    <h2>{{$randombook->book_name}}</h2>
                    <div class="text-inner">
                        <p>{{$randombook->book_synopsis}}</p>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec3" data-scene>
        <div class="container">
            <div class="sec3-inner" data-aos="zoom-out-left">
                <h2>Popular Book</h2>
                <div class="sec3-slider">

                    @foreach ($books as $book)
                        <div class="card">
                            <div class="front">
                                @if ($book->book_dir == "Test")
                                    @php
                                        $r = rand(10,50);
                                        $g = rand(10,50);
                                        $b = rand(10,50);
                                        $rand = $r . $g . $b;
                                        $chance = rand(1,3);
                                        if($chance == 1){
                                            $rand2 = dechex(rand(50,200)) . dechex(rand(50,200)) . dechex(rand(50,200));
                                        }else{
                                            $rand2 = $r+49 . $g+49 . $b+49;
                                        }
                                    @endphp
                                    <div class="randombook" style="display: block; background: linear-gradient(to bottom, #{{$rand}}, #{{$rand2}});">
                                        <div style="color: white; font-family: 'Times New Roman', Times, serif; border:solid white 2px;
                                            font-size: 50px; height: 90%; margin: 10px 20px;">
                                            {{$book->book_name}}
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ url(URL::asset('storage'.$book->book_dir)) }}">
                                @endif

                            </div>
                            <div class="back">
                                <div class="back-content middle">
                                    <h2>{{$book->book_name}}</h2>
                                    <span>{{$book->Authors->author_name}}</span>
                                    <div class="sm">
                                        <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                        <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    {{-- <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img3.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>Long Bright River</h2>
                                <span>Liz Moore</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img4.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>MetroPop: Saat-Saat Jauh</h2>
                                <span>Lia Seplia</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img5.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>Young Adult: The Arson Project</h2>
                                <span>Akaigita</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img6.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>When It's Real</h2>
                                <span>Erin Watt</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img7.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>The Scarlet Letter</h2>
                                <span>Nataniel Hawthorne</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="front">
                            <img src={{ url(URL::asset('rss/book/img8.jpg')) }}>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>Back To School</h2>
                                <span>PALUPIII</span>
                                <div class="sm">
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/cart.png')) }}></a>
                                    <a href="#"><img src={{ url(URL::asset('rss/icons/loupe.png')) }}></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter" data-scene>
        <form action="" data-aos="zoom-out-right">
            <h3>subscribe for latest updates</h3>
            <input type="email" name="" placeholder="enter your email" id="" class="box">
            <input type="submit" value="subscribe" class="btn">
        </form>

    </section>

    <section class="sec2 left-right-sec" data-scene>
        <div class="container">
            <div class="sec2-inner">
                <div class="text" data-aos="zoom-out-right">
                    <h2>Le Mariage: The Promise of Forever</h2>
                    <div class="text-inner">
                        <p>Setelah kehilangan anak dan pernikahannya, Renae Adiana tidak lagi memercayai cinta dan adanya
                            akhir yang bahagia. Dengan kekurangan terbesar yang dimiliki Renae, tidak akan ada laki-laki
                            yang menginginkan Renae sebagai istrinya. </p>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
                <div class="img" data-aos="zoom-out-left"><img src={{ url(URL::asset('rss/book/img2.jpg')) }}>
                </div>
            </div>
        </div>
    </section>
@endsection
