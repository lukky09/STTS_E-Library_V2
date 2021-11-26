<style>
    header {
        top: 0;
        left: 0;
        width: 100%;
        padding: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 999;
        position: fixed;
        display: -webkit-box;
        display: -ms-flexbox;

        -webkit-box-align: center;
        -ms-flex-align: center;

        height: 20px;
    }

    header ul {
        padding-left: 0;
    }

    header ul li {
        list-style: none;
        display: inline-block;
        margin: 0 20px;
    }

    header ul li a {
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        font-weight: 700;
    }

    header ul li a:hover {
        color: #081c15;
    }

    .header.active {
        background: #05636d;
        -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .header .navbar #nav-close {
        font-size: 2rem;
        cursor: pointer;
        color: #081c15;
        display: none;
    }

    .header #menu-btn {
        display: none;
    }

    .header .left-menu {
        width: 60%;
    }

    .header .right-menu {
        float: right;
        margin-right: 80px;
    }

    /* login form */
    .header .login-form {
        position: absolute;
        top: 120%;
        right: 5rem;
        width: 12rem;
        border-radius: 1rem;
        background: #fff;
        -webkit-box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        padding: 2rem;
        display: none;
    }

    .header .login-form.active {
        display: block;
        -webkit-animation: fadeIn 0.4s linear;
        animation: fadeIn 0.4s linear;
    }

    .header .login-form h3 {
        color: #130f40;
        font-size: 1rem;
        padding-bottom: 0.5rem;
    }

    .header .login-form .box {
        width: 90%;
        height: 30px;
        border-bottom: 0.2rem solid #130f40;
        border-width: 0.1rem;
        border-radius: 20px;
        padding: 10px;
        font-size: 1rem;
        color: #130f40;
        text-transform: none;
        margin: 1rem 0;
    }

    .header .login-form .remember {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 0;
    }

    .header .login-form .remember label {
        font-size: 1rem;
        cursor: pointer;
        color: #05636d;
    }

    .header .login-form .btn {
        width: 100%;
        text-align: center;
        margin: 1.5rem 0;
        color: #05636d;
    }

    .header .login-form .btn:hover {
        background: #073b54;
        color: #fff;
    }

    .header .login-form .links {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin-left: 35%;
        text-decoration: none;
    }

    .header .login-form .links a {
        font-size: 1rem;
        color: #073b54;
    }

    .header .login-form .links a:hover {
        color: #05636d;
        text-decoration: underline;
    }

    /* end login */
    /* end navbar */

    /* search */
    .search-form {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        z-index: 10000;
        -webkit-transform: translateY(-110%);
        transform: translateY(-110%);
    }

    .search-form.active {
        -webkit-transform: translateY(0%);
        transform: translateY(0%);
    }

    .search-form #close-search {
        position: absolute;
        top: 1.5rem;
        right: 2.5rem;
        cursor: pointer;
        color: #fff;
        font-size: 2rem;
    }

    .search-form #close-search:hover {
        color: #05636d;
    }

    .search-form form {
        width: 50%;
        margin: 0 2rem;
        padding-bottom: 2rem;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .search-form form input {
        width: 100%;
        font-size: 1.5rem;
        color: #fff;
        text-transform: none;
        background: none;
        padding: 1rem 2rem;
        margin-right: 2rem;
        border-radius: 20px;
    }

    .search-form form input::-webkit-input-placeholder {
        color: #aaa;
    }

    .search-form form input:-ms-input-placeholder {
        color: #aaa;
    }

    .search-form form input::-ms-input-placeholder {
        color: #aaa;
    }

    .search-form form input::placeholder {
        color: #aaa;
    }

    .search-form form label {
        font-size: 2rem;
        cursor: pointer;
        color: #fff;
    }

    .search-form form label:hover {
        color: #05636d;
    }

    /* end search */
    /* end header */

</style>

<!-- header -->
<header class="header">
    <div class="logo">
        <img src="{{ url( URL::asset('rss/images/logo.png')) }}">
    </div>
    <div class="left-menu navbar">
        <ul>
            <li>
                <div id="nav-close" class="fas fa-times"></div>
            </li>
            <li><a href="/">Home</a></li>
            <li><a href="/product">Products</a></li>
        </ul>
    </div>
    <div class="right-menu icons">
        <ul>
            <li>
                <div id="menu-btn" class="fas fa-bars"></div>
            </li>
            <li><a href="#" class="fas fa-shopping-cart"></a></li>
            <li><a href="#" class="far fa-user" id="login-btn"></i></a></li>
            <li><a>
                    <div id="search-btn" class="fas fa-search"></div>
                </a></li>
        </ul>
    </div>
    <form action="" class="login-form">
        <h3>sign in</h3>
        <input type="email" name="" placeholder="enter your email" class="box">
        <input type="password" name="" placeholder="enter your password" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <div class="links">
            <a href="#">sign up</a>
        </div>
    </form>
</header>

<div class="search-form">
    <div id="close-search" class="fas fa-times"></div>
    <form action="">
        <input type="search" name="" placeholder="Search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</div>

