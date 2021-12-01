@extends('supplier.main')

@section('main')
<style>
    body{
        background-color: #3E1F47;

    }
    .addform{
        color: white;
        width: 100vw;
        margin-left: auto;
        margin-right: auto;
    }
    .addform form{
        width: 50vw;
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;
        border-radius: 20px;
        border: 5px solid white;
        padding: 20px;
        /* background-color: black; */
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
</style>
<div class="addform d-flex" data-scene>
    <form action="" method="POST" class="" style="">
        <h1>Add Book</h1>
        <div class="row mt-2">
            <label for="form-title">Title</label>
            <input type="text" name="booktitle" placeholder="title" class="form-control forminputs" id="form-title">
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
        </div>
        <div class="row mt-2">
            <label for="form-publisher">Publisher</label>
            <select name="bookpublisher" id="" class="form-control forminputs" id="form-publisher">
                @foreach ($publishers as $publisher)
                    <option value="{{$publisher->publisher_id}}">{{$publisher->publisher_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row mt-2">
            <label for="form-author">Author</label>
            <select name="bookauthor" id="" class="form-control forminputs" id="form-author">
                @foreach ($authors as $author)
                    <option value="{{$author->author_id}}">{{$author->author_name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn">Add</button>
    </form>
</div>
@endsection
