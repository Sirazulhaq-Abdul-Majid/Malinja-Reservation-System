<?php
include ("../php/session.php");
include('../php/dbconn.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../');
}
include('../php/dbconn.php');

include ("../php/session.php");

if (!isset($_SESSION['username'])) {
    header('Location: ../');
} 
ob_start();
$q="SELECT * FROM reserve WHERE status='-1' or status='1'";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);
echo "<form method='POST'><table><tr><th>reserve id </th><th>timestamp</th><th>user id</th><th>bed id</th><th>status</th></tr>";
for ($a=0;$a<$numrow;$a++):
    $row=mysqli_fetch_array($result);?>
    <tr>
        <td><?php echo $row['reserve_id']?></td>
        <td><?php echo $row['timestamp']?></td>
        <td><?php echo $row['user_id']?></td>
        <td><?php echo $row['bed_id']?></td>
        <td><?php echo $row['status']?></td>
    
    <td><button value=<?php echo $row['reserve_id']?> name='delete'>Delete</button></td>
    </tr>
<?php endfor ?>
</table>
</form>
<?php 
if (isset($_POST['delete'])){
    $rid=$_POST['delete'];
    $query="DELETE FROM reserve WHERE reserve_id='$rid'";
    $resulto=mysqli_query($dbconn,$query);
    header("Location:admin-view-history.php");
}