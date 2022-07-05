<?php
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
?>
<?php
ob_start();
include('../php/dbconn.php');

        include ("../php/session.php");

        if (!isset($_SESSION['username'])) {
            header('Location: ../');
        } 
        $q="SELECT * FROM reserve ORDER BY user_id";
        $result=mysqli_query($dbconn,$q) or die ("Error: " . mysqli_error($dbconn));
        $numrow = mysqli_num_rows($result);
        echo "<form method='POST'>";
        echo "<table border=1>";
        for($a=0;$a<$numrow;$a++):
            $row = mysqli_fetch_array($result);
            if($row['status']==='0'):?>
                <tr>
                <td><?php echo $row['reserve_id']?></td>
                <td><?php echo $row['timestamp']?></td>
                <td><?php echo $row['user_id']?></td>
                <td><?php echo $row['bed_id']?></td>
                <td><?php echo $row['status']?></td>
                <td><button value=<?php echo $row['reserve_id']?> id='accept' name='accept'>accept</button>
                <button value=<?php echo $row['reserve_id']?> id='reject' name='reject'>reject</button></td>
                </tr>
            <?php endif ?>
        <?php endfor?>
        <?php
        echo "</table>";
        echo "</form>";
        
        if(isset($_POST['accept'])){
            $uid=$_SESSION['username'];
            $rid=$_POST['accept'];
            $query0="UPDATE reserve SET status='1' WHERE reserve_id='$rid'";
            $result0=mysqli_query($dbconn,$query0);
            $query="SELECT * FROM reserve JOIN bed ON reserve.bed_id=bed.bed_id WHERE reserve_id='$rid'";
            $result=mysqli_query($dbconn,$query);
            $row=mysqli_fetch_array($result);
            $bid=$row['bed_id'];
            $room_id=$row['room_id'];
            $query2="UPDATE bed SET availability='0' WHERE bed_id='$bid'";
            $result2=mysqli_query($dbconn,$query2);
            $query3="SELECT * FROM bed WHERE room_id='$room_id'";
            $result3=mysqli_query($dbconn,$query3);
            $numrow3=mysqli_num_rows($result3);
            $total=0;
            for($a=0;$a<$numrow3;$a++){
                $row3=mysqli_fetch_array($result3);
                if($row3['availability']==0){
                    $total++;
                }
            }
            if($total==6){
                $query4="UPDATE room SET availability='0' WHERE room_id='$room_id'";
                $result4=mysqli_query($dbconn,$query4);
            }
            $query5="UPDATE room SET total_resident='$total' WHERE room_id='$room_id'";
            $result5=mysqli_query($dbconn,$query5);
            session_unset();
            $_SESSION['username']=$uid;
            $query4="DELETE FROM reserve WHERE bed_id='$bid' AND status=0";
            $result4=mysqli_query($dbconn,$query4);
            header('Location:aiemantakmandiew.php');
        }
        
        if(isset($_POST['reject'])){
            $uid=$_SESSION['username'];
            $rid=$_POST['reject'];
            $query="UPDATE reserve SET status='-1' WHERE reserve_id='$rid'";
            $resulto=mysqli_query($dbconn,$query);
            echo $query;
            session_unset();
            $_SESSION['username']=$uid;
            header('Location:aiemantakmandiew.php');
        }
        ?>