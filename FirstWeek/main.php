<?php
    // get name from the request
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
?>
<html>
    <head>
        <title>Name test</title>
    </head>
    <body>
        <h2>First Name <?php echo $first_name; ?></h2>
        <h2>Last Name <?php echo $last_name; ?></h2>

    </body>
</html>