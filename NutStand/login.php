<?php
include('nutsdatabase.php');
include('functions.php');

session_start();

if (isset($_SESSION['emailAddress'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredEmail = $_POST['email'];
    $enteredPassword = $_POST['password'];

    if (checkLoginCredentials($enteredEmail, $enteredPassword)) {
        // Valid login, get user details
        $userDetails = getUserDetails($enteredEmail);

        // Set session variables
        $_SESSION['emailAddress'] = $enteredEmail;
        $_SESSION['firstName'] = $userDetails['firstName'];
        $_SESSION['lastName'] = $userDetails['lastName'];

        // Redirect to the home page or another authorized page
        header("Location: homee.php");
        exit();
    } else {
        // Invalid login, display an error message
        $loginError = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <form action="" method="post">
                <label>Email:</label>
                <input type="text" name="email" value="">
                <br>
                <label>Password:</label>
                <input type="password" name="password" value="">
                <br>
                <label><input type="submit" value="Login"/></label>
            </form>

            <?php if (isset($loginError)) : ?>
                <p><?php echo htmlspecialchars($loginError); ?></p>
            <?php endif; ?>

        </main>
        <footer class="footer-margin">
            <span id="footer">Email:<a href="nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
    </div>
</body>
</html>
