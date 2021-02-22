<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user'];
		$user_email = $_POST['mail'];
		$user_id = $_POST['sfu_id'];
		$password = $_POST['user_pass'];

		

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_name,user_email,user_id,password) values ('$user_name','$user_email','$user_id','$password')";

			mysqli_query($con, $query);

			header("Location: Login.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!-- 
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user"><br><br>
			<input id="text" type="password" name="user_pass"><br><br>
			<input id="text" type="text" name="mail"><br><br>
			<input id="text" type="text" name="sfu_id"><br><br>


			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html> -->