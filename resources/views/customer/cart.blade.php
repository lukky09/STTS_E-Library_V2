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

        .main_contain .controls #decrement {
            padding-left: 5px;
            border-radius: 45px 0 0 45px;
        }

        .main_contain .controls #increment {
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

        .main_contain .checkout a{
            color: #000;
            text-decoration: none;
        }

        .main_contain .checkout:hover a{
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
                    <b>( 2 ) ITEMS</b>
                </div>

            </div>
            <div class="product_wrap">
                <div class="product_info">
                    <div class="product_img">
                        <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                    </div>
                    <div class="product_data">
                        <div class="description">
                            <h3> Catatan Tentang Hujan </h3>
                            <h5> Anindya Frista </h5>
                        </div>
                        <div class="qty">
                            <div class="controls">
                                <button id="decrement" onclick="stepper(this)"> - </button>
                                <input type="number" min="1" max="100" step="1" value="1" id="my-input" readonly>
                                <button id="increment" onclick="stepper(this)"> + </button>
                            </div>
                        </div>
                        <div class="price"> Rp 92.000  </div>
                    </div>
                </div>
            </div>
            <div class="product_wrap">
                <div class="product_info">
                    <div class="product_img">
                        <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                    </div>
                    <div class="product_data">
                        <div class="description">
                            <h3> Catatan Tentang Hujan </h3>
                            <h5> Anindya Frista </h5>
                        </div>
                        <div class="qty">
                            <div class="controls">
                                <button id="decrement" onclick="stepper(this)"> - </button>
                                <input type="number" min="1" max="100" step="1" value="1" id="my-input" readonly>
                                <button id="increment" onclick="stepper(this)"> + </button>
                            </div>
                        </div>
                        <div class="price"> Rp 92.000  </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper_amount" data-aos="zoom-out-left">
            <div class="header_title">
                <div class="title"> TOTAL PRICE DETAILS: </div>
                <div class="amount"> <b> Rp 184.000</b> </div>
            </div>
            <div class="price_details">
                <div class="item">
                    <p>Bag Total :</p> <p>Rp 184.000</p>
                </div>
                <div class="item">
                    <p>Order Total :</p> <p>Rp 184.000</p>
                </div>
                <div class="item">
                    <p>Delivery Charges :</p>
                    <p><span style="text-decoration: line-through;"></span>Rp 20.000 <span class="green">FREE</span>
                    </p>
                </div>
                <div class="total">
                    <p>Total :</p> <p>Rp 184.000</p>
                </div>
            </div>
            <div class="checkout"> <a href="#" class="btn">Place Order</a> </div>
        </div>
    </div>

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
