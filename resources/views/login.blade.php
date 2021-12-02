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
        <div class="col-xl-3 mt-auto mb-auto ms-5" style="">
            <h2>Log In</h2>
            <form action="/loginUser" method="POST" class="form">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email/Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="userlogin">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-light mb-3 rounded-pill">Sign In</button>
                <span class="d-flex justify-content-center container-xl mb-3">No account?</span>
                <a href="{{url('/register')}}" class="btn btn-outline-light mb-3 rounded-pill">Sign Up</a>
            </form>

        </div>
    </div>
</div>
{{-- <div class="container-xl card bg-dark text-light">
<h1>Login</h1>
</div> --}}
@endsection
