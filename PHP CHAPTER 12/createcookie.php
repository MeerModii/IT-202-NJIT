<?php 
    $cookie_name = "userid";
    $cookie_value = "101";
    $time = 60 * 60 *24 * 7;
    setcookie($cookie_name, $cookie_value, time() + $time, "/");

    echo "cookie_name =  $cookie_name  is set";
?>