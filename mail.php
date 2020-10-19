<?php session_start(); include 'include/header.php' ?>
<?php
if(isset($_COOKIE['user'])){
    $user = $_COOKIE['user'];
    $from = $_SESSION['emailAddress'];
}
else{
    $user = 'guest';
    $from = 'guest@gmail.com';
}
$message = $_POST['message-text']; 
$subject = $_POST['subject'];
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'zifemobile@gmail.com';
$mail->Password = '3473428577';
$mail->setFrom($from);
$mail->addAddress('zifemobile@gmail.com');
$mail->Subject = $subject;
$mail->Body = $message."\n".$user;
$mail->AddReplyTo($from, $user);
//send the message, check for errors
if (!$mail->send()) {
    echo "<p style=\"text-align: center; color: red;\"><b><marquee behavior=\"alternate\" scrollamount=15>There was an error sending the message. Please try again later, Thank You!</marquee></b></p>";
    echo "<meta http-equiv='refresh' content='2;url=Home Page.php' />\n";
} else {
    echo "<p style=\"text-align: center; font-size:20px\"><b><marquee behavior=\"alternate\" scrollamount=15>Your message has been sent! One of our representatives will get back to you.</marquee></b></p>";
    echo "<meta http-equiv='refresh' content='10;url=Home Page.php' />\n";
}
?>
