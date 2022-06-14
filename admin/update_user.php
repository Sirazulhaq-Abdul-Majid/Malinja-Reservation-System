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

<form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
    <table width="80%" border="0" align="center">
      <tr>
        <td width="16%">Name</td>  
        <td width="84%"><input type="text" name="name" size="50" value="<?php echo ucwords (strtolower($row['name'])); ?>" /></td>  
      </tr>  
      <tr> 
        <td width="16%">Gender</td>
        <td>
        <input name="gender" type="radio" value="1" <?php if($row['gender']==1) { echo 'checked'; } ?> />Men
		<input name="gender" type="radio" value="2" <?php if($row['gender']==2) { echo 'checked'; } ?>/>Women
        </td>
      </tr>
	  <tr>
        <td width="16%">Email</td>
        <td><input type="text" name="email" size="50" value="<?php echo $row['email']; ?>"/></td>
      </tr>
	  <tr>
        <td width="16%">Phone No</td>
        <td><input type="text" name="phone" size="50" value="<?php echo $row['telephone']; ?>"/></td>
      </tr>
      <tr>
        <td width="16%">Address</td>
        <td><textarea name="address" cols="47" rows="3"><?php echo ucwords (strtolower($row['address'])); ?></textarea></td>
      </tr>
      <tr>
        <td width="16%">Username</td>
        <td><?php echo $row['username']; ?>
        	<input type="hidden" name="username" size="50" value="<?php echo $row['username']; ?>" /></td> 
      </tr>
      <tr>
        <td width="16%">Password</td>
        <td><input type="password" name="password" size="50" value="<?php echo $row['password']; ?>" /></td> 
      </tr>
	  <tr>
      	<td>Picture</td>
        <td>
          <input type="file" name="file" id="file" />
          <img src="../images/<?php echo $row['picture'];?>" width="130" height="130">
	    </td>
      </tr> 
	  
      <tr> 
        <td colspan="2"><input type="hidden" name="user" value=" <?php echo $user; ?> " />
        <input type="hidden" name="pic" value="<?php echo $row['picture'];?>" /></td>
      </tr>	  
	  
      <tr> 
        <td colspan="2"><input type="submit" name="submit" value=" Save " />
        <input type="button" name="cancel" value=" Cancel " onclick="location.href='index.php'" />
        <input type="button" name="cancel" value=" Delete User " onclick="location.href='delete_user.php?user_id=<?php echo $row['user_id'];?>' "/></td></tr> 
    </table>
</form>

</fieldset>
 