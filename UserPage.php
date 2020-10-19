<?php

session_start();
include 'include/header.php';
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $conn = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
    $query = "Select verified, vkey from authorizedusers where verified = 0 and vkey = '$vkey' Limit 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_connect_errno()) {
        //connection failed
        echo 'Failed to connect to database' . mysqli_connect_errno();
    }
    if ($result->num_rows == 1) {
        $update = mysqli_query($conn, "Update authorizedusers set verified = 1 where vkey = '$vkey' limit 1");
        if ($update) {
            echo "<p style=\"text-align: center;\"><b><marquee behavior=\"alternate\" scrollamount=15>Your account has been verified. You may now login</marquee></b></p>";
            echo "<meta http-equiv='refresh' content='5;url=Home Page.php' />\n";
        } else {
            echo $mysqli->error;
        }
    } else {
        echo "<p style=\"text-align: center; color: red;\"><b><marquee behavior=\"alternate\" scrollamount=15>This account is invalid or has already been verified.</marquee></b></p>";
        echo "<meta http-equiv='refresh' content='4;url=Login.php#bottomOfPage' />\n";
    }
} else {
    die("<p style=\"font-size: 20px; color: red;\"><b><marquee style=\"text-align: center; \" behavior=\"slide\" scrollamount=25>Invalid fields. Please try again with valid credentials.</marquee></b></p>");
}
?>


