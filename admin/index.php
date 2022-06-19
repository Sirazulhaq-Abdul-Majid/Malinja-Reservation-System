<?php
include ("../php/session.php");
include('../php/dbconn.php');
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
$bl0avail=0;
$bl1avail=0;
$bl2avail=0;
$bl3avail=0;
$al0avail=0;
$al1avail=0;
$al2avail=0;
$al3avail=0;
$a0=array();
$a0=array_fill(1,25,"red");
$a1=array();
$a1=array_fill(1,25,"red");
$a2=array();
$a2=array_fill(1,25,"red");
$a3=array();
$a3=array_fill(1,25,"red");
$b0=array();
$b0=array_fill(1,25,"red");
$b1=array();
$b1=array_fill(1,25,"red");
$b2=array();
$b2=array_fill(1,25,"red");
$b3=array();
$b3=array_fill(1,25,"red");
$b="";
$a="";
for ($a=0;$a<$numrow;$a++){
    $row = mysqli_fetch_array($result);
    $block=substr($row['room_id'],0,1);
    $floor=substr($row['room_id'],1,1);
    $room=substr($row['room_id'],2,2);
    if ($block==="B"){  
      if($floor==0 && $row['availability']==1){
        $bl0avail++;
        $bavail++;
        $temp=ltrim($room,"0");
        $b0[$temp]='green';
      }
      else if($floor==1 && $row['availability']==1){
        $bl1avail++;
        $bavail++;
        $temp=ltrim($room,"0");
        $b1[$temp]='green';
      }
      else if($floor==2 && $row['availability']==1){
        $bl2avail++;
        $bavail++;
        $temp=ltrim($room,"0");
        $b2[$temp]='green';
      }
      else if($floor==3 && $row['availability']==1){
        $bl3avail++;
        $bavail++;
        $temp=ltrim($room,"0");
        $b3[$temp]='green';
      }
    }
    else if ($block==="A"){
      if($floor===0 && $row['availability']==1){
        $al0avail++;
        $aavail++;
        $temp=ltrim($room,"0");
        $a0[$temp]='green';
      }
      else if($floor===1 && $row['availability']==1){
        $al1avail++;
        $aavail++;
        $temp=ltrim($room,"0");
        $a1[$temp]='green';
      }
      else if($floor===2 && $row['availability']==1){
        $al2avail++;
        $aavail++;
        $temp=ltrim($room,"0");
        $a2[$temp]='green';
      }
      else if($floor===3 && $row['availability']==1){
        $al3avail++;
        $aavail++;
        $temp=ltrim($room,"0");
        $a3[$temp]='green';
      }
    }
}
//print_r($b1);
//echo $bl0avail, $bl1avail, $bl2avail, $bl3avail;
//echo $al0avail, $al1avail, $al2avail, $al3avail;
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
$al0color='red';
$al1color='red';
$al2color='red';
$al3color='red';
$bl0color='red';
$bl1color='red';
$bl2color='red';
$bl3color='red';
$a0click=0;
$a1click=0;
$a2click=0;
$a3click=0;
$b0click=0;
$b1click=0;
$b2click=0;
$b3click=0;
$bdisp=0;
$adisp=0;
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
  <?php if($bl0avail>0):?>
    <option value="B0">0</option>
    <?php 
    $bl0color='green'?>
  <?php endif ?>
  <?php if($bl1avail>0):?>
    <option value="B1">0</option>
    <?php 
    $bl1color='green'?>
  <?php endif ?>
  <?php if($bl2avail>0):?>
    <option value="B2">0</option>
    <?php 
    $bl2color='green'?>
  <?php endif ?>
  <?php if($bl3avail>0):?>
    <option value="B3">0</option>
    <?php 
    $bl3color='green'?>
  <?php endif ?>
  <?php if($al0avail>0):?>
    <option value="a0">0</option>
    <?php 
    $al0color='green'?>
  <?php endif ?>
  <?php if($al1avail>0):?>
    <option value="a1">0</option>
    <?php 
    $al1color='green'?>
  <?php endif ?>
  <?php if($al2avail>0):?>
    <option value="a2">0</option>
    <?php 
    $al2color='green'?>
  <?php endif ?>
  <?php if($al3avail>0):?>
    <option value="a3">0</option>
    <?php 
    $al3color='green'?>
  <?php endif ?>
</select>
<form method='POST'>
<input type='submit' style='width:50px; height:50px; background-color: <?php echo $acolor;?>;border:none;' value="A" name='aselect'>
  </input>
  <br>
  <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bcolor;?>;border:none;' value="B" name='bselect'>
  </input>
  </form>
  <?php if (isset($_POST['bselect']) && $bavail>0):?>
  <div>
  <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
  </div>
  <?php endif ?>
  <?php if (isset($_POST['aselect']) && $aavail>0):?>
  <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $al0color;?>;border:none;' value='level 1' name='a1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $al1color;?>;border:none;' value='level 2' name='a2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $al2color;?>;border:none;' value='level 3' name='a3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $al3color;?>;border:none;' value='level 4' name='a4select'></input>
    </form>
  </div>
  <?php endif ?>
  <?php if (isset($_POST['b1select'])&& $bl0avail>0):?>
    <?php $b0click=1;?>
    
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
    <form method='POST'>
      <?php for($a=1;$a<26;$a++):?>
      <input type='submit' style='width:50px; height:50px; background-color: <?php echo $b0[$a];?>;border:none;' value=<?php echo $a ?> name='room'></input>
      <?php endfor ?>
      </form>
    </div>
  <?php endif ?>
  <?php if (isset($_POST['room'])):
    $roomid="B0".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result1);?>
    <form method="POST">
    <?php for ($a=0;$a<$numrow;$a++):
      $row = mysqli_fetch_array($result1);?>
      <?php if ($row['availability']==1):?>
        <input type='submit' style='width:50px; height:50px; background-color: green;border:none;' value=<?php echo $a+1 ?> name='bed'></input>
        <?php endif ?>
      <?php if ($row['availability']==0): ?>
        <input type='submit' style='width:50px; height:50px; background-color: red;border:none;' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
    <?php endfor ?>
      </form>
  <?php endif ?>
  <?php if (isset($_POST['bed'])):
      $id= $_SESSION['user_id'];
      $roomid="B0".str_pad($_POST['bed'],2,0,STR_PAD_LEFT);
      $queryins="INSERT INTO reserve (user_id,room_id) VALUES ('$id','$roomid')";
      $result2 = mysqli_query($dbconn, $queryins) or die ("Error: " . mysqli_error($dbconn));
      ?>
    <?php endif ?>
  <?php if (isset($_POST['b2select'])&& $bl1avail>0):?>
    <?php $b1click=1; ?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
    <form method='POST' >
      <?php for($a=1;$a<26;$a++):?>
      <input type='submit' style='width:50px; height:50px; background-color: <?php echo $b1[$a];?>;border:none;' value=<?php echo $a ?> name='room'></input>
      <?php endfor ?>
      </form>
    </div>
  <?php endif ?>
  <?php if (isset($_POST['room'])):
    $roomid="B1".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result1);?>
    <form method="POST" action="../php/showrooms.php">
    <?php for ($a=0;$a<$numrow;$a++):
      $row = mysqli_fetch_array($result1);?>
      <?php if ($row['availability']==1):?>
        <input type='submit' style='width:50px; height:50px; background-color: green;border:none;' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
      <?php if ($row['availability']==0): ?>
        <input type='submit' style='width:50px; height:50px; background-color: red;border:none;' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
    <?php endfor ?>
    </form>
  <?php endif ?>
  <?php if (isset($_POST['b3select'])&& $bl2avail>0):?>
    <?php $b2click=1; ?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
    <form method='POST'>
      <?php for($a=1;$a<26;$a++):?>
      <input type='submit' style='width:50px; height:50px; background-color: <?php echo $b2[$a];?>;border:none;' value=<?php echo $a ?> name='room'></input>
      <?php endfor ?>
      </form>
    </div>
  <?php endif ?>
  <?php if (isset($_POST['room'])):
    $roomid="B2".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result1);?>
    <?php for ($a=0;$a<$numrow;$a++):
      $row = mysqli_fetch_array($result1);?>
      <?php if ($row['availability']==1):?>
        <input type='submit' style='width:50px; height:50px; background-color: green' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
      <?php if ($row['availability']==0): ?>
        <input type='submit' style='width:50px; height:50px; background-color: red; border:none;' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
    <?php endfor ?>
  <?php endif ?>
  <?php if (isset($_POST['b4select'])&& $bl3avail>0):?>
    <?php $b3click=1; ?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
    <form method='POST'>
      <?php for($a=1;$a<26;$a++):?>
      <input type='submit' style='width:50px; height:50px; background-color: <?php echo $b3[$a];?>;border:none;' value=<?php echo $a ?> name='room'></input>
      <?php endfor ?>
      </form>
      
    </div>
  <?php endif ?>
  <?php if (isset($_POST['room'])):
    $roomid="B3".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result1);?>
    <?php for ($a=0;$a<$numrow;$a++):
      $row = mysqli_fetch_array($result1);?>
      <?php if ($row['availability']==1):?>
        <input type='submit' style='width:50px; height:50px; background-color: green;border:none;' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
      <?php if ($row['availability']==0): ?>
        <input type='submit' style='width:50px; height:50px; background-color: red' value=<?php echo $a+1 ?> name='bed'></input>
      <?php endif ?>
    <?php endfor ?>
  <?php endif ?>
  <?php if (isset($_POST['b4select'])&& $bl3avail==0):?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
  <?php endif ?>
  <?php if (isset($_POST['b3select'])&& $bl2avail==0):?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
  <?php endif ?>
  <?php if (isset($_POST['b2select'])&& $bl1avail==0):?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
  <?php endif ?>
  <?php if (isset($_POST['b1select'])&& $bl0avail==0):?>
    <div>
    <form method='POST'>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl0color;?>;border:none;' value='level 1' name='b1select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl1color;?>;border:none;' value='level 2' name='b2select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl2color;?>;border:none;' value='level 3' name='b3select'></input>
    <input type='submit' style='width:50px; height:50px; background-color: <?php echo $bl3color;?>;border:none;' value='level 4' name='b4select'></input>
  </form>
  <?php endif ?>
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