<style>
footer{
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  margin-top: 80px;
  /* background: #333; */
}

footer .container{
  position: relative;
  width: 100%;
  background: #3586ff;
  min-height: 100px;
  padding: 20px 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

footer .container .social_icon,
footer .container .menu{
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 0;
}

footer .container .social_icon li,
footer .container .menu li{
  list-style: none;
}

footer .container .social_icon li a{
  font-size: 2em;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
}

footer .container .social_icon li a:hover{
  transform: translateY(-10px);
}

footer .container .menu li a{
  font-size: 1.2em;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  text-decoration: none;
  opacity: 0.75;
}

footer .container .menu li a:hover{
  opacity: 1;
}

footer .container p{
  color: #fff;
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;
  font-size: 1.1em;
}

/* wave */
footer .container .wave{
  position: absolute;
  top: -100px;
  left: 0;
  width: 100%;
  height: 100px;
  background: url({{ URL::asset('rss/images/wave.png') }});
  background-size: 1000px 100px;
}

footer .container .wave#wave1{
  z-index: 1000;
  opacity: 1;
  bottom: 0;
  animation: animateWave_01 4s linear infinite;
}

footer .container .wave#wave2{
  z-index: 999;
  opacity: 0.5;
  bottom: 10px;
  animation: animateWave_02 4s linear infinite;
}

footer .container .wave#wave3{
  z-index: 1000;
  opacity: 0.2;
  bottom: 15px;
  animation: animateWave_01 3s linear infinite;
}

footer .container .wave#wave4{
  z-index: 999;
  opacity: 0.7;
  bottom: 20px;
  animation: animateWave_02 3s linear infinite;
}

@keyframes animateWave_01 {
  0%{background-position-x: 1000px;}
  100%{background-position-x: 0px;}
}

@keyframes animateWave_02 {
  0%{background-position-x: 0px;}
  100%{background-position-x: 1000px;}
}

/* end-footer */
</style>

<footer data-scene>
    <div class="container" data-aos="zoom-out-up" data-aos-offset="0">
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li><a href="#">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Team</a></li>
        </ul>
        <p>@ 2021 FPW | All Rights Reserved</p>
    </div>
</footer>
