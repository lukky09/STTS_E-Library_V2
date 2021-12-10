@extends('customer.main')

@section('main')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        header {
            background: #05636d;
        }

        .main_contain {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            background: #fff;
            margin-top: 80px;
        }

        /* card-book  */
        .main_contain .card {
            margin: 60px 180px;
            position: relative;
            width: 300px;
            height: 400px;
            background: #fff;
            transform-style: preserve-3d;
            transform: perspective(1000px);
            box-shadow: 10px 20px 40px rgba(0, 0, 0, 0.25);
            transition: 1s;
        }

        .main_contain .card:hover {
            transform: translateX(50%);
        }

        .main_contain .card .imgBox {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
            transform-origin: left;
            transform-style: preserve-3d;
            background: #000;
            transition: 1s;
            box-shadow: 10px 20px 40px rgba(0, 0, 0, 0.25);
        }

        .main_contain .card:hover .imgBox {
            transform: rotateY(-180deg);
        }

        .main_contain .card .imgBox img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform-style: preserve-3d;
            backface-visibility: hidden;
        }

        .main_contain .card .imgBox img:nth-child(2) {
            transform: rotateY(180deg);
        }

        .main_contain .card .details {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main_contain .card .details .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .main_contain .card .details .content h2 {
            text-align: center;
            font-weight: 700;
            line-height: 1em;
            font-size: 20px;
        }

        .main_contain .card .details .content h2 span {
            color: #e21212;
            font-size: 0.8em;
            font-weight: 400;
        }

        /* end card-book */

        /* contain-detail */
        /* header-book */
        .main_contain .contain {
            padding-top: 3%;
            width: 40%;
        }

        .main_contain .contain .product-details {
            padding: 40px;
            background-color: #fff;
            border-radius: 0 0 20px 20px;
        }

        .main_contain .contain .product-details .title {
            text-transform: uppercase;
            margin: 0;
        }

        .main_contain .contain .product-details .colorCat {
            text-transform: uppercase;
            font-style: italic;
            color: #05636d;
            font-weight: 700;
            font-size: 14px;
        }

        .main_contain .contain .product-details .price {
            font-weight: 700;
            margin-top: 5px;
            font-size: 18px;
        }

        .main_contain .contain .product-details .before {
            text-decoration: line-through;
        }

        .main_contain .contain .product-details .header-details {
            margin-bottom: 20px;
            position: relative;
        }

        .main_contain .contain .product-details .rate {
            position: static;
            margin-top: 10px;
        }

        .main_contain .contain .product-details .rate a {
            text-decoration: none;
            font-size: 18px;
            color: #bbb;
        }

        .main_contain .contain .product-details .rate a.active,
        .main_contain .contain .product-details .rate a:hover {
            color: #fe6067;
        }

        /* end header-book */

        /* content */
        .main_contain .contain article {
            display: flex;
        }

        .main_contain .contain article .content-detail {
            margin-right: 20px;
        }

        .main_contain .contain .product-details h4 {
            margin: 0.5em 0;
        }

        .main_contain .contain .product-details article .content-detail p {
            color: #05636d;
            margin: 0.5em 0;
            font-size: 14px;
            line-height: 1.6;
        }

        /* end content */

        /* input number & btn cart */
        .main_contain .contain .product-details .controls {
            margin: 2em 0;
        }

        .main_contain .contain .controls {
            position: relative;
            width: 100px;
            height: 50px;
            display: flex;
            background-color: #ffffff;
            border-radius: 45px;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        .main_contain .contain .controls input[type="number"] {
            -moz-appearance: textfield;
            text-align: center;
            font-size: 20px;
            border: none;
            background-color: #ffffff;
            color: #202030;
        }

        .main_contain .contain .controls input::-webkit-outer-spin-button,
        .main_contain .contain .controls input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .main_contain .contain .controls button {
            color: #05636d;
            background-color: #ffffff;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .main_contain .contain .controls #decrement {
            padding: 10px 5px 10px 20px;
            border-radius: 45px 0 0 45px;
        }

        .main_contain .contain .controls #increment {
            padding: 10px 20px 10px 5px;
            border-radius: 0 45px 45px 0;
        }

        .sec-control {
            display: flex;
        }

        .sec-control .btn {
            margin-left: 80px;
            margin-top: 30px;
            height: 50px;
        }

        .sec-control .btn a {
            text-decoration: none;
            color: #000;
        }

        .sec-control .btn:hover a {
            color: #fff;
        }

        /* end input number & btn cart */
        /* end contain-detail */

        /* recommendation-book */
        .sec3 {
            padding: 50px 0 0;
            margin-bottom: 100px;
        }

        .sec3 h2 {
            text-transform: uppercase;
            max-width: 60%;
        }

        .sec3-slider {
            margin-top: 40px;
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
            height: 300px;
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
            height: 300px;
        }

        .sec3 .front,
        .sec3 .back {
            width: 218px;
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
            font-size: 20px;
            margin-left: 20%;
        }

        .sec3 .sm {
            margin: 20px 0;
        }

        .sec3 .sm a {
            display: inline-flex;
            width: 30px;
            height: 30px;
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
        /* end-recommendation */

    </style>

    @php
    $book = DB::table('books')
        ->where('book_id', $id)
        ->first();
    $publisher = DB::table('publishers')
        ->where('publisher_id', $book->publisher_id)
        ->first();
    $author = DB::table('authors')
        ->where('author_id', $book->author_id)
        ->first();
    @endphp

    <div class="main_contain" data-scene>
        <div class="card" data-aos="zoom-out-up">
            <div class="imgBox">
                @if ($book->book_dir != 'Test')
                    <img src="{{ asset('storage' . $book->book_dir) }}">
                    <img src="{{ asset('storage' . $book->book_dir) }}">
                @else
                    <img src=" {{ url(URL::asset('rss/book/img1.jpg')) }}">
                    <img src=" {{ url(URL::asset('rss/book/img1.jpg')) }}">
                @endif
            </div>
            <div class="details">
                <div class="content">
                    <h2>{{ $book->book_name }} <br><span>{{ $author->author_name }}</span></h2> <br>
                    <p>{{ $book->book_synopsis }}</p>
                </div>
            </div>
        </div>
        <div class="contain" data-aos="zoom-out-right">
            <div class="product-details">
                <div class="header-details">
                    <h3 class="title">{{ $book->book_name }}</h3>
                    <span class="colorCat">{{ $author->author_name }}</span>
                    <p class="price">Rp. {{ number_format($book->shop_price, 2, ',', '.') }} </p>
                    <div class="rate">
                        <a href="#" class="active">★</a>
                        <a href="#" class="active">★</a>
                        <a href="#" class="active">★</a>
                        <a href="#">★</a>
                        <a href="#">★</a>
                    </div>
                </div>
                <h4>Detail</h4>
                <article>
                    <div class="content-detail">
                        <h5>ISBN</h5>
                        <p>9786230028113</p>
                        <h5>Penerbit</h5>
                        <p>{{ $publisher->publisher_name }}</p>
                        <h5>Tanggal Terbit</h5>
                        <p>24 Nov 2021</p>
                    </div>
                    <div class="content-detail">
                        <h5>Jumlah Halaman</h5>
                        <p>312</p>
                        <h5>Bahasa</h5>
                        <p>Indonesia</p>
                        <h5>Format Buku</h5>
                        <p>Soft Cover</p>
                    </div>
                </article>
                @if (getAuthUserType() == 'user')
                    <div class="sec-control">
                        <form method="POST" action="{{ url('addCartA') }}">
                            @csrf
                            <div class="controls">
                                <input type="hidden" value="{{ $id }}" name="id">
                                <button type="button" id="decrement" onclick="stepper(this)"> - </button>
                                <input type="number" name="qty" min="1" max="100" step="1" value="1" id="my-input" readonly>
                                <button type="button" id="increment" onclick="stepper(this)"> + </button>
                            </div>

                            <button type="submit" class="btn">
                                <a class="fas fa-shopping-cart"></a>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <section class="sec3" data-scene>
        <div class="container">
            <div class="sec3-inner" data-aos="zoom-out-left">
                <h2>Recommendation Book</h2>
                <div class="sec3-slider">
                    <div class="card">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const myInput = document.getElementById("my-input");

        function stepper(btn) {
            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (id == "increment") ? (step * 1) : (step * -1);
            let newValue = parseInt(val) + calcStep;

            if (newValue >= min && newValue <= max) {
                myInput.setAttribute("value", newValue);
            }
        }
    </script>
@endsection
