<?php
    // get name from the request
    $Product_discription = filter_input(INPUT_POST,'Product_discription');
    $Product_price = filter_input(INPUT_POST,'Product_price');
    $Product_discount = filter_input(INPUT_POST,'Product_discount');
?>
<html>
    <head>
        <title>Discount Calculator</title>
    </head>
    <body>
        <h1>Discount calculator</h1>
        <label>product description</label>
        <span> <?php echo htmlspecialchars($Product_discription); ?></span>
        <br>
        <label>product price</label>
        <span> <?php echo htmlspecialchars($Product_price);?></span>
        <br>
        <label>product discount</label>
        <span> <?php echo htmlspecialchars($Product_discount . " %"); ?></span>
        <br>

        <!-- this php can be written on top -->
        <?php $discount_price = ($Product_price-(($Product_discount*$Product_price)/100)) ?>
        <?php $list_price_Final = "$". number_format($discount_price,2) ?>

        <label>product discount</label>
        <span> <?php echo htmlspecialchars($list_price_Final); ?></span>
    </body>
</html> 