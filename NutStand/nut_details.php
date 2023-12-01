<?php
session_start();
require_once("nutsdatabase.php");

// Retrieve nutID from the URL
if (isset($_GET['nut_id'])) {
    $nutID = $_GET['nut_id'];

    // Fetch nut details from the database
    $queryNutDetails = 'SELECT * FROM nuts WHERE nutID = :nutID';
    $statement = $database->prepare($queryNutDetails);
    $statement->bindParam(':nutID', $nutID);
    $statement->execute();
    $nutDetails = $statement->fetch();
    $statement->closeCursor();

    if ($nutDetails) {
        // $imageFilename = ; 
        echo '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Nut Details</title>
            <!-- Linking CSS -->
            <link rel="stylesheet" type="text/css" href="nutStandStyle.css">
            <!-- Linking Font Awesome -->
            <script src="https://kit.fontawesome.com/bbb7b3d47b.js" crossorigin="anonymous"></script>
            <!-- Google fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500&display=swap" rel="stylesheet">        </head>
        <body>
            <div>
                <h2>Nut Details</h2>
                <p>Code: ' . $nutDetails['nutCode'] . '</p>
                <p>Name: ' . $nutDetails['nutName'] . '</p>
                <p>Description: ' . $nutDetails['description'] . '</p>
                <p>ID: ' . $nutDetails['nutID'] . '</p>
                <p>Price: $' . $nutDetails['price'] . '</p>
                <img src="Images\14.jpg" alt="Nut Image" width="200" height="200">
            </div>
            <script>
                var nutImage = document.getElementById("nutImage");
                
                nutImage.addEventListener("mouseover", function() {
                    nutImage.src = "Images\barcode.jpeg";

                });
                
                nutImage.addEventListener("mouseout", function() {
                    nutImage.src = "Images\Almond.png"; 

                });
            </script>
        </body>
        </html>';
    } else {
        // Nut record not found, display an error
        echo 'Nut record not found.';
    }
} else {
    // Redirect if nutID is not provided
    header("Location: nutinfo.php");
    exit();
}
?>
