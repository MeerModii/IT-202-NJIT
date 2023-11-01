<?php 
    require('nutsdatabase.php');
    $query = 'SELECT * FROM nutCategory ORDER BY nutCategoryID';
    $statement = $database->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    $nutCode = '';
    $nutName = '';
    $nutDescription = '';
    $nutPrice = '';
    $error_message = '';

    $nutCategoryName = htmlspecialchars($_POST('nutCategoryName'));
    $nutCode = filter_input(INPUT_POST, 'nutCode', FILTER_VALIDATE_INT);
    $nutName = htmlspecialchars(filter_input(INPUT_POST, 'nutName'));
    $nutDescription = htmlspecialchars(filter_input(INPUT_POST,'nutDescription'));
    $nutPrice = filter_input(INPUT_POST, 'nutPrice', FILTER_VALIDATE_FLOAT);

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
  
            <label>Nut description: </label>
            <textarea type="text" rows = '4' cols = '50' name="nutDescription" value = "<?php echo htmlspecialchars($nutDescription); ?>"></textarea>
            <br>

            <label>Nut Price: </label>
            <input type="number" step="any"name="nutPrice" value = "<?php echo htmlspecialchars($nutPrice); ?>">
            <br>

            <label><input type="Submit" value = "Push"/></label>
        </form>

        <?php 
        if(!empty($error_message)){?>
        <p id = "errormessage"><?php echo htmlspecialchars($error_message);?></p>
        <?php }?>
        </div>

        <div class="right-section">

        <?php 
        if(empty($error_message)){
            require_once("nutsdatabase.php");
            $query = "INSERT INTO nutCategory(nutCategoryID,nutCode,nutName,description, price, dateAdded) 
                                        VALUES(:nutCategoryID, :nutCode, :nutName, :nutDescription, :nutPrice, ";
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
