<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="js/readonly.js"></script>
</head>
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
<form method="POST">
address
<textarea readonly='readonly' id='address' name='address' rows=5><?php echo $_SESSION['address']?></textarea>
telephone
<input type='text' readonly='readonly' id='telephone' name='telephone' value=<?php echo $_SESSION['telephone']?>>
email
<input type='text' readonly='readonly' id='email' name='email' value=<?php echo $_SESSION['email']?> size=40>
depic
<input type='text' readonly='readonly' id='dependantic' name='dependantic' value=<?php echo $_SESSION['dependantic']?> size=40>
password
<input type='text' readonly='readonly' id='pass' name='pass' value=<?php echo $_SESSION['pass']?> size=40>
dep name
<textarea readonly='readonly' id='depname' name='depname' row=1><?php echo $_SESSION['depname']?></textarea>
dep telephone
<input type='text' readonly='readonly' id='deptele' name='deptele' value=<?php echo $_SESSION['deptelephone']?> size=40>
dep address
<textarea readonly='readonly' id='depadd' name='depadd'  rows=5><?php echo $_SESSION['depaddress']?></textarea>
dep email
<input type='text' readonly='readonly' id='depemail' name='depemail' value=<?php echo $_SESSION['depemail']?> size=40>
dep relationship
<input type='text' readonly='readonly' id='deprel' name='deprel' value=<?php echo $_SESSION['deprelationship']?> size=40>
<input type='submit' id='allsave' name='allsave'>
</form>
<!--ni untuk edit and save address-->
address
<input type='submit' value='edit' id='editaddress' name='editaddress' onclick="addressedit();" > 
<input type='submit' value='save' id='saveaddress' name='editaddress' hidden='hidden' onclick="addresssave();"> 

<!--ni untuk edit and save phone-->
telephone
<input type='submit' value='edit' id='edittelephone' name='edittelephone' onclick="phoneedit();" > 
<input type='submit' value='save' id='savetelephone' name='edittelephone' hidden='hidden' onclick="phonesave();"> 

<!--ni untuk edit and save email-->
email
<input type='submit' value='edit' id='editemail' name='editemail' onclick="emailedit();" > 
<input type='submit' value='save' id='saveemail' name='editemail' hidden='hidden' onclick="emailsave();"> 

<!--ni untuk edit and save dependantic-->
depic
<input type='submit' value='edit' id='editdependantic' name='editdependantic' onclick="dependanticedit();" > 
<input type='submit' value='save' id='savedependantic' name='savedependantic' hidden='hidden' onclick="dependanticsave();"> 

<!--ni untuk edit and save password-->
pass
<input type='submit' value='edit' id='editpass' name='editpass' onclick="passedit();" > 
<input type='submit' value='save' id='savepass' name='savepass' hidden='hidden' onclick="passsave();"> 

<!--ni untuk edit and save depname-->
depname
<input type='submit' value='edit' id='editdepname' name='editdepname' onclick="depnameedit();" > 
<input type='submit' value='save' id='savedepname' name='savedepname' hidden='hidden' onclick="depnamesave();"> 

<!--ni untuk edit and save deptele-->
deptele
<input type='submit' value='edit' id='editdeptele' name='editdeptele' onclick="depteleedit();" > 
<input type='submit' value='save' id='savedeptele' name='savedeptele' hidden='hidden' onclick="deptelesave();"> 

<!--ni untuk edit and save depadd-->
depadd
<input type='submit' value='edit' id='editdepadd' name='editdepadd' onclick="depaddedit();" > 
<input type='submit' value='save' id='savedepadd' name='savedepadd' hidden='hidden' onclick="depaddsave();"> 

<!--ni untuk edit and save depemail-->
depemail
<input type='submit' value='edit' id='editdepemail' name='editdepemail' onclick="depemailedit();" > 
<input type='submit' value='save' id='savedepemail' name='savedepemail' hidden='hidden' onclick="depemailsave();"> 

<!--ni untuk edit and save deprelationship-->
deprelationship
<input type='submit' value='edit' id='editdeprel' name='editdeprel' onclick="depreledit();" > 
<input type='submit' value='save' id='savedeprel' name='savedeprel' hidden='hidden' onclick="deprelsave();"> 
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
        header("Refresh:1");
        header("location".$_SERVER['PHP_SELF']);
        //redirect("user_view_detail.php",$userid);
    }
?>
</html>