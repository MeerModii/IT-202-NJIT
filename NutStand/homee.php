<!-- BY: Meer Modi | October 6, 2023 | IT 202 005 | Assignment Unit 03 -->
<?php 
session_start();


require_once("nutsdatabase.php");
?>
<html>
    <head>
        <title>Nut Bazar</title>
        <meta charset="utf-8"/>
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
        <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="home-background">
        <header>
            <ul id = "iconNav">
                <a href = "homee.php"><i class="fa-regular fa-paper-plane fa-2xl"></i></a>
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
                    echo '<li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
                }
                ?>
            </ul>

        </header>
        <main>
            <div id = "HomeContent">
                <span id = "nutStandName">Nut Bazar</span><br><br>
                <span id = "nutStandLocation"><i class="fa-solid fa-location-dot"></i><a href = "https://maps.app.goo.gl/QN79i74Ho2UWJtma8"> 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102</a></span><br><br>
                <span id = "description">Welcome to 'Nut Bazar' in the heart of New Jersey, where we take your snacking experience to the next level. 
                            Our handpicked selection of premium nuts from around the world ensures a perfect balance of taste and quality. From classic roasted 
                            almonds to exotic flavored cashews, we've got your cravings covered. Explore our nutty paradise, and savor the essence of top-tier 
                            snacking with every bite. Quality is our commitment, flavor is our specialty, and your satisfaction is our guarantee.</span><br><br>

                <button><a href = "shopping.php">Begin Shopping</a></button>
            </div>
        </main>
        <footer class="footer-margin">
            <span id = "footer">Email:<a href = "nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
        </div>
    </body>
</html>
