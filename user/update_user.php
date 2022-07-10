<html>
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


.wrapper{
  width:100%;
  box-shadow:0 0 5px rgba(0,0,0..10);
}

table tr td{
  font-size: 17px;
    padding: 2px 10px;
    color: #00000;
   

}

.footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
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
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#digital-marketing-section">Request</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#feedback-section">Profile</a>
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:black">Logout</div></a></button>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>

<?php 
    ob_start();
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
    
              if (!isset($_SESSION['username'])) {
                header('Location: ../');
              }
?>

<?php
    $id=$_SESSION['user_id'];
    $query="SELECT * FROM user WHERE user_id='$id'";
    $result=mysqli_query($dbconn,$query);
    $numrow = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $_SESSION['address']=$row['address'];
    $_SESSION['telephone']=$row['telephone'];
    $_SESSION['email']=$row['email'];
    $_SESSION['pass']=$row['password'];
    $_SESSION['dependantic']=$row['dependant_ic'];
    $depic=$_SESSION['dependantic'];
    $query1="SELECT * FROM dependant WHERE dependant_ic='$depic'";
    $result1=mysqli_query($dbconn,$query1);
    $numrow1 = mysqli_num_rows($result1);
    $row1 = mysqli_fetch_array($result1);
    $_SESSION['depname']=$row1['name'];
    $_SESSION['deptelephone']=$row1['telephone'];
    $_SESSION['depaddress']=$row1['address'];
    $_SESSION['depemail']=$row1['email'];
    $_SESSION['deprelationship']=$row1['relationship'];
?>
<div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:360px;">
      <h1 class="font-weight-semibold">UPDATE PROFILE</h1>
      </div>

<form method="POST" style="margin-left:400px;">

<table class ="table table-bordered" width="60%" border="0" style="margin-left:-200px;  height:420px; background-color:#faf8f8; " >
<tr>
<td colspan="2" style="text-align:left;"><h5><b>USER</b></h5></td>
</tr>
<tr>
<th width="20%">Address </th>
<td width="40%"><input type='text' id='address' name='address' value="<?php echo $_SESSION['address']?>" size=60></td>
</tr>
<tr>
<th width="20%">Telephone</th>
<td width="40%"><input type='text'  id='telephone' name='telephone' value="<?php echo $_SESSION['telephone']?>"size=30></td>
<tr>
<th width="20%">Email</th>
<td width="40%"><input type='text'  id='email' name='email' value="<?php echo $_SESSION['email']?>" size=30></td>
</tr>
<tr>
<th width="20%">Password</th>
<td width="40%"><input type='text'  id='pass' name='pass' value="<?php echo $_SESSION['pass']?>" size=30></td>
</tr>
<tr>
<td colspan="2" style="text-align:left;"><h5><b>DEPENDANT</b></h5></td>
</tr>
<tr>
<th width="20%">Name</th>
<td width="40%"><input type='text' id='depname' name='depname' value="<?php echo $_SESSION['depname']?>" size=40></td>
</tr>
<tr>
<th width="20%">IC</th>
<td width="40%"><input type='text'  id='dependantic' name='dependantic' value="<?php echo $_SESSION['dependantic']?>" size=30></td>
</tr>
<tr>
<th width="20%">Telephone</th>
<td width="40%"><input type='text' ' id='deptele' name='deptele' value="<?php echo $_SESSION['deptelephone']?> "size=30></td>
</tr>
<tr>
<th width="20%">Address</th>
<td width="40%"><input type='text' id='depadd' name='depadd' value="<?php echo $_SESSION['depaddress']?>"" size=60></td>
</tr>
<tr>
<th width="20%">Email</th>
<td width="40%"><input type='text'  id='depemail' name='depemail' value="<?php echo $_SESSION['depemail']?> "size=30></td>
</tr>
<tr>
<th width="20%">Relationship</th>
<td width="40%"><input type='text'  id='deprel' name='deprel' value="<?php echo $_SESSION['deprelationship']?>" size=30></td>
</tr>
<tr>
<td colspan="2" style="text-align:left; " ><input type='submit' value='Save' id='allsave' name='allsave' style="padding:0.6em 2em; border-radius:8px; color:#00000; background-color:#90ee90; border:0; cursor:pointer; "></td>
</tr>
</table>

</form>

<?php 
    if(isset($_POST['allsave'])){
        $address=$_POST['address'];
        $phone=$_POST['telephone'];
        $email=$_POST['email'];
        $dependantic=$_POST['dependantic'];
        $olddependantic=$_SESSION['dependantic'];
        $pass=$_POST['pass'];
        $depname=$_POST['depname'];
        $deptele=$_POST['deptele'];
        $depadd=$_POST['depadd'];
        $depemail=$_POST['depemail'];
        $deprel=$_POST['deprel'];
        $userid=$_SESSION['user_id'];
        $query0="UPDATE dependant SET dependant_ic='$dependantic',name='$depname',telephone='$deptele',address='$depadd',email='$depemail',relationship='$deprel' WHERE dependant_ic='$olddependantic'";
        $result0=mysqli_query($dbconn, $query0) or die ("Error: " . mysqli_error($dbconn));
        $query="UPDATE user SET address='$address', telephone='$phone', email='$email', password='$pass' WHERE user_id='$userid'";
        $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
        //header("Refresh:1");
        header("Location:user_view_detail.php");
        //header('Location: '.$_SERVER['PHP_SELF']);
        //die;
        //redirect("user_view_detail.php",$userid);
    }
?>
 <footer >
      <p class="text-center text-muted pt-4">Copyright © 2022 Malinja Room Reservation System.</p>
    </footer>

<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
<script src="vendors/aos/js/aos.js"></script>
<script src="js/landingpage.js"></script>
</body>
</html>

