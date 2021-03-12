<?php
    include('configuration.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['user'])) {
        // removes backslashes
        $username = stripslashes($_POST['user']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_POST['mail']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['user_pass']);
        $password = mysqli_real_escape_string($con, $password);
        $major = stripslashes($_POST['user_major']);
        $major = mysqli_real_escape_string($con, $major);
        $id = stripslashes($_POST['sfu_id']);
        $id = mysqli_real_escape_string($con, $id);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username,password, email,major,id,create_datetime)
        VALUES ('$username', '$password', '$email','$major', '$id','$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='home.html'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='Register2.html'>registration</a> again.</p>
                  </div>";
        }
    }
?>
