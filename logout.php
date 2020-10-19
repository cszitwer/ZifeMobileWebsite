  <?php 
            setcookie('user', '',time() - 3600);
            session_start();
            mysqli_close($connection);
            $_SESSION['cart'] = array();
            unset($_SESSION['cart']);
            $_SESSION['loggedin'] = false;
            header('Location: index.php');
?>