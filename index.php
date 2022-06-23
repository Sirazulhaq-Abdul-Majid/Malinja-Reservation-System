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
</head>

<body>
    <?php
    include ("php/session.php");
    session_start();
    session_unset();
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-11 mx-auto login-container">
                <div class="row">
                   
                    <div class="col-lg-5 col-md-6 no-padding">
                        <div class="login-box">
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
                               <p> <input type="checkbox"> Remember Me</p>
                               <p><a class="vgh" href="">Forget Password?</a></p>
                            </div>

                             <div class="login-row btnroo row no-margin">
                               <button class="btn btn-primary btn-sm" name="login"> Sign In</button>
                               
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