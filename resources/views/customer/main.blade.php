<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- scroll -->
    <link rel="stylesheet" href="https://unpkg.com/rolly.js@0.2.1/css/style.css">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- galery-filter -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />

    {{-- toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;1,100;1,300&display=swap");

    * {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        outline: none;
    }

    html {
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 4rem;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    }

    h1 {
        font-size: 70px;
    }

    h2 {
        font-size: 36px;
    }

    h3 {
        font-size: 26px;
    }

    .container {
        max-width: 1166px;
        margin: 0 auto;
    }

    /* scrollbar */

    html::-webkit-scrollbar {
        width: 1rem;
    }

    html::-webkit-scrollbar-track {
        background: #fff;
    }

    html::-webkit-scrollbar-thumb {
        background: #06626d;
        border-radius: 5rem;
    }

    /* end-scrollbar */

    /* btn */
    .btn {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.8rem 2.8rem;
        border-radius: 5rem;
        border-top-left-radius: 0;
        border: 0.2rem solid #073b54;
        cursor: pointer;
        background: none;
        color: #fff;
        font-size: 1rem;
        overflow: hidden;
        z-index: 0;
        position: relative;
    }

    .btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: #05636d;
        z-index: -1;
        -webkit-transition: 0.2s linear;
        transition: 0.2s linear;
        -webkit-clip-path: circle(0% at 0% 5%);
        clip-path: circle(0% at 0% 5%);
    }

    .btn:hover::before {
        -webkit-clip-path: circle(100%);
        clip-path: circle(100%);
    }

    .btn:hover {
        color: #fff;
    }

    @-webkit-keyframes fadeIn {
        0% {
            -webkit-transform: translateY(3rem);
            transform: translateY(3rem);
            opacity: 0;
        }
    }

    @keyframes fadeIn {
        0% {
            -webkit-transform: translateY(3rem);
            transform: translateY(3rem);
            opacity: 0;
        }
    }

    /* end btn */

</style>

<body>
    <!-- prelaoder -->
    <div class="loader">@include('preloader')</div>

    <main class="app">
        <div class="container_header">@include('customer.header')</div>
        <div class="container_main">@yield('main')</div>
        <div class="container_footer">@include('customer.footer')</div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- preloader -->
    <script>
        var loader = document.getElementById('wrapper');
        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>

    <!-- login -->
    <script>
        let loginForm = document.querySelector('.header .login-form');

        document.querySelector('#login-btn').onclick = () => {
            loginForm.classList.toggle('active');
            navbar.classList.remove('active');
        }
    </script>

    <!-- navbar&search -->
    <script>
        let navbar = document.querySelector('.header .navbar');

        document.querySelector('#menu-btn').onclick = () => {
            navbar.classList.add('active');
        }

        document.querySelector('#nav-close').onclick = () => {
            navbar.classList.remove('active');
        }

        let searchForm = document.querySelector('.search-form');

        document.querySelector('#search-btn').onclick = () => {
            searchForm.classList.add('active');
        }

        document.querySelector('#close-search').onclick = () => {
            searchForm.classList.remove('active');
        }

        window.onscroll = () => {
            navbar.classList.remove('active');

            if (window.scrollY > 0) {
                document.querySelector('.header').classList.add('active');
            } else {
                document.querySelector('.header').classList.remove('active');
            }
        };

        window.onload = () => {
            if (window.scrollY > 0) {
                document.querySelector('.header').classList.add('active');
            } else {
                document.querySelector('.header').classList.remove('active');
            }
        };
    </script>

    <!-- scroll -->
    <script src="https://unpkg.com/rolly.js@0.2.1/dist/rolly.min.js"></script>

    <!-- slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        $('.sec3-slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 2,
            speed: 1500
        });

        const r = rolly({
            view: document.querySelector('.app'),
            native: true,
            // other options
        });
        r.init();

        AOS.init({
            duration: 1500 //global duration
        });
    </script>

    {{-- toast --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        $(function() {
            // Display a warning toast, with no title
            toastr.warning('Warning Message')

            toastr.info('Info Message');

            // Display a success toast, with a title
            toastr.success('Success', 'Message')

            // Display an error toast, with a title
            toastr.error('Error message')

            // // Immediately remove current toasts without using animation
            // toastr.remove()

            // // Remove current toasts using animation
            // toastr.clear()

            // // Override global options
            // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {
            //     timeOut: 5000
            // })
        });
    </script> --}}
</body>

</html>
