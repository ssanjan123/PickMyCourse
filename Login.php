<?php
	 
	$user= $_POST["user"];
	$pass= $_POST["user_pass"];
	if($user=="admin"&& $pass=="12345"){
		echo "sucess";
	}else {
		echo "wrong";
	}
?>