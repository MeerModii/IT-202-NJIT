<!-- BY: Meer Modi | October 18, 2023 | IT 202 005 | Assignment Unit 04 -->
<?php 
// Handling Data From database server


?>
<html>
    <head>
        <title>Nut Information</title>
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
            <ul id = "pageNav">
                <li><a href = "homee.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li id = "top"><a href = "shopping.php"><i class="fa-solid fa-cart-shopping"></i> Shopping</a></li>
                <li id = "top"><a href = "nutinfo.php"><i class="fa-solid fa-table"></i> Nuts</a></li>

            </ul>
        </header>
        <main>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                    <?php foreach ($products as $product) :?>
                        <tr>
                            <td><?php echo $product['productCode']; ?></td>
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['listPrice']; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </main>
        <footer class="footer-margin">
            <span id = "footer">Email:<a href = "nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
        </div>
    </body>
</html>