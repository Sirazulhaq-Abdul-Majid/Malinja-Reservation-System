<?php 
// Include database connection settings
include('../../php/dbconn.php');

include ("../../php/session.php");
session_start();

if (!isset($_SESSION['username'])) {
        header('Location: ../');
		} 
	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="sidenav">

<div class="container">
  <br>
  <h3>Administrator Data</h3>
	<?php
		$query = "SELECT * FROM user  WHERE level_id = 1 ORDER BY name";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
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
		
		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="#">Detail</a></td>
       </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']=="M"){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="#">Detail</a></td>
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
    </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<br>
  <br>
  <br>
	<?php
		$query = "SELECT * FROM user  WHERE level_id != 1 ORDER BY name";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
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
		
		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['user_id'];?>">Detail</a></td>
      </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['name'])); ?></td>   
        <td>&nbsp;<?php if ($row['gender']==1){ echo 'Male'; }else{ echo 'Female'; } ?></td>
        <td><?php echo ucwords (strtolower($row['address'])); ?></td>
        <td>&nbsp;<?php echo $row['telephone']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['user_id'];?>">Detail</a></td>
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
    </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>





   
   
</div>
   
</body>
</html> 







