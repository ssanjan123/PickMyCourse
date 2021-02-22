<?php
    include('configuration.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['user'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['user']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['mail']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['user_pass']);
        $password = mysqli_real_escape_string($con, $password);
        $major = stripslashes($_REQUEST['user_major']);
        $major = mysqli_real_escape_string($con, $major);
        $id = stripslashes($_REQUEST['sfu_id']);
        $id = mysqli_real_escape_string($con, $id);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `user_info` (username,password, email,major,id,create_datetime)
        VALUES ('$username', '".md5($password)."', '$email','$major', '$id','$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.html'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.html'>registration</a> again.</p>
                  </div>";
        }
    }
?>
