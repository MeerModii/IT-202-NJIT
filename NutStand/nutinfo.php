<?php
session_start();

if (!isset($_SESSION['emailAddress'])) {
    header("Location: login.php");
    exit();
}

require_once("nutsdatabase.php");

// Fetch nut categories
$queryNutCategory = 'SELECT * FROM nutCategory ORDER BY nutCategoryID';
$statement = $database->query($queryNutCategory);
$statement->execute();
$nutCategory = $statement->fetchAll();
$statement->closeCursor();

// Fetch nut information
$queryNuts = 'SELECT * FROM nuts ORDER BY nutID';
$statement2 = $database->query($queryNuts);
$statement2->execute();
$nutInfo = $statement2->fetchAll();
$statement2->closeCursor();

// Create arrays to store data
$arrayCategoryname = [];
$arrayNutCode = [];
$arrayNutName = [];
$arrayNutDesc = [];
$arrayNutPrice = [];

// Populate arrays with data
foreach ($nutCategory as $category) {
    $arrayCategoryname[] = $category['nutCategoryName'];
    $arrayCategoryname[] = ' '; 
    $arrayCategoryname[] = ' ';
}

foreach ($nutInfo as $nut) {
    $arrayNutCode[] = $nut['nutCode'];
    $arrayNutName[] = $nut['nutName'];
    $arrayNutDesc[] = $nut['description'];
    $arrayNutPrice[] = $nut['price'];
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nut Information</title>
    <link rel="stylesheet" type="text/css" href="nutStandStyle.css">
    <script src="https://kit.fontawesome.com/bbb7b3d47b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="home-background">
        <header>
            <ul id="iconNav">
                <a href="homee.php"><i class="fa-regular fa-paper-plane fa-2xl"></i></a>
            </ul>
            <ul id="pageNav">
    <li><a href="homee.php"><i class="fa-solid fa-house"></i> Home</a></li>
    <li><a href="shopping.php"><i class="fa-solid fa-cart-shopping"></i> Shopping</a></li>
    <li><a href="nutinfo.php"><i class="fa-solid fa-database"></i> Nuts</a></li>
    <li><a href="create.php"><i class="fa-solid fa-plus"></i> Create</a></li>

    <?php
    // Display "Logout" or "Login" link based on user's login status
    if (isset($_SESSION['emailAddress'])) {
        echo '<li id="top">Welcome ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . ' (' . $_SESSION['emailAddress'] . ')</li>';
        echo '<li id="top"><a href="logout.php"><i class="fa-solid fa-right-to-bracket"></i> Logout</a></li>';
    } else {
        echo '<li id="top"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
    }
    ?>
</ul>

        </header>
        <main>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>
                <br>

                <?php
                $numRows = count($arrayNutCode);

                for ($i = 0; $i < $numRows; $i++) {
                    echo '<tr>';
                    
                    echo '<td>' . (isset($arrayCategoryname[$i]) ? $arrayCategoryname[$i] : '') . '</td>';
                    echo '<td><a href="nut_details.php?nut_id=' . $nut['nutID'] . '">' . $nut['nutCode'] . '</a></td>';
                    echo '<td>' . $arrayNutName[$i] . '</td>';
                    echo '<td>' . $arrayNutDesc[$i] . '</td>';
                    echo '<td>' . "$ " . $arrayNutPrice[$i] . '</td>';
                    echo 
                        '<td>
                            <form method="post" action="delete.php" onsubmit="return confirmDelete()">
                                <input type="hidden" name="nutId" value="' . $arrayNutCode[$i] . '">
                                <input type="submit" value="Delete">
                            </form>
                        </td>';
                
                    echo '</tr>';
                }
                ?>
            </table>
            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this record?");
                }
            </script>
        </main>
        <footer class="footer-margin">
            <span id="footer">Email:<a href="nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
    </div>
</body>
</html>
