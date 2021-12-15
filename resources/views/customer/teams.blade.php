@extends('customer.main')

@section('main')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        header {
            background: #05636d;
        }

        .contain_teams {
            margin-top: 3%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            background: #fff;
            min-height: 100vh;
        }

        .contain_teams::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#006466, #D8F3DC);
            clip-path: circle(20% at right 50%);
        }

        .contain_teams::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#D8F3DC, #081C15);
            clip-path: circle(20% at 10% 10%);
        }

        .contain_teams .container {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin: 40px 0;
        }

        .contain_teams .container .card {
            position: relative;
            width: 250px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            margin: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .contain_teams .container .card .content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 0.5;
            transition: 0.5s;
        }

        .contain_teams .container .card:hover .content {
            opacity: 1;
            transform: translateY(-20px);
        }

        .contain_teams .container .card .content .imgBx {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 10px solid rgba(0, 0, 0, 0.25);
        }

        .contain_teams .container .card .content .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .contain_teams .container .card .content .contentBx h3 {
            color: #05636d;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
            font-size: 18px;
            text-align: center;
            margin: 20px 0 10px;
            line-height: 1.1em;
        }

        .contain_teams .container .card .content .contentBx h3 span {
            font-size: 12px;
            font-weight: 300;
            text-transform: initial;
        }

        .contain_teams .container .card .sci {
            position: absolute;
            bottom: 50px;
            display: flex;
        }

        .contain_teams .container .card .sci li {
            list-style: none;
            margin: 0 10px;
            transform: translateY(40px);
            transition: 0.5s;
            opacity: 0;
            transition-delay: calc(0.1s * var(--i));

        }

        .contain_teams .container .card:hover .sci li {
            transform: translateY(0px);
            opacity: 1;
        }

        .contain_teams .container .card .sci li a {
            color: #05636d;
            font-size: 24px;
        }

    </style>

    <section class="contain_teams" data-scene>
        <div class="container">
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url(URL::asset('rss/images/p4.jpg')) }}"></div>
                    <div class="contentBx">
                        <h3>JULIUS SUGIANTO <br> <span>219116834</span></h3>
                    </div>
                </div>

                <ul class="sci">
                    <li style="--i:1"><a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:2"><a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:3"><a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url(URL::asset('rss/images/p4.jpg')) }}"></div>
                    <div class="contentBx">
                        <h3>INDAH CAHYANI S <br> <span>219116852</span></h3>
                    </div>
                </div>

                <ul class="sci">
                    <li style="--i:1"><a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:2"><a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:3"><a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url(URL::asset('rss/images/p4.jpg')) }}"></div>
                    <div class="contentBx">
                        <h3>LUKKY HARIYANTO <br> <span>219116856</span></h3>
                    </div>
                </div>

                <ul class="sci">
                    <li style="--i:1"><a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:2"><a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:3"><a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
            <div class="card">
                <div class="content">
                    <div class="imgBx"><img src="{{ url(URL::asset('rss/images/p4.jpg')) }}"></div>
                    <div class="contentBx">
                        <h3>RAY VITTO NUGROHO <br> <span>219116858</span></h3>
                    </div>
                </div>

                <ul class="sci">
                    <li style="--i:1"><a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:2"><a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a></li>
                    <li style="--i:3"><a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
        </div>
    </section>

@endsection
