<?php
    

    include "configuration.php";
    //include "profile.php";
    
    
    
   session_start();
   /*session is started if you don't write this line can't use $_Session  global variable*/
   //$_SESSION["newsession"]=$value;
   /*session created*/
   //echo $_SESSION["newsession"];
   /*session was getting*/

    
   //Get the login info so we know who user is.
    $current_user = $_SESSION["login_user"];
    
    //Identify the row of the current user.
    $query = mysqli_query($con,"SELECT * FROM users WHERE username='$current_user'");
    $result = mysqli_fetch_array($query);
    
    //Initialize variables
    $email = $result['email'];
    $password = $result['password'];
    $major = $result['major'];
    $id = $result['id'];
    $CGPA = $result['CGPA'];
    $Credits = $result['Credits'];

    
    
  //Getting information from the form into variables.
    if(isset($_POST['submit'])) {
        
               
        //Updating the user info, solved if some fields are empty.

        if (!empty($_POST['user'])){
                $username = stripslashes($_POST['user']);
                $username = mysqli_real_escape_string($con, $username);
        } else {
            $username = $current_user;
        }
           
        if ((isset($_POST['mail'])) && (($_POST['mail']) != "")){
            $email = stripslashes($_POST['mail']);
            $email = mysqli_real_escape_string($con, $email);
        }
            
        if ((isset($_POST['user_pass'])) && (($_POST['user_pass']) != "")){
          $password = stripslashes($_POST['user_pass']);
            $password = mysqli_real_escape_string($con, $password);
          }

        if ((isset($_POST['user_major'])) && (($_POST['user_major']) != "")){
            $major = stripslashes($_POST['user_major']);
            $major = mysqli_real_escape_string($con, $major);
        }

        if ((isset($_POST['sfu_id'])) && (($_POST['sfu_id']) != "")){
            $id = stripslashes($_POST['sfu_id']);
            $id = mysqli_real_escape_string($con, $id);
        }

        if (!empty($_POST['CGPA'])){
           $CGPA = $_POST['CGPA'];
        }
            
        if((isset($_POST['Credits'])) && (($_POST['Credits']) != "")){
            $Credits = stripslashes($_POST['Credits']);
            $Credits = mysqli_real_escape_string($con, $Credits);
        }
            
            
            //Get the login info so we know who user is.
            $current_user = $_SESSION["login_user"];
            
            
            //Identify the row to update.
            $query = mysqli_query($con,"SELECT * FROM users WHERE username='$current_user'");
            $result = mysqli_fetch_array($query);
                    
            
            //Update the information.
            if(isset($result)){
            
                $update = "UPDATE users SET email = '$email', password = '$password', major = '$major', CGPA = '$CGPA', Credits = '$Credits', id = '$id' WHERE username = '$current_user'";
                $query_2 = mysqli_query($con, $update);
                
                
                if(isset($query_2)){
                    
                    //Update username with the new id to make sure we have correct row
                    $id_updated = $id;
                    $update_2 = "UPDATE users SET username = '$username' WHERE id = '$id_updated'";
                    $query_3 = mysqli_query($con, $update_2);
                    $current_user = $username;
                    $_SESSION["login_user"] = $username;

                    
                    
                    if(isset($query_3)){
                        
                        //echo $current_user;
                        //echo $username;
                        
                        //Profile update - redirect to profile page
                        echo "Success!";
                        header('Location:profile.php');
                        
                        
                    } else {
                        
                        //Query 3 did not work - no update to username.
                        echo "query_3 failed";
                        
                    }
                    
                } else {
                    
                    //Profile update did not work - redirect to profile update form.
                   // echo $current_user;
                   // echo $username;
                    echo "Unable to update!";
                   //header('Location:profile_customization.php');

                }
                
                
            } else {
                
                //Profile update did not work - redirect to profile update form.
               // echo $current_user;
               // echo $username;
                echo "Form did not submit!";
                //header('Location:cover_index.html');

            }
        
    }
?>


<html>
<title>Profile Customization</title>
<head>
<h1 style= "margin-top: 20px; text-align:center; font-family:verdana; font-size:26px; color:white" class="ui header">Edit Your Profile</h1><br>

<div id="intro1" class="b-body"> PickMyCourse <br>
	 </div>

<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<style>
</style>
<body>
<div>
    <div><br>
     </div>

        <form action = "profile_customization.php" method = "post">
            
            <div style = "color:white; text-align:center; font-size:20px; font-family:verdana;">
            Username: <?php echo $current_user; ?><div>
            <input type = "text" name = "user" placeholder = "New Username" id = "mailbox"/><br></p></div>

            Student ID: <?php echo $id; ?><div>
            <input type = "text" name = "sfu_id" placeholder = "New Student ID" id = "mailbox"/><br></p></div>

            Password: <?php echo $password; ?><div>
            <input type = "text" name = "user_pass" placeholder = "New Password" id = "mailbox"/><br></p></div>

            Current Major: <?php echo $major; ?><div>
            <input type = "text" name = "user_major" placeholder = "Updated Current Major" id = "mailbox"/><br></p></div>

            Email: <?php echo $email; ?><div>
            <input type = "text" name = "mail" placeholder = "New Email" id = "mailbox"/><br></p></div>

            CGPA: <?php echo $CGPA; ?><div>
             <input type = "number" step = "any" name = "CGPA" placeholder = "New CGPA" id = "mailbox"><br></p></div>

            Total Credits Attempted: <?php echo $Credits; ?><div>
            <input type = "text" name = "Credits" placeholder = "New Total Credits Attempted" id = "mailbox"/><br></p></div>

            <div>
            <input type = "submit" name = "submit" value = "Submit">


        </form>
        </div>
     </div>
     </body>
</html>

