<style>
    /* preloader */
    .wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 200px;
        height: 200px;
        background-color: transparent;
        border: none;
        -webkit-user-select: none;
    }

    .wrapper .box-wrap {
        width: 70%;
        height: 70%;
        margin-left: 15%;
        margin-top: 15%;
        position: relative;
        transform: rotate(-45deg);
    }

    .wrapper .box-wrap .box {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(135, 0, 0, 0.6);
        background: linear-gradient(to right,
                #4d194d,
                #006466,
                #3e1f47,
                #065a60,
                #d8f3dc,
                #0b525b,
                #272640,
                #74c69d,
                #212f45,
                #1b3a4b);
        background-position: 0% 50%;
        background-size: 1000% 1000%;
        overflow: hidden;
        visibility: hidden;
    }

    .wrapper .box-wrap .box.one {
        -webkit-animation: moveGradient 15s infinite, oneMove 3.5s infinite;
        animation: moveGradient 15s infinite, oneMove 3.5s infinite;
    }

    .wrapper .box-wrap .box.two {
        -webkit-animation: moveGradient 15s infinite, twoMove 3.5s 0.15s infinite;
        animation: moveGradient 15s infinite, twoMove 3.5s 0.15s infinite;
    }

    .wrapper .box-wrap .box.three {
        -webkit-animation: moveGradient 15s infinite, threeMove 3.5s 0.3s infinite;
        animation: moveGradient 15s infinite, threeMove 3.5s 0.3s infinite;
    }

    .wrapper .box-wrap .box.four {
        -webkit-animation: moveGradient 15s infinite, fourMove 3.5s 0.575s infinite;
        animation: moveGradient 15s infinite, fourMove 3.5s 0.575s infinite;
    }

    .wrapper .box-wrap .box.five {
        -webkit-animation: moveGradient 15s infinite, fiveMove 3.5s 0.725s infinite;
        animation: moveGradient 15s infinite, fiveMove 3.5s 0.725s infinite;
    }

    .wrapper .box-wrap .box.six {
        -webkit-animation: moveGradient 15s infinite, sixMove 3.5s 0.875s infinite;
        animation: moveGradient 15s infinite, sixMove 3.5s 0.875s infinite;
    }

    @-webkit-keyframes moveGradient {
        to {
            background-position: 100% 50%;
        }
    }

    @keyframes moveGradient {
        to {
            background-position: 100% 50%;
        }
    }

    @keyframes oneMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    @keyframes twoMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    @keyframes threeMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(0% 70% 70% 0 round 5%);
            clip-path: inset(0% 70% 70% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(0% 35% 70% round 5%);
            clip-path: inset(0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(35% 70% 35% 0 round 5%);
            clip-path: inset(35% 70% 35% 0 round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    @keyframes fourMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    @keyframes fiveMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    @keyframes sixMove {
        0% {
            visibility: visible;
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        14.2857% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        28.5714% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        42.8571% {
            -webkit-clip-path: inset(70% 0 0 70% round 5%);
            clip-path: inset(70% 0 0 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        57.1428% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        71.4285% {
            -webkit-clip-path: inset(35% 0% 35% 70% round 5%);
            clip-path: inset(35% 0% 35% 70% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        85.7142% {
            -webkit-clip-path: inset(35% round 5%);
            clip-path: inset(35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }

        100% {
            -webkit-clip-path: inset(70% 35% 0% 35% round 5%);
            clip-path: inset(70% 35% 0% 35% round 5%);
            -webkit-animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
            animation-timing-function: cubic-bezier(0.86, 0, 0.07, 1);
        }
    }

    /* end-preloader */
</style>

<div id="wrapper">
    <div class="box-wrap">
        <div class="box one"></div>
        <div class="box two"></div>
        <div class="box three"></div>
        <div class="box four"></div>
        <div class="box five"></div>
        <div class="box six"></div>
    </div>
</div>
