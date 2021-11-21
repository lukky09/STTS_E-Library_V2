@extends('layout.template')
@section('body')
<style>
    .login-back{
        height: 100vh;
        background-size: cover;
        background-position: center;
    }
    .btn{
        font-size: 20px;
        width: 100%;
    }}
</style>
<div class="container m-0 text-light" style="height: 100vh; width: 100vw;">
    <div class="row" style="width: auto">
        <div class="col-xl-8 login-back" style="background-image: url({{URL::asset('webres/jaredd-craig-HH4WBGNyltc-unsplash.jpg')}})">
            {{-- <img src="{{URL::asset('webres/jaredd-craig-HH4WBGNyltc-unsplash.jpg')}}" alt="" style="height: 100vh"> --}}
        </div>
        <div class="col-xl-3 mt-auto mb-auto" style="">


        </div>
    </div>
</div>
{{-- <div class="container-xl card bg-dark text-light">
<h1>Login</h1>
</div> --}}
@endsection
