@extends('supplier.main')

@section('main')
<style>
    body{
        background-color: #3E1F47;
        width: 100%;
        margin: 0;
    }

    .addform{
        color: white;
        /* width: 100vw; */
        margin-left: auto;
        margin-right: auto;
        background-size: cover;
        background-position: center;
        height: 100vh;
        position: relative;
        overflow: hidden;
    }

    #overlaylayer{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image:linear-gradient(to bottom, rgba(20,5,10, 0.52), rgba(117, 19, 93, 0.2));
        z-index: -1;
    }

    .formmodal{
        z-index: 1;
    }

    .addform form{
        width: 50vw;
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;
        border-radius: 20px;
        /* border: 5px solid white; */
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .addform form h1{
        margin-top: 10px;
        margin-bottom: 0px;
    }

    .forminputs{
        height: 5vh;
        width: 100%;
        border-radius: 10px;
        font-size: 20px;
    }
    .btn{
        border: 5px solid white;
    }
    .row{
        margin-top: 2vh;
    }

    #btnAdd{
        margin-top: 50px;
    }



    .header-landing {
            width: 100%;
            height: 100vh;
            /* background-image: url({{ URL::asset('rss/images/background.png') }}); */
            background-color: #312244;
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
            /* font-size: 80px;
            margin: 10px 0 10px;
            line-height: 50px; */
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
            margin-left: -65px;
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
            margin-right: -65px;
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
</style>
<div class="addform" data-scene style="background-image: url({{URL::asset('webres/pexels-pixabay-159711.jpg')}})">
    <div id="overlaylayer"></div>
    <form action="{{url('supplier/doAddBook')}}" method="POST" class="formmodal" style="" enctype="multipart/form-data">
        @csrf
        <h1>Add Book</h1>
        <div class="row">
            <label for="form-title">Title</label>
            <input type="text" name="booktitle" placeholder="title" class="form-control forminputs" id="form-title">
            @error('booktitle')
                <div class="err">{{$message}}</div>
            @enderror
        </div>
        @php
            $genres = DB::table('genres')->get();
            $publishers = DB::table('publishers')->get();
            $authors = DB::table('authors')->get();
        @endphp
        <div class="row mt-2">
            <label for="form-genres">Genre</label>
            <select name="bookgenre" id="" class="form-control forminputs" id="form-genres">
                @foreach ($genres as $genre)
                    <option value="{{$genre->genre_id}}">{{$genre->genre_name}}</option>
                @endforeach
            </select>
            @error('bookgenre')
                <div class="err">{{$message}}</div>
            @enderror
        </div>
        <div class="row mt-2">
            <label for="form-publisher">Publisher</label>
            <select name="bookpublisher" id="" class="form-control forminputs" id="form-publisher">
                @foreach ($publishers as $publisher)
                    <option value="{{$publisher->publisher_id}}">{{$publisher->publisher_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label for="form-author">Author</label>
            <select name="bookauthor" id="" class="form-control forminputs" id="form-author">
                @foreach ($authors as $author)
                    <option value="{{$author->author_id}}">{{$author->author_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label for="form-cover">Cover</label>
            <input type="file" name="photocover" id="form-cover" class="form-control">
        </div>
        @error("photocover")
            {{$message}}<br>
        @enderror
        @if(session('message'))
            <small>{{session('message')}}</small><br>
        @endif
        <button class="btn" id="btnAdd">Add</button>
    </form>
</div>
@endsection
