<?php

if(isset($_POST['bed'])){
  
}


<?php if(isset($_POST['room'])&& $a1[$_POST['room']]=='green'):?>
  <?php 
  $roomid="A0".str_pad($_POST['room'],2,0,STR_PAD_LEFT);
  $query1="SELECT * FROM bed WHERE room_id='$roomid' ORDER BY bed_id,availability ";
  echo $query1;
  $result1 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error($dbconn));
  $numrow1 = mysqli_num_rows($result1);
  $id=$_SESSION['user_id'];
  $query2='INSERT INTO reserve (user_id,bed_id) VALUES ("$id","$roomid") ';?>
  <form method="POST">
  <?php for ($a=0;$a<$numrow1;$a++):
      $row1 = mysqli_fetch_array($result1);
      if($row1['availability']==1):?>
          <input type="submit" value=<?php echo $a+1 ?> style='background-color:green;' id='bedavail' name='bedavail'>
      <?php endif ?>
      <?php if($row1['availability']==0):?>
          <input type="submit" value=<?php echo $a+1 ?> style='background-color:red;' id='bed' name='bed'>
      <?php endif ?>
  <?php endfor ?>
  </form>                 
  <?php echo $_POST['bedavail']; ?>
  <?php if(isset($_POST['bedavail'])):?>
      <?php echo 'hi'; ?>
      //$result1 = mysqli_query($dbconn, $query2) or die ("Error: " . mysqli_error($dbconn));
  <?php endif ?>
<?php endif ?>