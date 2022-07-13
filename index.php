<?php
include ("php/session.php");
session_start();
session_unset();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page I-Kolej</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<style>
  html, body { height: 100%; }
  body {
    background:radial-gradient(ellipse at center, rgba(255,254,234,1) 0%, rgba(255,254,234,1) 35%, #B7E8EB 100%);
    overflow: hidden;
  }

  .ocean { 
    height: 5%;
    width:100%;
    position:absolute;
    bottom:0;
    left:0;
    background: #015871;
  }

  .wave {
    background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x; 
    position: absolute;
    top: -198px;
    width: 6400px;
    height: 198px;
    animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) infinite;
    transform: translate3d(0, 0, 0);
  }

  .wave:nth-of-type(2) {
    top: -175px;
    animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
    opacity: 1;
  }

  @keyframes wave {
    0% {
      margin-left: 0;
    }
    100% {
      margin-left: -1600px;
    }
  }

  @keyframes swell {
    0%, 100% {
      transform: translate3d(0,-25px,0);
    }
    50% {
      transform: translate3d(0,5px,0);
    }
  }
</style>

</head>

<body>


   
    
    <div class="container-fluid">
    <div class="ocean"style="position:absolute;z-index:-1">
          <div class="wave"></div>
          <div class="wave"></div>
        </div>
        <div class="container">
            <div class="col-xl-10 col-lg-11 mx-auto login-container">
                <div class="row">
       
                    
                
                    <div class="col-lg-5 col-md-6 no-padding" >
                        <div class="login-box"  style="position:absolute;z-index:1">
                            <h5>Welcome Back!</h5>
                            <form method="POST" action="php/process.php">
                            <div class="login-row row no-margin">
                                
                                <label for=""><i class="fas fa-envelope"></i> Username</label>
                                <input type="text" class="form-control form-control-sm"name="username" id="username">
                            </div>

                             <div class="login-row row no-margin">
                                <label for=""><i class="fas fa-unlock-alt" ></i> Password</label>
                                <input type="password" class="form-control form-control-sm"name="password" id="password">
                            </div>
                            
                             <div class="login-row row forrr no-margin">
                                <text style="color:white">asdfasdfsadfsdafdsfa<br>asdf</text>
                            </div>

                             <div class="login-row btnroo row no-margin">
                               <button class="btn btn-primary btn-sm" name="login" > Sign In</button>
                               
                            </div>
                            </form>
                            <form method="POST" action="php/process.php">
                            <div class="login-row btnroo row no-margin">
                            <button class="btn btn-success  btn-sm" name='account'> Create Account</button>
</div>
                            </form>
                            <div class="login-row donroo row no-margin">
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-lg-7 col-md-6 img-box">
                        <img src="assets/images/sideimg.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</html>