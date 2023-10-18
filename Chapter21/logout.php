<?php 
    session_start();
    $_SESSION = [];
    session_destroy();
    $login_message = "you have logged out";
    include('login.php');
?>