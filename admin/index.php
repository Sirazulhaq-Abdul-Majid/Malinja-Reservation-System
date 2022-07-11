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
 

<style>

body{
    background-image: url(images/bg3.png);
    background-size: cover;
}


.accept{
  border-radius: 8px;
  color:#000000;
  background-color:#90EE90;
  width: 100px;
  
}

.reject{
border-radius: 8px;  
  color:#00000;
  background-color:#e56b6b;
  width: 100px;
  
}

table {
    width: 100%;
    background-color: #CBC3E3;
       
}

table.oya {
    border: 1px solid black;
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
  </header>
  
  <div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:380px;">
      <h1 class="font-weight-semibold">ROOM REQUEST</h1>
      </div><br><br>
      
<?php
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?>
<table class="oya" style=" background-color: #D6EEEE; border: 1px solid black;">
<tr >
                <td width="17%" style="text-align:center;">RESERVE ID</td>
                <td width="28%" style="text-align:center;">TIMESTAMP</td>
                <td width="8%" style="text-align:center;">USER ID</td>
                <td width="12%" style="text-align:center;">BED ID</td>
                <td width="8%" style="text-align:center;">STATUS</td>
                <td width="16%" style="text-align:center;">APPROVAL</td>
</tr>
</table>
<?php
ob_start();
include('../php/dbconn.php');

        include ("../php/session.php");

        if (!isset($_SESSION['username'])) {
            header('Location: ../');
        } 
        $q="SELECT * FROM reserve ORDER BY user_id";
        $result=mysqli_query($dbconn,$q) or die ("Error: " . mysqli_error($dbconn));
        $numrow = mysqli_num_rows($result);
        echo "<form method='POST'>";
        echo "<table border=1>";
        for($a=0;$a<$numrow;$a++):
            $row = mysqli_fetch_array($result);
            if($row['status']==='0'):?>
                <tr >
                <td width="17%" style="text-align: center;"><?php echo $row['reserve_id']?></td>
                <td width="30%" style="text-align: center;"><?php echo $row['timestamp']?></td>
                <td width="10%" style="text-align: center;"><?php echo $row['user_id']?></td>
                <td width="12%" style="text-align: center;"><?php echo $row['bed_id']?></td>
                <td width="8%" style="text-align: center;"><?php echo $row['status']?></td>
                <td width="2%"><button class="accept" value=<?php echo $row['reserve_id']?> id='accept' name='accept'>Accept</button></td>
                <td width="2%"><button class="reject" value=<?php echo $row['reserve_id']?> id='reject' name='reject'>Reject</button></td>
                </tr>
            <?php endif ?>
        <?php endfor?>
        <?php
        echo "</table>";
        echo "</form>";
        
        if(isset($_POST['accept'])){
            $uid=$_SESSION['username'];
            $rid=$_POST['accept'];
            $query0="UPDATE reserve SET status='1' WHERE reserve_id='$rid'";
            $result0=mysqli_query($dbconn,$query0);
            $query="SELECT * FROM reserve JOIN bed ON reserve.bed_id=bed.bed_id WHERE reserve_id='$rid'";
            $result=mysqli_query($dbconn,$query);
            $row=mysqli_fetch_array($result);
            $bid=$row['bed_id'];
            $room_id=$row['room_id'];
            $query2="UPDATE bed SET availability='0' WHERE bed_id='$bid'";
            $result2=mysqli_query($dbconn,$query2);
            $query3="SELECT * FROM bed WHERE room_id='$room_id'";
            $result3=mysqli_query($dbconn,$query3);
            $numrow3=mysqli_num_rows($result3);
            $total=0;
            for($a=0;$a<$numrow3;$a++){
                $row3=mysqli_fetch_array($result3);
                if($row3['availability']==0){
                    $total++;
                }
            }
            if($total==6){
                $query4="UPDATE room SET availability='0' WHERE room_id='$room_id'";
                $result4=mysqli_query($dbconn,$query4);
            }
            $query5="UPDATE room SET total_resident='$total' WHERE room_id='$room_id'";
            $result5=mysqli_query($dbconn,$query5);
            session_unset();
            $_SESSION['username']=$uid;
            $query4="DELETE FROM reserve WHERE bed_id='$bid' AND status=0";
            $result4=mysqli_query($dbconn,$query4);
            header('Location:index.php');
        }
        
        if(isset($_POST['reject'])){
            $uid=$_SESSION['username'];
            $rid=$_POST['reject'];
            $query="UPDATE reserve SET status='-1' WHERE reserve_id='$rid'";
            $resulto=mysqli_query($dbconn,$query);
            echo $query;
            session_unset();
            $_SESSION['username']=$uid;
            header('Location:index.php');
        }
        ?>

<footer style="bottom:0;">
        <p class="text-center text-muted pt-4">Copyright © 2022 Malinja Room Reservation System.</p>
      </footer>

  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>
</body>
</html>