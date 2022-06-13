<?php

//fetch.php

$dbconn=mysqli_connect('localhost','root','','malinjadb') or die(mysqli_error($dbconn));

$output = '';

if(isset($_POST["query"]))

{

$search = mysqli_real_escape_string($dbconn, $_POST["query"]);

$query = "

SELECT * FROM user

WHERE name LIKE '%".$search."%'

OR username LIKE '%".$search."%'


";

}else{

$query = "SELECT * FROM user ORDER BY name";

$query = ""; //comment this line to list students upon page loading

}

if ($query!=""){

	$result = mysqli_query($dbconn, $query);

	if(mysqli_num_rows($result) > 0){

		$output .= '<div class="table-responsive">

			<table class="table table bordered"><tr>


			<th>Name</th>

			<th>Gender</th>

			<th>Adress</th>

            <th>Telephone</th>

            <th>Action</th>

			</tr>';

	while($row = mysqli_fetch_array($result)){

		$output .= '

			<tr>

			<td>'.$row["name"].'</td>

			<td>'.$row["gender"].'</td>

			<td>'.$row["address"].'</td>

			<td>'.$row["telephone"].'</td>

			</tr>

		';

}

	echo $output;

}else{

	echo 'Data Not Found';

}

	}

?>