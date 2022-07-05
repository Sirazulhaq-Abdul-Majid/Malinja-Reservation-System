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
$uid=$_SESSION['user_id'];
$q="SELECT * FROM reserve WHERE user_id='$uid' ORDER BY timestamp";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);?>
<table border=1>

    <tr><td>reserve id</td><td>timestamp</td><td>bed</td><td>status</td></tr>
    <?php for ($a=0;$a<$numrow;$a++){
        $row=mysqli_fetch_array($result);
        echo '<tr>';
        echo '<td>';
        echo $row['reserve_id'];
        echo '</td>';
        echo '<td>';
        echo $row['timestamp'];
        echo '</td>';
        echo '<td>';
        echo $row['bed_id'];
        echo '</td>';
        echo '<td>';
        if($row['status']==1){
          echo 'approved';
        }
        else if ($row['status']=-1){
          echo 'rejected';
        }
        echo '</td>';
        echo '</tr>';
    }?>

</table>