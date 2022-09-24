<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users1 ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>

	<style>
		.button {
  			border: none;
  			color: white;
  			padding: 16px 32px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin: 50px 45%;
  			transition-duration: 0.4s;
  			cursor: pointer;
		}

		.button1 {
  			background-color: white; 
  			color: black; 
  			border: 2px solid #4dff4d;
		}

		.button1:hover {
  			background-color: #4dff4d;
  			color: white;
		}
	</style>
</head>

<body>

	<form action="add.html" method="post">

		<button class="button button1" >Logout</button> 

	</form>

	<table style="margin:1% 10%" width='80%' border=0>

	<tr bgcolor='#4dff4d'>
		<td>Name</td>
		<td>Phone</td>
		<td>Address</td>
		<td>Password</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 

	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['address']."</td>";
		echo "<td>".$res['password']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>