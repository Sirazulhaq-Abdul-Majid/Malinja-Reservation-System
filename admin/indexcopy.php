
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

$aavail=0;
$bavail=0;
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
            $aavail++;
            $afloors[1]='green';
            $temp=ltrim($room,"0");
            $a1[$temp]='green';
        }
        else if($floor==1 && $row['availability']==1){
            $aavail++;
            $afloors[2]='green';
            $temp=ltrim($room,"0");
            $a2[$temp]='green';
        }
        else if($floor==2 && $row['availability']==1){
            $aavail++;
            $afloors[3]='green';
            $temp=ltrim($room,"0");
            $a3[$temp]='green';
        }
        else if($floor==3 && $row['availability']==1){
            $aavail++;
            $afloors[4]='green';
            $temp=ltrim($room,"0");
            $a4[$temp]='green';
        }
    }
    else if($block=="B"){
        if($floor==0 && $row['availability']==1){
            $bavail++;
            $bfloors[1]='green';
            $temp=ltrim($room,"0");
            $b1[$temp]='green';
        }
        else if($floor==1 && $row['availability']==1){
            $bavail++;
            $bfloors[2]='green';
            $temp=ltrim($room,"0");
            $b2[$temp]='green';
        }
        else if($floor==2 && $row['availability']==1){
            $bavail++;
            $bfloors[3]='green';
            $temp=ltrim($room,"0");
            $b3[$temp]='green';
        }
        else if($floor==3 && $row['availability']==1){
            $bavail++;
            $bfloors[4]='green';
            $temp=ltrim($room,"0");
            $b4[$temp]='green';
        }
    }
}
//print_r($afloors);
//print_r($bfloors);
//print_r($a2);
//print_r($a3);
//print_r($a4);
//print_r($b1);
//print_r($b2);
//print_r($b3);
//print_r($b4);
$acolor='red';
$bcolor='red';
if($aavail>0){
    $acolor='green';
}
if($bavail>0){
    $bcolor='green';
}
?>

<?php
//show block\
?>
<form method='POST'>
    <input type='submit' value="A" style='background-color: <?php echo $acolor;?>;' id='blocka' name='blocka'>
    <input type='submit' value="B" style='background-color: <?php echo $bcolor;?>;' id='blockb' name='blockb'>
</form>

<?php if ((isset($_POST['blocka'])||isset($_POST['floora'])||isset($_POST['room'])) && $acolor=='green'):
//show floor?>
    <form method="POST">
    <?php for($a=1;$a<5;$a++):?>
        <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $afloors[$a]?>;' id='floora' name='floora'>
    <?php endfor ?>
    </form>
    <?php if(isset($_POST['floora'])){
        $floor=$_POST['floora'];
    } ?>
<?php endif ?>

<?php if ((isset($floor)||isset($_POST['room'])||$here=1) && $afloors[$floor]=='green'):
//show room

?>
        <form method="POST">
        <?php if($_POST['floora']==1):?>
        <?php for($a=1;$a<26;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $a1[$a]?>;' id='room' name='room'>
        <?php endfor ?>
        <?php endif ?>
        <?php if($_POST['floora']==2):?>
        <?php for($a=1;$a<26;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $a2[$a]?>;' id='room' name='room'>
        <?php endfor ?>
        <?php endif ?>
        <?php if($_POST['floora']==3):?>
        <?php for($a=1;$a<26;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $a3[$a]?>;' id='room' name='room'>
        <?php endfor ?>
        <?php endif ?>
        <?php if($_POST['floora']==4):?>
        <?php for($a=1;$a<26;$a++):?>
            <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $a4[$a]?>;' id='room' name='room'>
        <?php endfor ?>
        <?php endif ?>
        </form>        
<?php endif ?>
<?php if (isset($_POST['room'])){
    $_SESSION['room']=$_POST['room'];
} ?>






<?php if(isset($_POST['room'])&& $a1[$_POST['room']]=='green'):?>
  <?php 
  //room for floor1
  echo $_SESSION['room'];
  $roomid="A0".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
  if(isset($roomid)){
    $_SESSION['room_id']=$roomid;
  }
  $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
  $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
  $numrow1 = mysqli_num_rows($result1);?>
  <form method="POST">
  <?php for ($a=0;$a<$numrow1;$a++):
      $row1 = mysqli_fetch_array($result1);
      if($row1['availability']==1):?>
          <input type="submit" value=<?php echo $a+1 ?> style='background-color:green;' id='ba' name='bedavail'>
      <?php endif ?>
      <?php if($row1['availability']==0):?>
          <input type="submit" value=<?php echo $a+1 ?> style='background-color:red;' id='bed' name='bed'>
      <?php endif ?>
  <?php endfor ?>
  </form>
  <?php endif ?>              
  <?php if(isset($_POST['bedavail'])):?>
    <?php 
        $id=$_SESSION['user_id'];
        $roomid= $_SESSION['room_id'];
        $bedid=$roomid.$_POST['bedavail'];
        $query2="INSERT INTO reserve (user_id,bed_id) VALUES ('$id','$bedid') ";
        $result1 = mysqli_query($dbconn, $query2) or die ("Error: " . mysqli_error($dbconn));
    ?>
      
  <?php endif ?>











<?php
if ((isset($_POST['blockb'])||isset($_POST['floorb']))&& $bcolor=='green'):
    for($a=1;$a<5;$a++):?>
        <input type="submit" value=<?php echo $a ?> style='background-color:<?php echo $bfloors[$a]?>;' id='floorb' name='floorb'>
    <?php endfor ?>
<?php endif ?>
