<?php
    session_start();
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);
    unset($_SESSION['USER_NAME']);
    echo "<script>alert('You are now logged out');</script>";
    header('location:home.php');
    die();
?>