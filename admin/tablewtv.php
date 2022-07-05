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
$q="SELECT * FROM room";
$result=mysqli_query($dbconn,$q);
$numrow=mysqli_num_rows($result);?>


<table border=1>

    <tr><td>Floor</td><td colspan=25 style="text-align: center;">Room</td></tr>
    <tr>
        <td rowspan=2>1</td><?php for($a=1;$a<26;$a++){
            echo "<td>";
            echo $a;
            echo "</td>";
            }?>
    </tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>2</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>3</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>4</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>

</table><br>
<table border=1>

    <tr><td>Floor</td><td colspan=25 style="text-align: center;">Room</td></tr>
    <tr>
        <td rowspan=2>1</td><?php for($a=1;$a<26;$a++){
            echo "<td>";
            echo $a;
            echo "</td>";
            }?>
    </tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>2</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>3</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>
    <tr><td rowspan = 2>4</td><?php for($a=1;$a<26;$a++){
    echo "<td>";
    echo $a;
    echo "</td>";
    }?></tr>
    <tr><?php 
    for ($a=0;$a<25;$a++){
    echo '<td>';
    echo '<div style="color:green">';
    $row=mysqli_fetch_array($result);
    echo $row['total_resident'];
    echo "</div>";
    echo "</td>";
    }
    ?></tr>

</table>