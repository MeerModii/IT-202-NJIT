<?php
    // Set default values for initial page load
    if(!isset($productname)){
        $productname = '';
    }
    if(!isset($productquantity)){
        $productquantity ='';
    }
    if(!isset($firstlastname)){
        $firstlastname ='';
    }
    if(!isset($streetaddress)){
        $streetaddress ='';
    }
    if(!isset($city)){
        $city ='';
    }
    if(!isset($state)){
        $state ='';
    }
    if(!isset($zip)){
        $zip ='';
    }
?>
<html>
    <head>
        <title>Nut Bazar</title>
        <meta charset="utf-8"/>
        <!-- Linking CSS -->
        <link rel="stylesheet" href="nutStandStyle.css"/>
        <!-- Linking Font Awesome -->
        <script src="https://kit.fontawesome.com/bbb7b3d47b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <ul id = "iconNav">
                <a href = "home.php"><i class="fa-regular fa-paper-plane fa-2xl"></i></a>
            </ul>
            <ul id = "pageNav">
                <li><a href = "home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li id = "top"><a href = "shopping.php"><i class="fa-solid fa-cart-shopping"></i> Shopping</a></li>
            </ul>
        </header>
        <main>
        <form method="post">
            <pre>Product Name:          </pre>
            <input type="text" name="productname" value = "<?php echo htmlspecialchars($productname); ?>"/>
            <br>

            <label>Product Quantity: </label>
            <input type="text" name="productquantity" value = "<?php echo htmlspecialchars($productquantity); ?>"/>
            <br>

            <label>First & Last Name: </label>
            <input type="text" name="firstlastname" value = "<?php echo htmlspecialchars($firstlastname); ?>"/>
            <br>

            <label>Street Address: </label>
            <input type="text" name="streetaddress" value = "<?php echo htmlspecialchars($streetaddress); ?>"/>
            <br>

            <label>City: </label>
            <input type="text" name="city" value = "<?php echo htmlspecialchars($city); ?>"/>
            <br>

            <label>State: </label>
            <input type="text" name="state" value = "<?php echo htmlspecialchars($state); ?>"/>
            <br>

            
            <label>Zip: </label>
            <input type="text" name="zip" value = "<?php echo htmlspecialchars($zip); ?>"/>
            <br>
        </form>
        </main>
        <footer>
            <span id = "footer">Email: <a href = "nutbazar@proton.me">nutbazar@proton.me</a> | Phone: (908) 888-8888</span>
        </footer>
    </body>
</html>
