<?php
    $input = filter_input(INPUT_GET, 'search');
    $input = htmlspecialchars($input);
    require_once('nutsdatabase.php');

    $statement = 'SELECT * FROM products WHERE productCode = 
                    :input OR productName = :input';
    $statement = $database->prepare($statement);
    $statement->bindValue(':input', $input);
    $statement->execute();
    $finalStatement = $statement->fetchAll();
    $statement->closeCursor();

    $arrayCode = [];
    foreach ($finalStatement as $rows){
        $arrayCode[] = $rows['productCode'];
    }
    
    $arrayName = [];
    foreach ($finalStatement as $rows){
        $arrayName[] = $rows['productName'];
    }

?>
<html>
    <head>
        <title>Results Page</title>
    </head>
    <body>
        <h1><?php echo htmlspecialchars($input); ?></h1>
        <h1><?php print_r($arrayCode); ?></h1>
        <h1><?php print_r($arrayName); ?></h1>
    </body>
</html>

