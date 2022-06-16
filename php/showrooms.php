<?php

include('../php/dbconn.php');

          include ("../php/session.php");

          if (!isset($_SESSION['username'])) {
            header('Location: ../');
		      } 
            $query="SELECT * FROM room ORDER BY room_id,availability ";
            $result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
            $numrow = mysqli_num_rows($result);
?>
<?php 
$numrow = mysqli_num_rows($result);
for ($a=0;$a<$numros;$a++){
    $row = mysqli_fetch_array($result);
    $block=substr($row['room_id'],0,1);
    
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
?>

<table>
    <tr>
    <th>no</th>
    <th>Room ID</th>
    <th>Availability</th>
    </tr>


<?php

for($a=0;$a<$numrow;$a++):?>
  
  <?php $row = mysqli_fetch_array($result);?>
    <tr>
        <td><?php echo $a+1; ?></td>
        <td><?php echo $row['room_id'];?></td>
        <td>
        <?php if($row['availability']==1){echo 'available';}else{echo 'not available';}?></td>
    </tr>
<?php endfor; ?>
</table>
