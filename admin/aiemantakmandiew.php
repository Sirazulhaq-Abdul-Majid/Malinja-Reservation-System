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
            $query="SELECT * FROM reserve JOIN bed ON reserve.bed_id=bed.bed_id";
            $result=mysqli_query($dbconn,$query);
            for($a=0;$a<3;$a++){
                $r=mysqli_fetch_array($result);
                echo $r['room_id'];
            }
            session_unset();
            $_SESSION['username']=$uid;
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