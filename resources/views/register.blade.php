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
    }
    .nav-link{
        color: white;
        width: 100%;
    }
    .nav-link:hover{
        color: lightgrey;
    }
    .nav .nav-item .nav-link.active{
        background:green;
    }


</style>
<div class="container m-0 text-light" style="height: 100vh; width: 100vw;">
    <div class="row" style="width: auto">
        <div class="col-xl-8 login-back" style="background-image: url({{URL::asset('webres/jaredd-craig-HH4WBGNyltc-unsplash.jpg')}})">
            {{-- <img src="{{URL::asset('webres/jaredd-craig-HH4WBGNyltc-unsplash.jpg')}}" alt="" style="height: 100vh"> --}}
        </div>
        <div class="col-xl-3 mt-auto mb-auto ms-5" style="">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item col-sm" role="presentation">
                    <button class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">User</button>
                </li>
                <li class="nav-item col-sm" role="presentation">
                    <button class="nav-link" id="pills-supplier-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Publisher</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                </li> --}}
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-user-tab">
                    {{-- register user --}}
                    <form action="" method="POST" class="form">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inpFirstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="inpFirstname" name="firstname">
                            </div>
                            <div class="col">
                                <label for="inpLastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="inpLastname" name="lastname">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pass" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="cpass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpass" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companyphone" class="form-label invisible">Phone Number</label>
                                <input type="text" class="form-control invisible" id="hidden">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light mb-3 rounded-pill">Sign Up</button>
                        <span class="d-flex justify-content-center container-xl mb-3">Already signed up?</span>
                        <a href="{{url('/login')}}" class="btn btn-outline-light mb-3 rounded-pill">Sign In</a>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-supplier-tab">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companyname" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="companyname" aria-describedby="emailHelp" name="companyname">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companyphone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="companyphone" aria-describedby="emailHelp" name="companyphone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companyemail" class="form-label">Company Email</label>
                                <input type="email" class="form-control" id="companyemail" aria-describedby="emailHelp" name="companyemail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companypass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="companypass" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companycpass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="companycpass" name="password_confirmation">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light mb-3 rounded-pill">Sign Up</button>
                        <span class="d-flex justify-content-center container-xl mb-3">Already signed up?</span>
                        <a href="{{url('/login')}}" class="btn btn-outline-light mb-3 rounded-pill">Sign In</a>
                    </form>
                </div>
                {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div> --}}
            </div>
        </div>
    </div>
</div>


@endsection
