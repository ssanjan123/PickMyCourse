<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
$mail_address =$_POST['mail'];
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

    //发送附件
    // $mail->addAttachment('../xy.zip');         
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Reset the password';
    $mail->Body    = '<h1>Reset your password!</h1> <p>Please click here <a href="http://localhost/cmpt-276-group-project/Login.html"> here</a> to reset your password!</p>';
    $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

    $mail->send();
    echo '邮件发送成功';
} catch (Exception $e) {
    echo '邮件发送失败: ', $mail->ErrorInfo;
}
?>