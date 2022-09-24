<html>
<head>
	<title>Add Data</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
		.alert {
  		padding: 20px;
  		background-color: #4dff4d;
  		color: white;
		}

		.closebtn {
			margin-left: 15px;
 			color: white;
  			font-weight: bold;
  			float: right;
  			font-size: 22px;
  			line-height: 20px;
  			cursor: pointer;
  			transition: 0.3s;
		}

		.closebtn:hover {
  			color: black;
		}

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
	
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
				
		//insert data to database	                           
		$result = mysqli_query($mysqli, "INSERT INTO users1(name,phone,address,password,email) VALUES('$name','$phone','$address','$password','$email')");
		
}
?>
	
	<br><br><br>
	<br><br><br>
	<br><br><br>

	<div class="alert">
	  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
	  Data added successfully
	</div>


	<br><br><br>

	<form action="index.php" method="post">

		<button class="button button1" >Next</button> 

	</form>

</body>
</html>