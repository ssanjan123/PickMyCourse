<?php 
	include "configuration.php";
	//include "Login.php";
	//include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <?php
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
//$_SESSION["newsession"]=$value;
/*session created*/
//echo $_SESSION["newsession"];
/*session was getting*/
?>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <style>
        body
        {
        background-image:url("cover_sfu.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        }
        
        </style>
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="profile_customization.php"
 						</script>
 					<?php
 				}
				 $q=mysqli_query($con,"SELECT * FROM users where username='$_SESSION[login_user]' ;");
				 ?>
				 <h2 style="text-align: center;">Profile Page</h2>
				 <?php
 				$row=mysqli_fetch_assoc($q);
 			?>
				 <div style="text-align: center;"> <b>Welcome, </b>
					 <h4>
						 <?php echo $_SESSION['login_user']; ?>
					 </h4>
				 </div>
				 <?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Student Id: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['id'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Major: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['major'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";
					 
					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Current CGPA: </b>";	
	 					echo "</td>";
	 					echo "<td>";
						 if($row['CGPA']==0){
							 echo "N/A";
						 }
						 else
	 						echo $row['CGPA'];
	 					echo "</td>";
	 				echo "</tr>";
					 
					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Credits Completed: </b>";	
	 					echo "</td>";
	 					echo "<td>";
						 if($row['CGPA']==0){
							 echo "N/A";
						 }
						 else
	 						echo $row['Credits'];
	 					echo "</td>";
	 				echo "</tr>";

	 				

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 			
 		</div>
 	</div>
 </body>
 </html>