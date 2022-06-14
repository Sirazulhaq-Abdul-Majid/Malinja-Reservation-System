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
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    
  </div>
  <div class="content-wrapper">
    <div class="container">
      <section class="features-overview" id="features-section" >
        <div class="content-header">
        <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right" style="margin-left:225px;">
          <h2>Users View</h2>
</div>
          <h6 class="section-subtitle text-muted">Edit and remove users<br>according to your needs.</h6>
          <input type="text" name="search_text"id="search_text"  style="text-align:center"placeholder="Search by Student Details" />
        </div>
        <div class="d-md-flex justify-content-between">
          <?php 
          // Include database connection settings
          include('../php/dbconn.php');

          include ("../php/session.php");

          if (!isset($_SESSION['username'])) {
            header('Location: ../');
		      } 
	
          ?>
          <?php
		      $query = "SELECT * FROM user ORDER BY level_id,name";
		      $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		      $numrow = mysqli_num_rows($result);
	        ?>
          <tr align="left" bgcolor="#f2f2f2">
            <td>
            <table width="100%" align="left" cellpadding="0" cellspacing="0" style="-moz-border-radius:50px;border-collapse: collapse;">
              <tr align="left" bgcolor="#C0C0C0">
                <th width="3%">No</td>
                <th width="26%">Name</td>       
                <th width="8%">Gender</td>
                <th width="27%">Address</td>
                <th width="9%">Telephone</td>
                <th align="center">Action</td>
          </tr>
          <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
    
		if($row['level_id']==1){
			echo "<tr bgcolor='3399FF'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="update_admin.php?user_id=<?php echo $row['user_id'];?>">Edit</a></td>
       </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#F2F2F2'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="update_user.php?user_id=<?php echo $row['user_id'];?>">Edit</a></td>
      </tr>
	   <?php
	    $color="1";
	   }
	  } 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record avaiable.</font></td>
 			   </tr>'; 
		}
	  ?>

    <tr border=0 ><td></td><td colspan=5><div id='result'></div> </td></tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr><br>
  <script>

$(document).ready(function(){

load_data();

function load_data(query){

$.ajax({

url:"fetch.php",

method:"POST",

data:{query:query},

success:function(data){

$('#result').html(data);
}

});

}

$('#search_text').keyup(function(){

var search = $(this).val();

if(search != ''){

load_data(search);

}else{

load_data();

}

});

});

</script>

            
        </div>
      </section>     
      
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