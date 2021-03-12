<?php
    session_start();
    
    ?>

<?php
    include('configuration.php');
  
    
    $username = $_POST['user'];
    $password = $_POST['user_pass'];
      
        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripcslashes($password);
        $password = mysqli_real_escape_string($con, $password);
      
        $sql = "select * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
          
        if($count == 1){
          //session_start();
           // $_SESSION['login_user'] = $_POST['username'];
           $_SESSION['login_user'] = $_POST['user'];
           
            header("location:cover_index.html");
        //$_SESSION['pic']= $row['pic'];

        
        }
        else{
            echo "<div class='form'>
            <h1> Login failed. Invalid username or password.</h1><br/>
            <p class='link'>Click here to <a href='home.html'>login</a> again.</p>
            </div>";
        }
?>
