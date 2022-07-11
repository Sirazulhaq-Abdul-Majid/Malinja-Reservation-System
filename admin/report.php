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
  <link rel="stylesheet" href="css/bookBox.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

table  {
    width: 100%; 
    border: 1px solid;       
}

td{
    background-color: #D6EEEE;
    padding: 5px;
    text-align:center;
    border: 1px solid;
}

tr{
    background-color: #ADD8E6;
    padding: 5px;
    text-align:center;
    border: 1px solid;
}

th{
    background-color: #ADD8E6;
    padding: 5px;
    text-align:center;
    border: 1px solid;
}


</style>

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
            <a class="nav-link" href="report.php">Report</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:white">Logout</div></a></button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header><br>

  <div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:250px; width:100%;">
      <h1 class="font-weight-semibold">AVAILABLITY AND HISTORY</h1>
      </div><br><br>

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
$q="SELECT * FROM room";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);?>

<div class="col-lg-11">
<div class="card shadow-sm">
<div class="card-header bg-transparent border-10">
<h3 class="mb-0"><i class="fa fa-th-large pr-1"></i>MALINJA A</h3>
</div>

<table border=1 style="">

    <tr><td>Floor</td><td colspan=25 style="text-align: center;">Room</td></tr>
    <tr>
        <td rowspan=2>1</td><?php for($a=1;$a<26;$a++){
            echo "<td>";
            echo $a;
            echo "</td>";
            }?>
    </tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">2</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">3</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">4</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>

</table>
  </div>
  <br>

<div class="col-lg-13">
<div class="card shadow-sm">
<div class="card-header bg-transparent border-0">
<h3 class="mb-0"><i class="fa fa-th-large pr-1"></i>MALINJA B</h3>
</div>
<table border=1>

    <tr style="padding: 5px;"><td style="padding: 5px;">Floor</td><td colspan=25 style="text-align: center;">Room</td></tr>
    <tr>
        <td rowspan=2>1</td><?php for($a=1;$a<26;$a++){
            echo "<td>";
            echo $a;
            echo "</td>";
            }?>
    </tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">2</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">3</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr style="padding: 5px;"><td rowspan = 2 style="padding: 5px;">4</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr style="padding: 5px;"><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>

</table>
  </div>
  </div>
<br><br><br>

<div class="col-lg-13">
<div class="card shadow-sm">
<div class="card-header bg-transparent border-0">
<h3 class="mb-0"><i class="fa fa-history pr-1"></i>HISTORY</h3>
</div>
<div class="card-body pt-0">
<?php

include('../php/dbconn.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../');
} 
ob_start();
$q="SELECT * FROM reserve WHERE status='-1' or status='1'";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);
echo "<form method='POST'><table><tr><th>Reserve ID </th><th>Timestamp</th><th>User ID</th><th>Bed ID</th><th>Status</th><th>Action</th></tr>";
for ($a=0;$a<$numrow;$a++):
    $row=mysqli_fetch_array($result);?>
    <tr>
        <td><?php echo $row['reserve_id']?></td>
        <td><?php echo $row['timestamp']?></td>
        <td><?php echo $row['user_id']?></td>
        <td><?php echo $row['bed_id']?></td>
        <td><?php echo $row['status']?></td>
        
    
    <td><button class="aaaa" style="border-radius: 8px; color:#00000; background-color:#e56b6b; width: 100px;" value=<?php echo $row['reserve_id']?> name='delete'>Delete</button></td>
    </tr>
<?php endfor ?>
</table>
</form>
<?php 
if (isset($_POST['delete'])){
    $rid=$_POST['delete'];
    $query="DELETE FROM reserve WHERE reserve_id='$rid'";
    $resulto=mysqli_query($dbconn,$query);
    header("Location:admin-view-history.php");
}
?>
</div>
</div>

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