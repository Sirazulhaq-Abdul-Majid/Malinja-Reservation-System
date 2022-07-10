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
.wrapper{
  width:100%;
  box-shadow:0 0 5px rgba(0,0,0..10);
}

.student-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
}

.student-profile .card p {
    font-size: 16px;
    color: #000;
}

.student-profile .table th,
.student-profile .table td {
    font-size: 14px;
    padding: 5px 10px;
    color: #000;
}

.student-profile .card {
    border-radius: 10px;
}

.edit {
  padding:0.6em 2em;
  border-radius: 8px;
  color:#000000;
  background-color:#ADD8E6;
  font-size:1.1em;
  border:0;
  cursor:pointer;
  margin:1em;
  width: 490px;
}


body{
    
  height: 100%;
  background-image: url(images/bg3.png);
  
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  
}

.wow{
  margin: auto;
  width: 50%;
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
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal" ><a href="../index.php"><div style="color:white">Logout</div></a></button>
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
<div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:450px;">
<h1 class="font-weight-semibold">PROFILE</h1>
</div>
<div class="wrapper" >
<form method="POST" data-aos="fade-right" style="margin-left:60px;   ">


<div class="col-lg-11">
<div class="card shadow-sm">
<div class="card-header bg-transparent border-0">
<h3 class="mb-0"><i class="fa fa-user-circle pr-1"></i>USER</h3>
</div>
<div class="card-body pt-0">
<table class="table table-bordered">
<tr>
<th width="30%">Address</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['address']?><br></td>
</tr>
<tr>
<th width="30%">Telephone</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['telephone']?><br></td>
</tr>
<tr>
<th width="30%">Email</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['email']?><br></td>
</tr>
<tr>
<th width="30%">Password</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['pass']?><br></td>
</tr>
</table>
</div>
</div>


<div class="col-lg-13">
<div class="card shadow-sm">
<div class="card-header bg-transparent border-0">
<h3 class="mb-0"><i class="fa fa-user pr-1"></i>Dependant</h3>
</div>
<div class="card-body pt-0">
<table class="table table-bordered">
<tr>
<th width="30%">Name</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['depname']?><br></td>
</tr>
<tr>
<th width="30%">IC</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['dependantic']?><br></td>
</tr>
<tr>
<th width="30%">Telephone</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['deptelephone']?><br></td>
</tr>
<tr>
<th width="30%">Address</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['depaddress']?><br></td>
</tr>
<tr>
<th width="30%">Email</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['depemail']?><br></td>
</tr>
<tr>
<th width="30%">Relationship</th>
<td width="2%">:</td>
<td><?php echo $_SESSION['deprelationship']?><br></td>
</tr>
</table>
</div>
</div>

<div class="wow">
  <button type="button" class="edit" id = "edit" style="decoration=none;" onclick="window.open('update_user.php?user_id=<?php echo $row['user_id'];?>', '_self')"><a class="one" href="update_user.php?user_id=<?php echo $row['user_id'];?>">Edit</a></button>
</div> 


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

      
     
    
    <footer  >
      <p class="text-center text-muted pt-4">Copyright © 2022 Malinja Room Reservation System.</p>
    </footer>

<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
<script src="vendors/aos/js/aos.js"></script>
<script src="js/landingpage.js"></script>
</body>
</html>