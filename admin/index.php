<?php
include ("../php/session.php");
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>I-Kolej Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
      
        <img src="images/logohoriz.png" alt="" style="width:150px;">
      
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
            <a class="nav-link" href="index.php">Requests <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#digital-marketing-section">Rooms</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#feedback-section">Report</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:white">Logout</div></a></button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    <div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:225px;">
      <h1 class="font-weight-semibold">I-Kolej</h1>
</div>  
      <h6 class="font-weight-normal text-muted pb-3"></h6>
      <div style='margin-top:50px;'>
      <?php

include('../php/dbconn.php');

          include ("../php/session.php");

          if (!isset($_SESSION['username'])) {
            header('Location: ../');
		      } 
            $query="SELECT * FROM room ORDER BY room_id,availability ";
            $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
?>
<?php 
$numrow = mysqli_num_rows($result);
$aavail=0;
$bavail=0;
$b="";
$a="";
for ($a=0;$a<$numrow;$a++){
    $row = mysqli_fetch_array($result);
    $block=substr($row['room_id'],0,1);
    if ($block==="B" && $row['availability']==1){
      $bavail++;
    }
    else if ($block==="A" && $row['availability']==1){
      $aavail++;
    }
}
if ($aavail>=1){
  $a="A";
}
else if($aavail<=0){
  $a="";
}
if ($bavail>=1){
  $b="B";
}
else if ($bavail<=0){
  $b="";
}
?>
<?php
$acolor='red';
$bcolor='red';
?>
<select id=block name=block>
  <?php if($a==="A"):?>
    <option value="A">A</option>
    <?php 
    $acolor='green'?>
  <?php endif ?>
  <?php if($b==="B"):?>
    <option value="B">B</option>
    <?php 
    $bcolor='green'?>
  <?php endif ?>
</select>
<div style='width:50px; height:50px; background-color: <?php echo $acolor;?>;'>
  </div>
  <br>
  <div style='width:50px; height:50px; background-color: <?php echo $bcolor;?>;'>
  </div>
      </div>
      <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
      <img src="images/image.png" alt="" class="img-fluid" style="margin-top:-120px;width:400px; margin-left:800px;">
</div>
    </div>
  </div>
  
        </div>
      </div>
    </div> 
  </div>
  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>

</body>
</html>