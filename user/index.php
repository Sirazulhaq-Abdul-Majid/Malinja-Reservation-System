<?php 
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="js/readonly.js"></script>

  <title>i-Kolej</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

<style>
  body{
    background-image: url(images/bg3.png);
    background-size: cover;
}

.bg {
  width: 100%;
  height: 400px;
  background: src("images/uitm.png") no-repeat center center/cover;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  justify-content: flex-end;
  padding-bottom: 50px;
  margin-bottom: 20px;
}

.showcase h2, .showcase p {
  margin-bottom: 10px;
}

.showcase .btn {
  margin-top: 20px;
}

/* Home cards */
.home-cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 20px;
  margin-bottom: 40px;
}

.home-cards img {
  width: 100%;
  margin-bottom: 20px;
}

.home-cards h3 {
  margin-bottom: 5px;
}

.home-cards a {
  display: inline-block;
  padding-top: 10px;
  color: #0067b8;
  text-transform: uppercase;
  font-weight: bold;
}

.home-cards a:hover i {
  margin-left: 10px;
}

/* Xbox */
.xbox {
  width: 100%;
  height: 350px;
  background: url("https://thumbs.dreamstime.com/b/university-building-vector-illustration-cartoon-d-outside-front-view-high-elementary-school-college-academy-campus-186210510.jpg") no-repeat center center/cover;
  margin-bottom: 20px;
}

.xbox .content {
  width: 40%;
  padding: 50px 0 0 30px;
}

.xbox p, .carbon p {
  margin: 10px 0 20px;
}


</style>

</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar" style="font-family: Poppins,sans-serif;">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">

      <a href="index.php">
        <img src="images/logohoriz.png" alt="" style="width:150px;"></a>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="images/Group2.svg" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index2.php">Request</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-view-history.php">History</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_view_detail.php">Profile</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:white">Logout</div></a></button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>


  <div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:360px;">
      <h1 class="font-weight-semibold">WELCOME TO i-KOLEJ</h1><br>
      </div>
      <header >
      <img src="images/uitm.png" class="bg">
      
      
      
    </header>
    
    <center><h2>EVENTS</h2></center>

    <!-- Home cards 1 -->
    <section class="home-cards">
      <div>
        <img src="images/data.jpeg" alt="">
        
      </div>
      <div>
        <img src="images/funtasy.jpeg" alt="" />
        
        
      </div>
      <div>
        <img src="images/keusahawanan.jpeg" alt="" />
      
        
      </div>
      <div>
        <img src="images/aidil.png" alt="" />
        
        
      </div>
    </section>

    <!-- pic large 2 -->
    <section class="xbox">
      <div class="content">
        <h2>Claim Limited Lanyard</h2>
        <p>Register college room through i-kolej system now
          and will get to choose one out of 4 limited lanyard.</p>
          
      </div>
    </section>

    <!-- Home cards 2 -->
			<section class="home-cards">
				<div>
					<img src="images/layard1.jpeg" alt="" />
					<h3>Royal Batik</h3>
					
					
				</div>
				<div>
					<img src="images/layard2.jpeg" alt="" />
					<h3>Exquisite Batik</h3>
					
					
				</div>
				<div>
					<img src="images/layard3.jpeg" alt="" />
					<h3>Raven Batik</h3>
					
					
				</div>
				<div>
					<img src="images/layard4.jpeg" alt="" />
					<h3>Majestic</h3>
				
					
				</div>
      </section>
      



<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
<script src="vendors/aos/js/aos.js"></script>
<script src="js/landingpage.js"></script>
</body>
</html>