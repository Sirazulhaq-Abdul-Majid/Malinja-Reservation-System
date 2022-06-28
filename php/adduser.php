<?php 
// Include database connection settings
session_start();
include('dbconn.php');


if(isset($_POST['signup'])){
	/* capture values from HTML form */
	$username = $_POST['username'];
	$password = $_POST['password'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];
    $dependant_ic=$_POST['dependant_ic'];
    $dependant_name=$_POST['dependant_name'];
    $dependant_telephone=$_POST['dependant_telephone'];
    $dependant_adress=$_POST['dependant_address'];
    $dependant_email=$_POST['dependant_email'];
    $dependant_relationship=$_POST['dependant_relationship'];

}


$query0="SELECT * FROM user WHERE username='$username'";
$result0=mysqli_query($dbconn,$query0);
$numrow0 = mysqli_num_rows($result0);
if($numrow0>0){
    header("Location: ../signup.php?error=Account Already Exist");
}
else if(empty($username)||empty($password)||empty($name)||empty($gender)||empty($address)||empty($telephone)||empty($email)||empty($dependant_ic)||empty($dependant_name)||empty($dependant_telephone)||empty($dependant_adress)||empty($dependant_email)||empty($dependant_relationship)){
    echo "<script>window.location.href='../signup.php?error=Fill in all fields';</script>";
    exit;
}

    $query1="INSERT INTO dependant(dependant_ic,name,telephone,address,email,relationship) value ('$dependant_ic','$dependant_name','$dependant_telephone','$dependant_adress', '$dependant_email','$dependant_relationship')";
	$query = "INSERT INTO user ( username , password,name, gender, address,telephone,email,dependant_ic,level_id) values ('$username','$password','$name','$gender','$address','$telephone','$email','$dependant_ic',2)";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
    mysqli_close($dbconn);
    header("Location:../signup.php?success=Account Created");
?>