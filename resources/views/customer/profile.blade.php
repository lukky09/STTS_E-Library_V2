@extends('customer.main')

@section('main')
    <style>
        header {
            background: #05636d;
        }

        .main_content {
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            background: #fff;
        }

        .main_content .wrapper {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 650px;
            display: flex;
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            height: 70%;
        }

        .main_content .wrapper .left {
            width: 35%;
            background: linear-gradient(to right, #01a9ac, #01dbdf);
            padding: 30px 25px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            text-align: center;
            color: #fff;
        }

        .main_content .wrapper .left img {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .main_content .wrapper .left h4 {
            margin-bottom: 10px;
        }

        .main_content .wrapper .left p {
            font-size: 12px;
        }

        .main_content .wrapper .right {
            width: 65%;
            background: #fff;
            padding: 30px 25px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .main_content .wrapper .right .info,
        .main_content .wrapper .right .projects {
            margin-bottom: 25px;
        }

        .main_content .wrapper .right .info h3,
        .main_content .wrapper .right .projects h3 {
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
            color: #353c4e;
            text-transform: uppercase;
            letter-spacing: 5px;
        }

        .main_content .wrapper .right .info_data,
        .main_content .wrapper .right .projects_data {
            display: flex;
            justify-content: space-between;
        }

        .main_content .wrapper .right .info_data .data,
        .main_content .wrapper .right .projects_data .data {
            width: 45%;
        }

        .main_content .wrapper .right .info_data .data h4,
        .main_content .wrapper .right .projects_data .data h4 {
            color: #353c4e;
            margin-bottom: 5px;
        }

        .main_content .wrapper .right .info_data .data p,
        .main_content .wrapper .right .projects_data .data p {
            font-size: 13px;
            margin-bottom: 10px;
            color: #919aa3;
        }

        .main_content .right .btn {
            color: #000;
            height: 40px;
            width: 100px;
            padding: 0;
            font-size: 12px;
            margin-left: 70%;
        }

        .main_content .projects .data input {
            border: none;
            border-bottom: 1px solid #01a9ac;
            width: 120px;
            padding: 3%;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* edit-form */
        .edit-form {
            position: absolute;
            top: 5%;
            left: 35%;
            margin-left: auto;
            margin-right: auto;
            z-index: 999;
            text-align: center;
            padding: 60px 32px;
            width: 370px;
            transform: translate(-50%, -50%);
            background: rgba(0, 100, 102, 0.979);
            box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
            border-radius: 45px;
            display: none;
            visibility: hidden;
        }

        .edit-form.active {
            display: block;
        }

        .edit-form #close-form {
            margin-bottom: 10%;
            margin-left: 90%;
            color: #2BBA9B;
        }

        .edit-form #close-form:hover {
            color: #95D5B2;
        }

        .field {
            position: relative;
            height: 45px;
            width: 100%;
            display: flex;
            background: rgba(39, 38, 64, 0.384);
            border-radius: 45px;
        }

        .field span {
            color: #fff;
            width: 40px;
            line-height: 45px;
        }

        .field input {
            height: 100%;
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 16px;
        }

        .space {
            margin-top: 16px;
        }

        .show {
            position: absolute;
            right: 13px;
            font-size: 13px;
            font-weight: 700;
            color: #222;
            display: none;
            cursor: pointer;
        }

        .pass-key:valid~.show {
            display: block;
        }

    </style>

    <div class="main_content" data-scene>
        @php
            $user = getAuthUser();
        @endphp
        <div class="wrapper">
            <div class="left">
                <img src="{{ url(URL::asset('rss/images/profile.png')) }}" width="100" alt="user">
                <h4>{{ "$user->user_fname $user->user_lname" }}</h4>
                <p>User</p>
            </div>
            <div class="right">
                <div class="info">
                    <h3>Information</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p>{{ $user->user_email }}</p>
                        </div>
                        <div class="data">
                            <h4>Password</h4>
                            <p>******</p>
                        </div>
                    </div>
                    <button type="submit" class="btn" id="edit-btn">Edit Profile</button>
                </div>

                <div class="projects">
                    <form action="{{ url('topup') }}" method="POST">
                        @csrf
                        <h3>Top Up</h3>
                        <div class="projects_data">
                            <div class="data">
                                <h4>Balance</h4>
                                <p>Rp {{ number_format($user->user_saldo, 2, ',', '.') }}</p>
                            </div>
                            <div class="data">
                                <h4>Top Up</h4>
                                <input type="number" min="0" name="topup" value="0">
                            </div>
                        </div>
                        <button type="submit" class="btn">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="edit-form active" id="editting_form" data-scene>
        <div id="close-form" class="fas fa-times"></div>
        <form action="/doEditProfile" method="POST">
            @csrf
            {{-- edit profile --}}
            <h2 style="color: white; margin-bottom: 2vh">Edit Your Profile</h2>
            <div class="field">
                @php
                    $error = false;
                @endphp
                <span class="fa fa-user"></span>
                <input type="text" name="user_fname" placeholder="first name" value="{{ $user->user_fname }}">

            </div>
            @error('user_fname')
                <span style="color: lightsalmon">{{ $message }}</span>
                @php
                    $error = true;
                @endphp
            @enderror
            <div class="field space">
                <span class="fa fa-user"></span>
                <input type="text" name="user_lname" placeholder="last name" value="{{ $user->user_lname }}">

            </div>
            @error('user_lname')
                <span style="color: lightsalmon">{{ $message }}</span>
                @php
                    $error = true;
                @endphp
            @enderror
            <div class="field space">
                <span class="fa fa-envelope"></span>
                <input type="text" name="user_email" placeholder="email" value="{{ $user->user_email }}">

            </div>
            @error('user_email')
                <span style="color: lightsalmon">{{ $message }}</span>

                @php
                    $error = true;
                @endphp
            @enderror
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" class="pass-key" name="user_pass" placeholder="input current password">
                <span class="show">SHOW</span>
            </div>
            @error('user_pass')
                <span style="color: lightsalmon">{{ $message }}</span>
                @php
                    $error = true;
                @endphp
            @enderror
            <br>
            <input type="submit" value="Edit" class="btn">
        </form>
    </div>

    <script>
        const editForm = document.querySelector('#editting_form');

        document.querySelector('#edit-btn').onclick = () => {
            editForm.style.visibility = "visible";
            editForm.classList.add('active');
        }

        document.querySelector('#close-form').onclick = () => {
            editForm.classList.remove('active');
        }

        const pass_field = document.querySelector(".pass-key");
        const showBtn = document.querySelector(".show");
        showBtn.addEventListener("click", function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#fff";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#fff";
            }
        });
    </script>
    @if ($error == true)
        <script>
            window.addEventListener("load", function(e) {
                editForm.style.visibility = "visible";
                // alert('no error');
            });
        </script>

    @endif
@endsection
