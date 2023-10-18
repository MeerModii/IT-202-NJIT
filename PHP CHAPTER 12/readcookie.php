<?php 
    $cookie_name = "userid";
    $value = filter_input(INPUT_COOKIE, $cookie_name, FILTER_VALIDATE_INT);

    if (!isset($value)){
        echo"cookie named $cookie_name is not set!";
    }
    else{
        echo "cookie named $cookie_name is set!";
        echo "<br/>";
        echo "cookie value is $value";
    }
?>