<?php
    $cookie_name = "userid";
    $time = 60*60;
    setcookie($cookie_name,"",time()-$time,"/");
    echo "cookie named $cookie_name is deleted";
?>