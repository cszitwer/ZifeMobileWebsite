<?php 
    session_start();  
    $_SESSION['emailAddress'] = htmlentities($_POST['emailAddress']);
    $_SESSION['password'] = htmlentities($_POST['password']);
    
    $email = $_SESSION['emailAddress'];
    $password = $_SESSION['password'];
    $conn = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
    $query = 'Select * from authorizedusers where emailAddress = '.'\''.$email.'\''.'and password = '.'\''.$password.'\'';
    
    
    if(mysqli_connect_errno()){
        //connection failed
        echo 'Failed to connect to database'. mysqli_connect_errno();
    }
    $result = mysqli_query($conn, $query);     
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows > 0){
        $_SESSION['userID'] = $row['id'];
        $user = $row['userName'];
        $verified = $row['verified'];
        $email = $row['emailAddress'];
        if($verified == 1){
          setcookie('user',$user,time() +(8600*30));
          $_SESSION['loggedin'] = true;
          header('Location: index.php');
        }
        else{
            echo "<p style=\"text-align: center;\"><b><marquee>This account has not yet been verified by email. An email was sent to $email</marquee></b></p>";
        }
        
    }
    
    else{
        header('Location: UserPage.php');
    }
?>
