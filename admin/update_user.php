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

.save{
    border-radius: 8px;
  color:#000000;
  background-color:#90EE90;
  width: 100px;
  
}

.cancel{
border-radius: 8px;  
  color:#00000;
  background-color:#FF1C1C;
  width: 100px; 
}

.delete{
border-radius: 8px;  
  color:#00000;
  background-color:#ff0000;
  width: 100px;
  
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
            <a class="nav-link" href="take3iwanttodie.php">Rooms</a>  
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

<div class="container">
    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:360px;">
      <h1 class="font-weight-semibold">UPDATE USER PROFILE</h1>
      </div>

      <?php 
// Include database connection settings
include('../php/dbconn.php');
include ("../php/session.php");
session_start();
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
        header('Location: ../');
		} 
$user_id = $_GET['user_id'];	
?>

<?php
	$query = "SELECT * FROM user WHERE user_id='$user_id'";
  
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$row = mysqli_fetch_array($result);
?>
<fieldset>

<form name="edit_user" method="POST" action="db_update_user.php?userid=<?php echo $user_id;?>">
<table class="table table-bordered" border="0" style="margin-left:320px;  width:500px; height:420px; background-color:#faf8f8; " >
      <tr>
        <td width="16%"><b>Name</b></td>  
        <td width="84%"><input type="text" name="name" size="50" value="<?php echo ucwords (strtolower($row['name'])); ?>" /></td>  
      </tr>  
      <tr> 
        <td width="16%"><b>Gender</b></td>
        <td>
        <input name="gender" type="radio" value="1" <?php if($row['gender']==1) { echo 'checked'; } ?> />Men
		<input name="gender" type="radio" value="2" <?php if($row['gender']==2) { echo 'checked'; } ?>/>Women
        </td>
      </tr>
	  <tr>
        <td width="16%"><b>Email</b></td>
        <td><input type="text" name="email" size="50" value="<?php echo $row['email']; ?>"/></td>
      </tr>
	  <tr>
        <td width="16%"><b>Phone No</b></td>
        <td><input type="text" name="phone" size="50" value="<?php echo $row['telephone']; ?>"/></td>
      </tr>
      <tr>
        <td width="16%"><b>Address</b></td>
        <td><textarea name="address" cols="47" rows="3"><?php echo $row['address']; ?></textarea></td>
      </tr>
      <tr>
        <td width="16%"><b>Username</b></td>
        <td><?php echo $row['username']; ?>
        	<input type="hidden" name="username" size="50" value="<?php echo $row['username']; ?>" /></td> 
      </tr>
      <tr>
        <td width="16%"><b>Password</b></td>
        <td><input type="password" name="password" size="50" value="<?php echo $row['password']; ?>" /></td> 
      </tr>	  
      <tr style="text-align:center;"> 
        <td colspan="2"><input class="save" type="submit" name="submit" value=" Save " />
        <input class="cancel" type="button" name="cancel" value=" Cancel " onclick="location.href='users.php'" />
        <input class="delete" type="button" name="cancel" value=" Delete User " onclick="location.href='delete_user.php?user_id=<?php echo $row['user_id'];?>' "/></td></tr> 
        <tr> 
        <td colspan="2"><input type="hidden" name="user" value=" <?php echo $user; ?> " />
      </tr>	  
    </table>
</form>

</fieldset>
 
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