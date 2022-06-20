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
            $query="SELECT * FROM room ORDER BY room_id,availability ";
            $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
            $blockavail=array();
            $blockavail=array_fill(1,2,'red');
            $afloors=array();
            $afloors=array_fill(1,4,"red");
            $bfloors=array();
            $bfloors=array_fill(1,4,"red");
            $a1=array();
            $a1=array_fill(1,25,"red");
            $a2=array();
            $a2=array_fill(1,25,"red");
            $a3=array();
            $a3=array_fill(1,25,"red");
            $a4=array();
            $a4=array_fill(1,25,"red");
            $b1=array();
            $b1=array_fill(1,25,"red");
            $b2=array();
            $b2=array_fill(1,25,"red");
            $b3=array();
            $b3=array_fill(1,25,"red");
            $b4=array();
            $b4=array_fill(1,25,"red");
            for($a=0;$a<$numrow;$a++){
                $row = mysqli_fetch_array($result);
                $block=substr($row['room_id'],0,1);
                $floor=substr($row['room_id'],1,1);
                $room=substr($row['room_id'],2,2);
                if($block=="A"){
                    if($floor==0 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[1]='green';
                        $temp=ltrim($room,"0");
                        $a1[$temp]='green';
                    }
                    else if($floor==1 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[2]='green';
                        $temp=ltrim($room,"0");
                        $a2[$temp]='green';
                    }
                    else if($floor==2 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[3]='green';
                        $temp=ltrim($room,"0");
                        $a3[$temp]='green';
                    }
                    else if($floor==3 && $row['availability']==1){
                        $blockavail[1]='green';
                        $afloors[4]='green';
                        $temp=ltrim($room,"0");
                        $a4[$temp]='green';
                    }
                }
                else if($block=="B"){
                    if($floor==0 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[1]='green';
                        $temp=ltrim($room,"0");
                        $b1[$temp]='green';
                    }
                    else if($floor==1 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[2]='green';
                        $temp=ltrim($room,"0");
                        $b2[$temp]='green';
                    }
                    else if($floor==2 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[3]='green';
                        $temp=ltrim($room,"0");
                        $b3[$temp]='green';
                    }
                    else if($floor==3 && $row['availability']==1){
                        $blockavail[2]='green';
                        $bfloors[4]='green';
                        $temp=ltrim($room,"0");
                        $b4[$temp]='green';
                    }
                }
            }
//print_r($blockavail);   
//print_r($a1)
//print_r($a2);
//print_r($a3);
//print_r($a4);
//print_r($b1);
//print_r($b2);
//print_r($b3);
//print_r($b4); 
$_SESSION['blockavail']=$blockavail;
$_SESSION['a1']=$a1;
$_SESSION['a2']=$a2;
$_SESSION['a3']=$a3;
$_SESSION['a4']=$a4;
$_SESSION['b1']=$b1;
$_SESSION['b2']=$b2;
$_SESSION['b3']=$b3;
$_SESSION['b4']=$b4;
$_SESSION['afloor']=$afloors;
$_SESSION['bfloor']=$bfloors;
//print_r($_SESSION['blockavail']);?>
<form method='POST'>
<?php $blockavail=$_SESSION['blockavail'];
for($a=1;$a<3;$a++):?>
    <?php if($a==1){
        $val="A";
    }
    else{
        $val="B";
    }?>
    <input type="submit" value=<?php echo $val ?> style='background-color:<?php echo $blockavail[$a]?>;' id='block' name='block'>
<?php endfor ?>
</form>
<?php if(isset($_POST['block'])){
    $_SESSION['block']=$_POST['block'];
}?>

<?php if(isset($_SESSION['block'])):?>
    <form method='POST'>
    <?php if($_SESSION['block']=="A" && array_search("green",$_SESSION['afloor'])):
        $afloor=$_SESSION['afloor'];
        for ($a=1;$a<5;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $afloor[$a]?>;' id='floora' name='floora'>
        <?php endfor ?>
    <?php endif ?>
    <?php if($_SESSION['block']=="B" && array_search("green",$_SESSION['bfloor'])):
        $bfloor=$_SESSION['bfloor'];
        for ($a=1;$a<5;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $bfloor[$a]?>;' id='floorb' name='floorb'>
        <?php endfor ?>
    <?php endif ?>
    </form>
<?php endif ?>

<?php if(isset($_POST['floora'])){
    $_SESSION['block']="A";
    $_SESSION['floor']=$_POST['floora'];
    //echo $_SESSION['block'];
    //echo $_SESSION['floor'];
}
else if(isset($_POST['floorb'])){
    $_SESSION['block']="B";
    $_SESSION['floor']=$_POST['floorb'];
    //echo $_SESSION['block'];
    //echo $_SESSION['floor'];
}
?>
<?php if(isset($_SESSION['floor'])):
    $block=$_SESSION['block'];
    $floor=$_SESSION['floor'];
    $afloor=$_SESSION['afloor'];
    $bfloor=$_SESSION['bfloor'];
    if($block==='A'):
        $_SESSION['room']=null;
        if($floor==1 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a1'];
        }
        if($floor==2 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a2'];
        }
        if($floor==3 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a3'];
        }
        if($floor==4 && $afloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['a4'];
        }
        //print_r($_SESSION['room']);
        ?>
    <?php endif ?>
    <?php if($block==='B'):
        $_SESSION['room']=null;
        if($floor==1 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b1'];
        }
        if($floor==2 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b2'];
        }
        if($floor==3 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b3'];
        }
        if($floor==4 && $bfloor[$floor]=='green'){
            $_SESSION['room']=$_SESSION['b4'];
        }
        //print_r($_SESSION['room']);
        ?>
    <?php endif ?>
    <form method='POST'>
    <?php
    $room=$_SESSION['room'];
    if (isset($room)):
    for($a=1;$a<26;$a++):?>
        <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $room[$a]?>;' id='bed' name='bed'>
    <?php endfor ?>
    <?php endif ?>
    </form>
<?php endif ?>

<?php 
if(isset($_POST['bed'])){
    $_SESSION['roomid']=$_POST['bed'];
}
?>

<?php
if(isset($_SESSION['roomid'])):
    $room=$_SESSION['roomid'];
    $roomid=$_SESSION['block'].($_SESSION['floor']-1).str_pad($room,2,0,STR_PAD_LEFT);
    $_SESSION['room_id']=$roomid;
    $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability";
    $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
    $numrow1 = mysqli_num_rows($result1);
    $_SESSION['numrow']=$numrow1;
    ?>
    <form method='POST'>  
        <?php for($a=0;$a<$_SESSION['numrow'];$a++):
            $row1 = mysqli_fetch_array($result1);
            if ($row1['availability']==1):?>
                <input type="submit" value=<?php echo $a+1 ?> style='background-color:green;' id='bed' name='final'>
            <?php endif ?>
            <?php if ($row1['availability']==0):?>
                <input type="submit" value=<?php echo $a+1 ?> style='background-color:red;'>
            <?php endif ?>
        <?php endfor ?>  
    </form>
<?php endif ?>

<?php if(isset($_POST['final'])){
    $_SESSION['bed']=$_POST['final'];
    //echo $_SESSION['bed'];
}
?>

<?php 
if (isset($_SESSION['bed'])):
    $username=$_SESSION['username'];
    $bedid=$_SESSION['room_id'].$_SESSION['bed'];
    echo $bedid;
    $userid=$_SESSION['user_id'];
    $query2="INSERT INTO reserve (user_id,bed_id) VALUES ('$userid','$bedid')";
    $result2 = mysqli_query($dbconn, $query2) or die ("Error: " . mysqli_error($dbconn));
    session_unset();
    $_SESSION['username']=$username;
    $_SESSION['user_id']=$userid;
    header('refresh:3');
    ?>
<?php endif ?>