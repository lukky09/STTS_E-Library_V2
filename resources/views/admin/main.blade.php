<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- scroll -->
    <link rel="stylesheet" href="https://unpkg.com/rolly.js@0.2.1/css/style.css">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:wght@300;400;500;700&display=swap');

    * {
        font-family: 'Ubuntu', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --blue: #0b2243;
        --green: #05636d;
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;
    }

    body {
        min-height: 100vh;
        overflow-x: hidden;
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

    .app{
        position: relative;
        width: 100%;
    }

    .container_main {
        position: absolute;
        width: calc(100% - 250px);
        left: 250px;
        min-height: 100vh;
        background: var(--white);
        transition: 0.5s;
    }

    .container_main.active {
        width: calc(100% - 80px);
        left: 80px;
    }

</style>

<body>
    <!-- prelaoder -->
    <div class="preloader">@include('preloader')</div>

    <main class="app">
        <div class="container_header">@include('admin.header')</div>
        <div class="container_main">
            <div class="container_topbar">@include('admin.topbar')</div>
            <div class="main_container">@yield('main')</div>
        </div>
        <div class="container_footer">@include('admin.footer')</div>
    </main>

    <!-- scroll -->
    <script src="https://unpkg.com/rolly.js@0.2.1/dist/rolly.min.js"></script>

    <!-- animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- ion-icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
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

    <script>
        // menu toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.container_main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
</body>

</html>
