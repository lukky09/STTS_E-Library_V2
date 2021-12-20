@extends('customer.main')

@section('main')
    <style>
        header {
            background: #05636d;
        }

        .main_contain {
            margin-top: 3%;
            display: flex;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            line-height: 22px;
            max-width: auto;
            justify-content: space-evenly;
        }

        .main_contain .wrapper_content {
            width: 50%;
            height: auto;
            padding: 15px;
            margin: 50px 0;
            position: relative;
            margin-left: 100px;
        }

        .main_contain .wrapper_amount {
            width: 50%;
            height: auto;
            padding: 15px;
            margin: 50px 0;
            margin-right: 100px;
            /* position: relative; */
        }

        .main_contain .header_title {
            display: flex;
            justify-content: space-between;
            width: 560px;
            margin: 0 auto;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .main_contain .product_wrap,
        .main_contain .price_details {
            width: 560px;
            margin: 0 auto;
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
        }

        .main_contain .product_info {
            display: flex;
            align-items: center;
        }

        .main_contain .product_data {
            margin: 0 50px;
        }

        .main_contain .description {
            margin-bottom: 15px;
        }

        .main_contain .product_img img {
            display: block;
            width: 150px;
            height: 220px;
        }

        .main_contain .main_header {
            font-weight: 700;
        }

        .main_contain .sub_header {
            color: pink;
        }

        .main_contain .product_btns {
            display: flex;
            margin: 0 auto;
            text-align: center;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #e4e4e4;
            color: #aca9a9;
        }

        .main_contain .product_btns>div {
            padding: 5px 15px;
            cursor: pointer;
        }

        .main_contain .price {
            margin-bottom: 10px;
            text-align: right;
            align-items: right;
            font-weight: 500;
            font-size: 20px;
            color: #05636d;
        }

        .main_contain .controls {
            margin-bottom: 10px;
            position: relative;
            width: 40px;
            height: 30px;
            display: flex;
            background-color: #ffffff;
            border-radius: 45px;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        .main_contain .controls input[type="number"] {
            -moz-appearance: textfield;
            text-align: center;
            font-size: 20px;
            border: none;
            background-color: #ffffff;
            color: #202030;
            width: 50px;
        }

        .main_contain .controls input::-webkit-outer-spin-button,
        .main_contain .controls input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .main_contain .controls button {
            color: #05636d;
            background-color: #ffffff;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .main_contain .controls .decrement {
            padding-left: 5px;
            border-radius: 45px 0 0 45px;
        }

        .main_contain .controls .increment {
            padding-right: 5px;
            border-radius: 0 45px 45px 0;
        }

        .main_contain .price_details .item,
        .main_contain .total {
            display: flex;
            justify-content: space-between;
        }

        .main_contain .price_details .item {
            margin-bottom: 10px;
        }

        .main_contain .price_details .total {
            padding-top: 10px;
            border-top: 1px solid #e4e4e4;
            font-weight: 700;
            margin-top: 20px;
        }

        .main_contain .checkout {
            text-align: center;
            cursor: pointer;
        }

        .main_contain .checkout a {
            color: #000;
            text-decoration: none;
        }

        .main_contain .checkout:hover a {
            color: #fff;
        }

    </style>

    <div class="main_contain" data-scene>
        <div class="wrapper_content" data-aos="zoom-out-left">
            <div class="header_title">
                <div class="title">
                    MY SHOPPING CART :
                </div>
                <div class="amount">
                    <b>(
                        @if (Session::has('cartids'))
                            {{ count(Session::get('cartids')) }}
                        @else
                            0
                        @endif ) ITEMS
                    </b>
                </div>

            </div>
            @php
                $price = 0;
                $index = -1;
            @endphp
            @if (Session::has('cartids'))
                @foreach (Session::get('cartids') as $c)
                    @php
                        $book = DB::table('books')
                            ->where('book_id', $c[0])
                            ->first();
                        $author = DB::table('authors')
                            ->where('author_id', $book->author_id)
                            ->first();
                        $price += $book->shop_price * $c[1];
                        $index += 1;
                    @endphp
                    <div class="product_wrap">
                        <div class="product_info">
                            <div class="product_img">
                                @if ($book->book_dir != 'Test')
                                    <img src="{{ asset('storage' . $book->book_dir) }}">
                                @else
                                    <img src=" {{ url(URL::asset('rss/book/img1.jpg')) }}">
                                @endif
                            </div>
                            <div class="product_data">
                                <div class="description">
                                    <h3> {{ $book->book_name }} </h3>
                                    <h5> {{ $author->author_name }} </h5>
                                </div>
                                <div class="qty">
                                    <div class="controls">
                                        <button class="decrement"
                                            onclick="stepper('{{ $c[0] }}', 'decrement')"> - </button>
                                        <input type="number" min="1" max="100" step="1" index="{{ $index }}"
                                            value="{{ $c[1] }}" id="{{ $c[0] }}" readonly>
                                        <button class="increment"
                                            onclick="stepper('{{ $c[0] }}', 'increment')"> + </button>
                                    </div>
                                </div>
                                <div class="price"> Rp {{ number_format($book->shop_price, 2, ',', '.') }} </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <div class="wrapper_amount" data-aos="zoom-out-left">
            <div class="header_title">
                <div class="title"> CURRENT BALANCE: </div>
                <div class="amount"> <b> Rp {{ number_format(getAuthUser()->user_saldo, 2, ',', '.') }}</b>
                </div>
            </div>
            <div class="price_details">
                <div class="item">
                    <p>Bag Total :</p>
                    <p class="ajax2">Rp {{ number_format($price, 2, ',', '.') }}</p>
                </div>
                <div class="total">
                    <p>Result Balance :</p>
                    <p class="ajax3">Rp {{ number_format(getAuthUser()->user_saldo - $price, 2, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="checkout" id="checkout">
                <a href="{{ url('doOrder') }}" class="btn">Place Order</a>
                {{-- <a class="btn">Place Order</a> --}}
            </div>
        </div>
    </div>

    {{-- stepper --}}
    <script>
        function stepper(id, typeIn) {
            let type = typeIn
            const myInput = document.getElementById(id);
            let min = myInput.getAttribute("min");
            let indexe = myInput.getAttribute("index");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (type == "increment") ? (step * 1) : (step * -1);
            let newValue = parseInt(val) + calcStep;

            if (newValue >= min && newValue <= max) {
                $.ajax({
                    type: 'GET',
                    url: '/editCart',
                    data: {
                        newval: newValue,
                        index: indexe
                    },
                    success: function(data) {
                        $(".ajax2").html("Rp. " + data.jum);
                        $(".ajax3").html("Rp. " + data.tot);
                        myInput.setAttribute("value", data.newval);
                        if (data.tot.substring(0, 1) == "-") {
                            toastr.warning("You don't have enough money", 'Warning');
                        }
                    }
                });
            }
        }
    </script>

    {{-- toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        function toastMessage() {
            // Display a warning toast, with no title
            toastr.warning('you dont have enough money', 'Warning')

            toastr.info('Please Top Up First');

            // Display a success toast, with a title
            toastr.success('Success Buy', 'Message')

            // Display an error toast, with a title
            //toastr.error('Error message')

            // // Immediately remove current toasts without using animation
            // toastr.remove()

            // // Remove current toasts using animation
            // toastr.clear()

            // // Override global options
            // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {
            //     timeOut: 5000
            // })
        }
    </script>

    @if (Session::has('message') && Session::get('message')[0]== 1)
        <script>
            toastr.success('{{ Session::get('message')[1] }}', 'Success Buy')
        </script>
    @elseif (Session::has('message') && Session::get('message')[0] == 0)
        <script>
            toastr.error('{{ Session::get('message')[1] }}')
        </script>
    @endif

@endsection
