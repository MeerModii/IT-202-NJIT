<?php
    require_once('admindb.php');
    session_start();

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST,'password');

    if(is_valid_login($email,$password)){
        // Create session entry
        $_SESSION['is_valid_admin'] = true;
        echo "<p>you have logged in successfully</p>";
    }
    else{
        if($email == NULL && $password == NULL){
            $login_message = "You must login to view this page.";
        }
        else{
            $login_message = "invalid email or password";
        }
        include('login.php');
    }

?>