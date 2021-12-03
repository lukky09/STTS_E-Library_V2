@extends('customer.main')

@section('main')
    <style>
        header {
            background: #05636d;
        }

        .main-contain {
            /* background-color: blue; */
            height: 5000px;
        }

        .main_contain img {
            width: 300px;
            height: 400px;
            display: block;
        }

        .main_contain .main-wrapper {
            margin-top: 8%;
            /* min-height: 50vh; */
            overflow-x: 0;
            /* background-color: blue; */
            height: fit-content;
            /* heightnya 500*jumlah item */
            /* nanti coba tiap query, value ini diganti pake blade php */
        }

        .main_contain .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
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

        .main_contain .display-style-btns {
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background-color: #fff;
            padding: 16px 0;
            border-radius: 5px;
        }

        .main_contain .display-style-btns button {
            border: none;
            font-size: 22px;
            display: inline-block;
            vertical-align: top;
            margin: 0 8px;
            background-color: transparent;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .main_contain .display-style-btns button:hover {
            color: #05636d;
        }

        .main_contain .active-btn {
            color: #05636d;
        }

        .main_contain .item-list {
            margin: 36px 10px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            row-gap: 32px;
        }

        .main_contain .item {
            margin-right: 10px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 4px 0 rgba(15, 4, 4, 0.05);
            transition: all 0.2s ease-out;
        }

        .main_contain .item:hover {
            box-shadow: 0 0 10px 1px rgba(0, 4, 4, 0.15);
        }

        .main_contain .item-img {
            position: relative;
            overflow: hidden;
        }

        .main_contain .item-img img {
            /* width: 70%; */
            margin: 16px auto;
        }

        .main_contain .icon-list {
            position: absolute;
            bottom: -100px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease-out;
        }

        .main_contain .icon-list button {
            border: none;
            background-color: #05636d;
            color: #fff;
            margin: 0 6px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .main_contain .icon-list button:hover {
            background-color: #f4f4f4;
            color: #202020;
        }

        .main_contain .item-img:hover .icon-list {
            bottom: 26px;
        }

        .main_contain .item-detail {
            padding: 16px;
            color: #202020;
            text-align: center;
        }

        .main_contain .item-name {
            font-weight: 500;
            font-size: 18px;
            color: #202020;
            display: block;
        }

        .main_contain .item-price {
            margin: 10px 0;
            font-weight: 300;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main_contain .old-price {
            text-decoration: line-through;
            opacity: 0.6;
        }

        .main_contain .new-price {
            color: #f79410;
            font-size: 18px;
            font-weight: 600;
            margin-right: 10px;
        }

        .main_contain .item-detail p {
            font-weight: 300;
            opacity: 0.9;
            font-size: 15px;
            line-height: 1.7;
            display: none;
        }

        .main_contain .add-btn {
            margin: 16px 0;
            text-transform: uppercase;
            border: none;
            background-color: white;
            color: #05636d;
            font-family: inherit;
            padding: 10px 28px;
            border: 1px solid #202020;
            cursor: pointer;
            transition: all 0.3s ease-out;
            display: none;
        }

        .main_contain .add-btn:hover {
            background-color: #05636d;
            color: #fff;
        }

        /* stylings for details active */
        .main_contain .item-list.details-active {

            grid-template-columns: 100%;
        }

        .main_contain .details-active .item {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            align-items: center;
        }

        .main_contain .details-active .item-detail {
            text-align: left;
        }

        .main_contain .details-active .item-price {
            justify-content: flex-start;
        }

        .main_contain .details-active .item-detail p {
            display: block;
        }

        .main_contain .details-active .item-detail .add-btn {
            display: block;
        }

    </style>

    @php
    $books = DB::table('shopbooks')->get();
    dd($books);
    @endphp

    <section class="main_contain" data-scene>
        <div class="main-wrapper">
            <div class="container">
                <div class="main-title" id="main_title" data-aos="fade-up">
                    <h2>Product Shop List</h2>
                </div>
                <div class="display-style-btns" data-aos="zoom-out-right">
                    <button type="button" id="grid-active-btn">
                        <i class="fas fa-th"></i>
                    </button>
                    <button type="button" id="details-active-btn">
                        <i class="fas fa-list-ul"></i>
                    </button>
                </div>

                @foreach ($books as $b)
                    @php
                        $book = DB::table('books')
                            ->where('book_id', $b->book_id)
                            ->first();
                    @endphp
                @endforeach

                <div class="item-list">
                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair A</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>

                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>

                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>

                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>

                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>

                    <div class="item" data-aos="zoom-out-up">
                        <div class="item-img">
                            <img src="{{ url(URL::asset('rss/book/img1.jpg')) }}">
                            <div class="icon-list">
                                <button type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="item-detail">
                            <a href="#" class="item-name">Accent Chair SDF</a>
                            <div class="item-price">
                                <span class="new-price">$220.00</span>
                                <span class="old-price">$275.60</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore fugiat quod corporis
                                delectus sequi laudantium molestias vero distinctio, qui numquam dolore, corrupti, enim
                                consectetur cum?</p>
                            <button type="button" class="add-btn btn">add to cart</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const itemList = document.querySelector('.item-list');
        const gridViewBtn = document.getElementById('grid-active-btn'); //grid
        const detailsViewBtn = document.getElementById('details-active-btn'); //list
        const a = document.querySelector('.main-wrapper');

        gridViewBtn.classList.add('active-btn');
        detailsViewBtn.classList.remove('active-btn');

        gridViewBtn.addEventListener('click', () => {
            gridViewBtn.classList.add('active-btn');
            detailsViewBtn.classList.remove('active-btn');
            itemList.classList.remove('details-active');
            a.style.height = "fit-content"
        });

        detailsViewBtn.addEventListener('click', () => {
            detailsViewBtn.classList.add('active-btn');
            gridViewBtn.classList.remove("active-btn");
            itemList.classList.add("details-active");
            a.style.height = "3000px";
        });
    </script>
@endsection
