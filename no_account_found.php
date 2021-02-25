/*

Adapted from: https://www.allphptricks.com/forgot-password-recovery-reset-using-php-and-mysql/

Indexing the database for the user's email. If they are found in the database, they will be sent a link to reset their password. If email is not found to be associated with the account a message  will be sent to user.
 
*/
<?php
include('db_connection_reset.php');

//Find email using global variables
if(isset($_POST["user_email"]) && (!empty($_POST["user_email"]))){
    
    $email = $_POST["user_email"];
    
    //Checks if provided email has illegal characters
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    //Check if provided email is valid
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
    //Incorrect email error messaging
    if(!$email){
        
        //Invalid email address provided due to illegal characters
        $error .= "<p>The email address provided contains invalid characters. Please re-enter your email.<p>";
    } else
    
    if(!$email){
        
        //Look for the email address
        $sel_query = "SELECT * FROM 'users' WHERE user_email='".$email."'";
        $results = mysqli_query($con, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == ""){
            //Error message for user not found
            $error .= "<p>No registered user has been found with this email address.<p>";
        }
    }
?>

