@extends('customer.main')

@section('main')
    <style>
        header {
            background: #05636d;
        }

        .main_contain {
            box-sizing: border-box;
            justify-content: center;
            background: #fff;
            margin-top: 10%;
        }

        .main_contain .main-title {
            text-align: center;
        }

        .main_contain .main-title h1 {
            padding: 16px 0;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* collaps-item */
        .container-item {
            padding-top: 50px;
            justify-content: center;
        }

        .collapsible {
            max-width: 1200pc;
            overflow: hidden;
            font-weight: 500;
        }

        .collapsible .contain_head {
            position: relative;
            font-weight: 600;
            background: #fff;
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .1), 0 4px 11px 0 rgba(0, 0, 0, .08);
            color: #1c1c6b;
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
            z-index: 1;
        }

        .collapsible .contain_head::after {
            content: "";
            position: absolute;
            right: 15px;
            top: 15px;
            width: 18px;
            height: 18px;
            background: url({{ URL::asset('rss/icons/arrow_down.png') }}) no-repeat 0 0;
            transition: all 0.3s ease;
        }

        .collapsible .contain_head::after {
            transform: rotate(90deg)
        }

        .collapsible-text {
            max-height: 1px;
            overflow: hidden;
            border-radius: 4px;
            line-height: 1.4;
            position: relative;
            top: -100%;
            opacity: 0.5;
            transition: all 0.3s ease;
            padding: 2%;
        }

        .collapsible .all-item .collapsible-text{
            display: none;
        }

        .collapsible .all-item.active .collapsible-text {
            display: block;
            max-height: 300px;
            padding-bottom: 25px;
            background: #fff;
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .1), 0 4px 11px 0 rgba(0, 0, 0, .08);
            opacity: 1;
            top: 0;
        }

        .contain_date, .subtotal{
            text-align: right;
            margin: 10px;
        }

        .subtotal {
            font-size: 20px;
            color: #1c1c6b;
        }

        /* detail */
        /* .header-details .star-widget input {
            display: none;
        }

        .header-details .star-widget label {
            font-size: 20px;
            color: #444;
            padding: 10px;
            float: right;
            transition: all 0.2s ease;
        } */

        .header-details input:not(:checked)~label:hover,
        .header-details input:not(:checked)~label:hover~label {
            color: #fd4;
        }

        .header-details input:checked~label {
            color: #fd4;
        }

        .header-details input#rate-5:checked~label {
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        .text{
            margin-top: 5%;
            text-transform: uppercase;
            margin-bottom: 8%;
            text-align: center;
            justify-content: center;
        }

        .product-details .header-details .price{
            margin-right: 10px;
            text-align: right;
            display: block;
            margin-top: -20px;
        }
    </style>

    <section class="main_contain" data-scene>
        <div class="main-wrapper">
            <div class="container">
                <div class="main-title" id="main_title" data-aos="fade-up"><h2>History Shop List</h2></div>
                <div class="container-item">
                    <div class="collapsible">
                        <label class="contain_head" onclick="openContain(0)">Nomer Nota</label>
                        <div class="all-item all-item0">
                            <div class="collapsible-text">
                                <div class="contain_date">07/12/2021</div>
                                <div class="product-details">
                                    <div class="header-details">
                                        <h3 class="title">Nama Buku</h3>
                                        <p class="jum">5x</p>
                                        <p class="price">Rp. 12.000 </p>
                                        <p class="subtotal">Rp. 12.000</p>
                                        {{-- <div class="star-widget">
                                            <input type="radio" name="rate" id="rate-5">
                                            <label for="rate-5" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-4">
                                            <label for="rate-4" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-3">
                                            <label for="rate-3" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-2">
                                            <label for="rate-2" class="fas fa-star"></label>
                                            <input type="radio" name="rate" id="rate-1">
                                            <label for="rate-1" class="fas fa-star"></label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-text">
                                <div class="contain_date">07/12/2021</div>
                                <div class="product-details">
                                    <div class="header-details">
                                        <h3 class="title">Nama Buku</h3>
                                        <p class="jum">5x</p>
                                        <p class="price">Rp. 12.000 </p>
                                        <p class="subtotal">Rp. 12.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-item">
                    <div class="collapsible">
                        <label class="contain_head" onclick="openContain(1)">Nomer Nota</label>
                        <div class="all-item all-item1">
                            <div class="collapsible-text">
                                <div class="contain_date">07/12/2021</div>
                                <div class="product-details">
                                    <div class="header-details">
                                        <h3 class="title">Nama Buku</h3>
                                        <p class="jum">5x</p>
                                        <p class="price">Rp. 12.000 </p>
                                        <p class="subtotal">Rp. 12.000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="collapsible-text">
                                <div class="contain_date">07/12/2021</div>
                                <div class="product-details">
                                    <div class="header-details">
                                        <h3 class="title">Nama Buku</h3>
                                        <p class="jum">5x</p>
                                        <p class="price">Rp. 12.000 </p>
                                        <p class="subtotal">Rp. 12.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text">
                Thank you for buying from us
            </div>
        </div>
    </section>
    <script>
        function openContain(id) {
            let toggleContain = document.querySelector('.all-item'.concat(id));
            toggleContain.classList.toggle('active');
        }
    </script>
@endsection
