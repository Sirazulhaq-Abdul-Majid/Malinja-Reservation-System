<?php 
session_start();
	$con=mysqli_connect('localhost','root','','malinjadb') or die(mysqli_error($con));

		$address=$_POST['address'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$name=$_POST['name'];
		$uid=$_GET['userid'];

		$query="UPDATE user SET name='$name',gender='$gender',email='$email',telephone='$phone',address='$address',password='$pass' WHERE user_id='$uid'";
		$result = mysqli_query($con, $query) or die ("Error: " . mysqli_error($dbconn));

		mysqli_query($con,$query);
		mysqli_close($con);
		header("Location:users.php");
        
        
    
?>