<?php
    session_start();   
    $_SESSION['loggedIn'] = false;
    $_SESSION['customerName'] = htmlentities($_POST['customerName']);
    $_SESSION['emailAddress'] = htmlentities($_POST['emailAddress']);
    $_SESSION['phoneNum'] = htmlentities($_POST['phoneNum']);
    $_SESSION['password'] = htmlentities($_POST['password']);
    $_SESSION['subscribed'] = (isset($_POST['subscribed']))? TRUE: FALSE;
    if(!isset($_POST['subscribed'])){$_SESSION['subscribed'] = 0; }
    
    $userName = $_SESSION['customerName'];
    $password = $_SESSION['password'];
    $email = $_SESSION['emailAddress'];
    $phone = $_SESSION['phoneNum'];
    $conn = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
    $vkey = md5(time().$userName);
    $subscribed = $_SESSION['subscribed'];
    $query = 'Insert into authorizedusers(userName, emailAddress, phoneNum, password, vkey, subscribed) values('.'\''.$userName.'\''.','.'\''.$email.'\''.','.$phone.','.'\''.$password.'\''.','.'\''.$vkey.'\''.','.$subscribed.')';

    if(mysqli_connect_errno()){
        //connection failed
        echo 'Failed to connect to database'. mysqli_connect_errno();
    }
    $result = mysqli_query($conn, $query);      
    if($result){
        include 'include/header.php';
        require 'PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'zifemobile@gmail.com';
        $mail->Password = '3473428577';
        $mail->setFrom('zifemobile@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $mail->Body = "<a href='http://localhost/ZifeMobile/userPage.php?vkey=$vkey'>Register Account</a>";
        if (!$mail->send()) {
            echo "ERROR: " . $mail->ErrorInfo;
            echo "<meta http-equiv='refresh' content='2;url=index.php' />\n";
        } else {
            echo "<p style=\"text-align: center;\"><b><marquee behavior=\"alternate\" scrollamount=15>Your verification has been sent! Please confirm with your email.</marquee></b></p>";
            echo "<meta http-equiv='refresh' content='10;url=index.php' />\n";
        }
        
        mysqli_close($conn);
    }
    
    else{
        header('Location: UserPage.php');
    }
?>
