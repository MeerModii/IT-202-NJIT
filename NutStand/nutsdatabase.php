<?php
    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mnm23';
    $njit_username = 'mnm23';
    $njit_password = 'SQLdatabase1*';


    // For connecting to Local / Non Local database
    $dsn = $njit_dsn;
    $username = $njit_username;
    $password = $njit_password;

    try{
        $database = new PDO($dsn, $username, $password);
        echo '<p>connection established!</p>';
    }
    catch(PDOException $exception){
        $error_message = $exception->getMessage();
        include('databaseError.php');
        exit();
    }

    $data = array(
        array("1", "TreeNut", date("Y-m-d H:i:s")),
        array("2", "Peanut", date("Y-m-d H:i:s")),
        array("3", "Seed", date("Y-m-d H:i:s")),
        array("4", "Macadamia", date("Y-m-d H:i:s")),
        array("5", "Pistachio", date("Y-m-d H:i:s")),
    );
     
    foreach ($data as $record) {
        $nutCategoryID = $record[0];
        $nutCategoryName = $record[1];
        $dateAdded = $record[2];
        
        $query = "INSERT INTO nutCategory (nutCategoryID, nutCategoryName, dateAdded) VALUES (:nutCategoryID, :nutCategoryName, :dateAdded)";
    
        $statement = $database->prepare($query);

        $statement->bindValue(':nutCategoryID', $nutCategoryID);
        $statement->bindValue(':nutCategoryName', $nutCategoryName);
        $statement->bindValue(':dateAdded', $dateAdded);

        $statement->execute();
        $statement->closeCursor();
    }

    $data = array(

        // CategoryID = 1
        array("1", "101", "Almonds", "Grown in California", "5", date("Y-m-d H:i:s")),
        array("1", "102", "Walnuts", "Grown in China", "6", date("Y-m-d H:i:s")),
        array("1", "103", "Cashews", "Grown in Brazil", "4", date("Y-m-d H:i:s")),

        // CategoryID = 2
        array("2", "104", "Peanut1", "Grown in California", "1", date("Y-m-d H:i:s")),
        array("2", "105", "Peanut2", "Grown in China", "8", date("Y-m-d H:i:s")),
        array("2", "106", "Peanut3", "Grown in Brazil", "3", date("Y-m-d H:i:s")),

        // CategoryID = 3
        array("3", "107", "Seed1", "Grown in California", "10", date("Y-m-d H:i:s")),
        array("3", "108", "Seed2", "Grown in China", "2", date("Y-m-d H:i:s")),
        array("3", "109", "Seed3", "Grown in Brazil", "3", date("Y-m-d H:i:s")),

        // CategoryID = 4
        array("4", "110", "Macadamia1", "Grown in California", "50", date("Y-m-d H:i:s")),
        array("4", "111", "Macadamia2", "Grown in China", "0.99", date("Y-m-d H:i:s")),
        array("4", "112", "Macadamia3", "Grown in Brazil", "10000", date("Y-m-d H:i:s")),

        // CategoryID = 5
        array("5", "113", "Pistachio1", "Grown in California", "9999999", date("Y-m-d H:i:s")),
        array("5", "114", "Pistachio2", "Grown in China", "0.99", date("Y-m-d H:i:s")),
        array("5", "115", "Pistachio3", "Grown in Brazil", "10000000", date("Y-m-d H:i:s")),

    );

    foreach ($data as $record) {
        $nutCategoryID = $record[0];
        $nutCode = $record[1];
        $nutName = $record[2];
        $description = $record[3];
        $price = $record[4];
        $dateAdded = $record[5];

        
        $query = "INSERT INTO nuts (nutCategoryID, nutCode, nutName, description, price, dateAdded) VALUES (:nutCategoryID, :nutCode, :nutName, :description, :price, :dateAdded)";
    
        $statement = $database->prepare($query);

        $statement->bindValue(':nutCategoryID', $nutCategoryID);
        $statement->bindValue(':nutCode', $nutCode);
        $statement->bindValue(':nutName', $nutName);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':dateAdded', $dateAdded);

        $statement->execute();
        $statement->closeCursor();
    }
        
?>  