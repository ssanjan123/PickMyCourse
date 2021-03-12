<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Exception.php';
	require 'PHPMailer.php';
	require 'SMTP.php';

	/*$host="localhost";
	$user="root";
	$password="";
	$db_name="LoginSystem";
	$con=mysqli_connect($host,$user,$password,$db_name);
	    if(mysqli_connect_errno())
	    {
	        die("Failed to connect with MySQL: ". mysqli_connect_error());
	    }//else{
	    //  echo 'success';
	    //}
     */
    $cleardb_url = parse_url(getenv("CLEARDB_JADE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    if(mysqli_connect_errno())
    {
        die("Failed to connect with MySQL: ". mysqli_connect_error());
    }

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	$mail_address =$_POST['mail'];
	//echo $mail_address;
	$sql = "SELECT *FROM users WHERE email = '$mail_address'";
	$result = mysqli_query($con,$sql);
	$result_arr=mysqli_fetch_array($result);
	//print_r($result_arr);
	$num = mysqli_num_rows($result);
	//echo $num;
	if($num==0){     //not find the email
		echo 'fail email';
		exit;
	}
	else{
		$uid=$result_arr[0];
		//echo $uid;
	 	$user=$result_arr[1];
		//echo $user;
		$token=md5($uid.$result_arr[1].$result_arr[2]);
		//echo $token;
		$sql2="UPDATE users SET password =  '$token' WHERE email = '$mail_address'";
		mysqli_query($con,$sql2);
	try {
	    //服务器配置
	   $mail->CharSet ="UTF-8";                     //设定邮件编码
	   $mail->SMTPDebug = 0;                        // 调试模式输出
	   $mail->isSMTP();                             // 使用SMTP
	   $mail->Host = 'imap.gmail.com';                // SMTP服务器
	   $mail->SMTPAuth = true;                      // 允许 SMTP 认证
	   $mail->Username = 'p3cncm@gmail.com';                // SMTP 用户名  即邮箱的用户名
	   $mail->Password = 'a1234567!';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
	   $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
	   $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

	   $mail->setFrom('p3cNCM@gmail.com', 'P3C team');  //发件人
	   $mail->addAddress($mail_address);  // 收件人
	   //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
	   //$mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
	   //$mail->addCC('cc@example.com');                    //抄送
	   //$mail->addBCC('bcc@example.com');                    //密送

	   // $mail->addAttachment('../xy.zip');
	   // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');

	    //Content
	    $mail->isHTML(true);
	    $mail->Subject = 'Reset the password';
			$user=$result_arr[1];
	    $mail->Body    = '<h1>Reset your password!</h1>
			<p>Please click <a href="https://pickmycourse-theapp.herokuapp.com"> here</a> to login!<p> '
			.'User name: '.$user.'</br> <p>'
			.'Password: '.$token.'</br>';
	    $mail->AltBody = 'your email dont support html'; //如果邮件客户端不支持HTML则显示此内容;

	    $mail->send();
	    echo 'success,check your email';
	} catch (Exception $e) {
	    echo 'fail ', $mail->ErrorInfo;
	}
}
?>
