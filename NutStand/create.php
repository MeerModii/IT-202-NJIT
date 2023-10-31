<?php 
    require('nutsdatabase.php');
    $query = 'SELECT * FROM nutCategory ORDER BY nutCategoryID';
    $statement = $database->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
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
            <input type="number" name="nutCode" ?>
            <br>

            <label>Nut Name: </label>
            <input type="text" name="nutName" ?>
            <br>
  
            <label>Nut description: </label>
            <input type="text" name="nutDescription" ?>
            <br>

            <label>Nut Price: </label>
            <input type="text" name="nutPrice" ?>
            <br>

            <label><input type="Submit" value = "Push"/></label>
        </form>
        </div>
        <footer class="footer-margin">
            <span id="footer">Email:<a href="nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
    </div>
</body>
</html>
