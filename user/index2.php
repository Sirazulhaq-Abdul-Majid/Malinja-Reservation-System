<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="js/readonly.js"></script>
    <script src="js/buton.js"></script>

  <title>i-Kolej</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="css/stylebook.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

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
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index2.php">Request</a>  
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
  
  <div class="main" id='main'>
  <?php 
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?>
<?php
include('../php/dbconn.php');
include ("../php/session.php");
$uid=$_SESSION['user_id'];
$q="SELECT * FROM reserve WHERE user_id='$uid' ORDER BY timestamp";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);?>
<div class="history">
<table border=1>

    <tr><td>reserve id</td><td>timestamp</td><td>bed</td><td>status</td></tr>
    <?php for ($a=0;$a<$numrow;$a++){
        $row=mysqli_fetch_array($result);
        echo '<tr>';
        echo '<td>';
        echo $row['reserve_id'];
        echo '</td>';
        echo '<td>';
        echo $row['timestamp'];
        echo '</td>';
        echo '<td>';
        echo $row['bed_id'];
        echo '</td>';
        echo '<td>';
        if($row['status']==1){
          echo 'Approved';
        }
        else if ($row['status']==-1){
          echo 'Rejected';
        }
        else{
            echo 'Pending';
        }
        
        echo '</td>';
        echo '</tr>';
    }?>

</table>
</div>
     

    <?php
include ("../php/session.php");
include('../php/dbconn.php');
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?>
<?php
ob_start();
include('../php/dbconn.php');

          include ("../php/session.php");

          if (!isset($_SESSION['username'])) {
            header('Location: ../');
		      } 
            $query="SELECT * FROM room ORDER BY room_id,availability ";
            $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            $blockavail=array();
            $blockavail=array_fill(1,2,'red');
            $afloors=array();
            $afloors=array_fill(1,4,"red");
            $bfloors=array();
            $bfloors=array_fill(1,4,"red");
            $a1=array();
            $a1=array_fill(1,25,"red");
            $a2=array();
            $a2=array_fill(1,25,"red");
            $a3=array();
            $a3=array_fill(1,25,"red");
            $a4=array();
            $a4=array_fill(1,25,"red");
            $b1=array();
            $b1=array_fill(1,25,"red");
            $b2=array();
            $b2=array_fill(1,25,"red");
            $b3=array();
            $b3=array_fill(1,25,"red");
            $b4=array();
            $b4=array_fill(1,25,"red");
            for($a=0;$a<$numrow;$a++){
                $row = mysqli_fetch_array($result);
                $block=substr($row['room_id'],0,1);
                $floor=substr($row['room_id'],1,1);
                $room=substr($row['room_id'],2,2);
                if($block=="A"){
                    if($floor==0 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[1]='green';
                        $temp=ltrim($room,"0");
                        $a1[$temp]='green';
                    }
                    else if($floor==1 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[2]='green';
                        $temp=ltrim($room,"0");
                        $a2[$temp]='green';
                    }
                    else if($floor==2 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[3]='green';
                        $temp=ltrim($room,"0");
                        $a3[$temp]='green';
                    }
                    else if($floor==3 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[4]='green';
                        $temp=ltrim($room,"0");
                        $a4[$temp]='green';
                    }
                }
                else if($block=="B"){
                    if($floor==0 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[1]='green';
                        $temp=ltrim($room,"0");
                        $b1[$temp]='green';
                    }
                    else if($floor==1 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[2]='green';
                        $temp=ltrim($room,"0");
                        $b2[$temp]='green';
                    }
                    else if($floor==2 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[3]='green';
                        $temp=ltrim($room,"0");
                        $b3[$temp]='green';
                    }
                    else if($floor==3 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[4]='green';
                        $temp=ltrim($room,"0");
                        $b4[$temp]='green';
                    }
                }
            }
//print_r($blockavail);   
//print_r($a1)
//print_r($a2);
//print_r($a3);
//print_r($a4);
//print_r($b1);
//print_r($b2);
//print_r($b3);
//print_r($b4); 
$_SESSION['blockavail']=$blockavail;
$_SESSION['a1']=$a1;
$_SESSION['a2']=$a2;
$_SESSION['a3']=$a3;
$_SESSION['a4']=$a4;
$_SESSION['b1']=$b1;
$_SESSION['b2']=$b2;
$_SESSION['b3']=$b3;
$_SESSION['b4']=$b4;
$_SESSION['afloor']=$afloors;
$_SESSION['bfloor']=$bfloors;
//print_r($_SESSION['blockavail']);
if(isset($_SESSION['warn'])):?>
  <div class="error">
  request limit reached
  </div>

<?php endif ?>
<div id='oya' style='height:100px;'>
</div><div class="w3-animate-opacity" style="width:100%;">
<div class="block-floor-container" id="block-floor-container">


    <div class="block-container">
<form method='POST'>
<?php $blockavail=$_SESSION['blockavail'];
for($a=1;$a<3;$a++):?>
    <?php if($a==1){
        $val="A";
    }
    else{
        $val="B";
    }?>
    <button type="submit" value=<?php echo $val ?> style='background-color:<?php echo $blockavail[$a]?>; width:150px; height: 350px;' id='block' name='block' >Block <?php echo $val?></button>
<?php endfor ?>
</form>
</div>

<?php if(isset($_POST['block'])){
    $_SESSION['block']=$_POST['block'];
    $ba=$_SESSION['blockavail'];
    if ($_SESSION['block']=='A'){
        if ($ba[1]=="red"){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Not Available!")';  
            echo '</script>';  
        }
    }
    if ($_SESSION['block']=='B'){
        if ($ba[2]=="red"){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Not Available!")';  
            echo '</script>';  
        }
    }
    //echo $_SESSION['block'];
    if (isset($_SESSION['roomid'])){
        unset($_SESSION['roomid']); 
    }
    if (isset($_SESSION['room'])){
      unset($_SESSION['room']);
    }
    if(isset($_SESSION['floora'])){
      unset($_SESSION['floora']);
    }
    if(isset($_SESSION['floorb'])){
      unset($_SESSION['floorb']);
    }
    if(isset($_SESSION['floor'])){
      unset($_SESSION['floor']);
    }
    header("Location:index2.php#oya");
}?>

<?php if(isset($_SESSION['block'])):?>
<div class="floor-container">
  <form method='POST'>
  
    <?php if($_SESSION['block']=="A" && array_search("green",$_SESSION['afloor'])):
        $afloor=$_SESSION['afloor'];
        for ($a=1;$a<5;$a++):
            if ($a==1):?>
                <div class="gf">
                <button type="submit" value="GF" style='background-color:<?php echo $afloor[$a]?>; width:100%; height:100%' id='floora' name='floora'>Ground Floor</button>
                </div>
                    <?php continue; ?>
                
            <?php endif ?>
            <div class="f<?php echo $a-1?>">
            <button type="submit" value=<?php echo $a ?> style='background-color:<?php echo $afloor[$a]?>; width:100%; height:100%' id='floora' name='floora'>Floor <?php echo $a-1?></button>
            </div>
        <?php endfor ?>
    <?php endif ?>
    <?php if($_SESSION['block']=="B" && array_search("green",$_SESSION['bfloor'])):
        $bfloor=$_SESSION['bfloor'];
        for ($a=1;$a<5;$a++):
            if ($a==1):?>
                <div class="gf">
                <button type="submit" value="GF" style='background-color:<?php echo $bfloor[$a]?>;width:100%; height:100%' id='floorb' name='floorb'>Ground Floor</button>
                </div>
                <?php continue; ?>
            <?php endif ?>
            <div class="f<?php echo $a-1?>">
            <button type="submit" value=<?php echo $a ?> style='background-color:<?php echo $bfloor[$a]?>; width:100%; height:100%' id='floorb' name='floorb'>Floor <?php echo $a-1?></button>
            </div>
        <?php endfor ?>
    <?php endif ?>
    
    </form>
    </div>
</div>
            </div>

    
<?php endif ?>

<?php if(isset($_POST['floora'])){
    $_SESSION['block']="A";
    $_SESSION['floor']=$_POST['floora'];
    if ($_SESSION['floor']=='GF'){
        $_SESSION['floor']=1;
    }
    if (isset($_SESSION['roomid'])){
        unset($_SESSION['roomid']); 
    }
    //echo $_SESSION['block'];
    $aflo=$_SESSION['afloor'];
    if ($aflo[$_SESSION['floor']]=='red'){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Not Available!")';  
        echo '</script>';  
        header("Location:index2.php#oya");
    }
    else{
        header("Location:index2.php#room-container");
    }
}
else if(isset($_POST['floorb'])){
    $_SESSION['block']="B";
    $_SESSION['floor']=$_POST['floorb'];
    if ($_SESSION['floor']=='GF'){
        $_SESSION['floor']=1;
    }
    if (isset($_SESSION['roomid'])){
        unset($_SESSION['roomid']); 
    }
    //echo $_SESSION['block'];
    //echo $_SESSION['floor'];
    $aflo=$_SESSION['bfloor'];
    if ($aflo[$_SESSION['floor']]=='red'){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Not Available!")';  
        echo '</script>';  
    }
    
    header("Location:index2.php#room-container");
}
?>
<?php if(isset($_SESSION['floor'])):
    $block=$_SESSION['block'];
    $floor=$_SESSION['floor'];
    $afloor=$_SESSION['afloor'];
    $bfloor=$_SESSION['bfloor'];
    if($block==='A'):
        $_SESSION['room']=null;
        if($floor==1 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a1'];
        }
        else if($floor==2 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a2'];
        }
        else if($floor==3 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a3'];
        }
        else if($floor==4 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a4'];
        }
        //print_r($_SESSION['room']);
        ?>
    <?php endif ?>
    <?php if($block==='B'):
        $_SESSION['room']=null;
        if($floor==1 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b1'];
        }
        if($floor==2 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b2'];
        }
        if($floor==3 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b3'];
        }
        if($floor==4 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b4'];
        }
        //print_r($_SESSION['room']);
        ?>
    <?php endif ?>
    <form method='POST'>
    <div class='w3-animate-opacity'>
    <div class="room-container" id='room-container'>
      <div class="building-border">
      <?php
    $room=$_SESSION['room'];

  
    if (isset($room)):
    for($a=1;$a<26;$a++):?>
        <div class="room<?php echo $a?>">
        <?php if ($a<10):?>
        <button type="submit" value=<?php echo $a ?> style='background-color:<?php echo $room[$a]?>; width:100%; height:100%' id='bed' name='bed'><?php echo $block ?><?php echo $floor-1?>0<?php echo $a?></button>
        <?php else:?>
            <button type="submit" value=<?php echo $a ?> style='background-color:<?php echo $room[$a]?>; width:100%; height:100%' id='bed' name='bed'><?php echo $block ?><?php echo $floor-1?><?php echo $a?></button>


        <?php endif ?>
        </div>        
    <?php endfor ?>
    <?php endif ?>
    </form>
<?php endif ?>
      </div>
    </div>
        </div>
    

<?php 
if(isset($_POST['bed'])){
    header("Location:index2.php#bed-container");
    $_SESSION['roomid']=$_POST['bed'];
    $r=$_SESSION['room'];
    if ($r[$_SESSION['roomid']]=='red'){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Not Available!")';  
        echo '</script>';  
    }
}
?>

<?php
if(isset($_SESSION['roomid'])):
    $room=$_SESSION['roomid'];
    $roomid=$_SESSION['block'].($_SESSION['floor']-1).str_pad($room,2,0,STR_PAD_LEFT);
    $_SESSION['room_id']=$roomid;
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $query2="SELECT * FROM room WHERE room_id='$roomid'";
    $result2=mysqli_query($dbconn,$query2) or die ("Error:".mysqli_error($dbconn));
    $row2=mysqli_fetch_array($result2);
    $numrow1 = mysqli_num_rows($result1);
    $_SESSION['numrow']=$numrow1;
    ?>
    
    <div class='w3-animate-opacity'>
    <div class="bed-container" id='bed-container'>
    <form method='POST'>
        <div class="bed-border">

        
        <?php for($a=0;$a<$_SESSION['numrow'];$a++):
            $row1 = mysqli_fetch_array($result1);
            if($row2['total_resident']<6):
                if ($row1['availability']==1):?>
                <div class="bed<?php echo $a+1?>">
                <button type="submit" value=<?php echo $a+1 ?> style='background-color:green; width:100%; height:100%' id='bed' name='final'>Bed <?php echo $a+1 ?></button>
                </div>
                    
                <?php endif ?>
                <?php if ($row1['availability']==0):?>
                    <button type="submit" value=<?php echo $a+1 ?> style='background-color:red; width:100%; height:100%'>Bed <?php echo $a+1?></button>
                <?php endif ?>
            <?php endif ?>
        <?php endfor ?>
        </div>   
    </form>
    </div>
                </div>
                <div style='height:70px'>
    </div>
    
<?php endif ?>

<?php if(isset($_POST['final'])){
    $_SESSION['bed']=$_POST['final'];
    //echo $_SESSION['bed'];
}
?>

<?php 
if(isset($_SESSION['bed'])){
        echo '<script type ="text/JavaScript">';  
        echo 'var x = window.confirm("Do you want to book this room?")';
        echo 'if (x==false){window.open("index2.php","_self")}';  
        echo '</script>';  
$uid=$_SESSION['user_id'];
$querylimit="SELECT user_id FROM reserve WHERE user_id='$uid'";
$resultlimit = mysqli_query($dbconn, $querylimit) or die ("Error: " . mysqli_error($dbconn));
$numrowlimit = mysqli_num_rows($resultlimit);
$_SESSION['limit']=$numrowlimit;
}
?>

<?php 
if (isset($_SESSION['bed'])):
    $username=$_SESSION['username'];
    $bedid=$_SESSION['room_id'].$_SESSION['bed'];
    $userid=$_SESSION['user_id'];
    if($_SESSION['limit']<3){
    
    $query2="INSERT INTO reserve (user_id,bed_id) VALUES ('$userid','$bedid')";
    $result2 = mysqli_query($dbconn, $query2) or die ("Error: " . mysqli_error($dbconn));
    echo '<script type ="text/JavaScript">'; 
    echo 'alert("Reserve Successfully")'; 
    echo '</script>'; 
    }
    else{
        $warn="request limit reached";
    }
    session_unset();
    $_SESSION['username']=$username;
    $_SESSION['user_id']=$userid;
    if (isset($warn)){
        $_SESSION['warn']=$warn;
    } 
    header('Location:index2.php');
    ?>
<?php endif ?>


      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2022 Malinja Room Reservation System.</p>
      </footer>

  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>
</body>
</html>