<?php 
    require_once('nutsdatabase.php');
    $query = 'SELECT * FROM nutCategory ORDER BY nutCategoryID';
    $statement = $database->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    $nutCategoryID = '';
    $nutCode = '';
    $nutName = '';
    $nutDescription = '';
    $nutPrice = '';
    $error_message = '';

    $nutCategoryID = filter_input(INPUT_POST, 'nutCategoryName');
    $nutCode = filter_input(INPUT_POST, 'nutCode', FILTER_VALIDATE_INT);
    $nutName = htmlspecialchars(filter_input(INPUT_POST, 'nutName'));
    $nutDescription = htmlspecialchars(filter_input(INPUT_POST,'nutDescription'));
    $nutPrice = filter_input(INPUT_POST, 'nutPrice', FILTER_VALIDATE_FLOAT);

    $query = "SELECT nutCode FROM nuts";
    $statement = $database->prepare($query);
    $statement->execute();
    $codes = $statement->fetchAll();
    $statement->closeCursor();

    for ($i = 0; $i < sizeof($codes); $i++) {
        if ($codes[$i][0] == $nutCode) {
            $error_message = "Invalid nutCode";
        } else {
        }
    }
    
    if($nutPrice === false || $nutPrice < 0 || $nutPrice > 100 || empty($nutPrice)){
        $error_message = "Invalid Nut Price";
    }
    if($nutCode === false || empty($nutCode)){
        $error_message = "Invalid Nut Code";
    }
    if($nutName === false || empty($nutName)){
        $error_message = "Invalid Nut Name";
    }
    if($nutDescription === false || empty($nutDescription)){
        $error_message = "Invalid Description";
    }

    $query = "SELECT nutCategoryID FROM nutCategory WHERE nutCategoryName = :nutCategoryID";
    $statement = $database->prepare($query);
    $statement->bindValue(':nutCategoryID', $nutCategoryID);
    $statement->execute();
    $nutCategoryID = $statement->fetch();
    
    if(!empty($nutCategoryID )){
        $nutCategoryID = $nutCategoryID[0];
    }
    $statement->closeCursor();

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
                <li id="top"><a href="shopping.php"><i class="fa-solid fa-cart-shopping"></i> Shopping</a></li>
                <li id="top"><a href="nutinfo.php"><i class="fa-solid fa-database"></i> Nuts</a></li>
                <li id="top"><a href="create.php"><i class="fa-solid fa-plus"></i> Create</a></li>

            </ul>
        </header>
        <main>
        <div class="left-section">
        <form method="post">


            <label>Nut Category: </label>
            <select name = "nutCategoryName">
                <?php foreach($categories as $category) : ?>
                <option value = "<?php echo $category['nutCategoryName']; ?>">
                    <?php echo $category['nutCategoryName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label>Nut Code: </label>
            <input type="number" name="nutCode" value = "<?php echo htmlspecialchars($nutCode); ?>">
            <br>

            <label>Nut Name: </label>
            <input name="nutName" value = "<?php echo htmlspecialchars($nutName); ?>">
            <br>
            <br>

            <label>Nut description: </label>
            <textarea name="nutDescription"><?php echo htmlspecialchars($nutDescription); ?></textarea>
            <br>


            <label>Nut Price: </label>
            <input type="number" step="any"name="nutPrice" value = "<?php echo htmlspecialchars($nutPrice); ?>">
            <br>

            <label><input type="Submit" value = "Push"/></label>
        </form>

        <?php 
            if (!empty($error_message)) {
            echo '<p id="errormessage">' . htmlspecialchars($error_message) . '</p>';
            }
        ?>

        </div>

        <div class="right-section">

        <?php 
        $dateAdded = date("Y-m-d H:i:s");
        if(empty($error_message)){
            require_once("nutsdatabase.php");
            $query = "INSERT INTO nuts(nutCategoryID, nutCode, nutName, description, price, dateAdded) 
            VALUES(:nutCategoryID, :nutCode, :nutName, :nutDescription, :nutPrice, :dateAdded)";            
            $statement = $database->prepare($query);
            $statement->bindValue(":nutCategoryID", $nutCategoryID);
            $statement->bindValue(":nutCode", $nutCode);
            $statement->bindValue(":nutName", $nutName);
            $statement->bindValue(":nutDescription", $nutDescription);
            $statement->bindValue(":nutPrice", $nutPrice);
            $statement->bindValue(":dateAdded", $dateAdded);
            $statement->execute();
            $statement->closeCursor();

            echo '<p id="errormessage">' ." Data added successfully" . '</p>';

        }
        ?>

        </div>

        </main>
        <footer class="footer-margin">
            <span id="footer">Email:<a href="nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
    </div>
</body>
</html>
