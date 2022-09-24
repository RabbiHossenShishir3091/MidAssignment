<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	

		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users1 SET name='$name',phone='$phone',address='$address',password='$password',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users1 WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$phone = $res['phone'];
	$address = $res['address'];
	$password = $res['password'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>

	<!-- below we are including the jQuery and jQuery plugin .js files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../lib/w3.css">

		<style>
			body { 
				color: #000000;
				background-color: #f1f1f1;
				font-family: Arial, Helvetica, sans-serif;
			}
			
			form {border: 3px solid #f1f1f1;}
			
			input[type=text], input[type=password] {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 0px 0;
			  color:#f1f1f1;
			  background-color:  #595959;
			  display: inline-block;
			  border: 1px #4dff4d;
			  box-sizing: border-box;
			}

			button {
			  background-color: #4dff4d;
			  color: #000000;
			  font-weight: bold;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  cursor: pointer;
			  width: 100%;
			}
			
			button:hover {
				background-color: #000000;
				color: #4dff4d;
			    opacity: 0.8;
			}
			
			
		</style>
		
		<script>
			$().ready(function () {
	
				$("#signupForm").validate({
					
					rules: {
						name: {
							required: true,
							minlength: 2 
						},
						phone: {
							required: true,
							minlength: 11
						},
						address: {
							required: true,
							minlength: 5
						},
						password: {
							required: true,
							minlength: 8
						},
						confirm_password: {
							required: true,
							minlength: 8,
							equalTo: "#password" 
						},
						email: {
							required: true,
							email: true
						},
						
					},
					// in 'messages' user have to specify message as per rules
					messages: {
						name: {
							required: " Please enter a name",
							minlength: " Your username must consist of at least 2 characters"
						},
						phone: {
							required: " Please enter a phone",
							minlength: " Your username must consist of at least 11 characters"
						},
						address: {
							required: " Please enter a address",
							minlength: " Your username must consist of at least 5 characters"
						},
						password: {
							required: " Please enter a password",
							minlength: " Your password must be consist of at least 8 characters"
						},
						confirm_password: {
							required: " Please enter a password",
							minlength: " Your password must be consist of at least 8 characters",
							equalTo: " Please enter the same password as above"
						},
						email: {
							required: " Please enter a email",
							minlength: " Your input must be email"
						}
					
					}
				});
			});
	
		</script>
</head>

<body>



<br><br>
	<h1 style="text-align:center; color:#4dff4d">Update Page</h1>
    <br><br><br>

	<form class="cmxform1" id="signupForm" action="edit.php" method="post" name="form1">
		<fieldset>

			<p>
				<label for="name">Name </label>
				<input type="text" name="name" value="<?php echo $name;?>"></input>
			</p>
			<p>
				<label for="phone">Phone </label>
				<input type="text" name="phone" value="<?php echo $phone;?>"></input>
			</p>
			<p>	
				<label for="address">Address </label>
				<input type="text" name="address" value="<?php echo $address;?>"></input>
			</p>
			<p>	
				<label for="password">Password </label>
				<input id="password" type="password" name="password" value="<?php echo $password;?>"></input>
			</p>
			<p>	
				<label for="confirm_password">Confirm Possword </label>
				<input id="confirm_password" type="password" name="confirm_password"></input>
			</p>
			<p>	
				<label for="email">Email </label>
				<input type="text" name="email" value="<?php echo $email;?>"></input>
			</p>
			<p>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<button class="w3-btn w3-xlarge w3-round-xxlarge" type="submite" name="update">Update</button>
			</p>
			
			
		
		</fieldset>
	</form>

</body>
</html>