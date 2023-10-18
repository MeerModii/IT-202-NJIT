<!-- BY: Meer Modi | October 6, 2023 | IT 202 005 | Assignment Unit 03 -->
<?php

    // Set default values for initial page load
    $firstlastname = '';
    $ordernumber = '';
    $streetaddress = '';
    $city = '';
    $state = '';
    $zip = '';
    $shippingdate = '';
    $dimentions = '';
    $weight = '';
    $error_message = '';

    //Get values 
    $shippingdate = filter_input(INPUT_POST, 'shippingdate');
    $ordernumber = filter_input(INPUT_POST, 'ordernumber', FILTER_VALIDATE_INT);
    $dimentions = filter_input(INPUT_POST, 'dimentions', FILTER_VALIDATE_FLOAT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    $firstlastname = filter_input(INPUT_POST, 'firstlastname');
    $streetaddress = filter_input(INPUT_POST, 'streetaddress');
    $city = filter_input(INPUT_POST, 'city');       
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
    $error_message = '';
        
    $valid_states = array(
        'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA',
        'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD',
        'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ',
        'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC',
        'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'
    );

    if($weight !== false && $weight > 150.00){
        $error_message .= 'Weight for the package cannot exceeded 150 pounds. ';
    }
    if($dimentions !== false && $dimentions > 36.00){
        $error_message.= 'Dimensions for the package cannot exceed 36 inches. ';
    }
    if(!(in_array($state, $valid_states))){
        $error_message.= 'State abbreviation invalid. ';
    }
    if($ordernumber === false){
        $error_message .= 'Order Number has to be a valid int value. ';
    }
    if($dimentions === false){
        $error_message .= 'Dimention has to be a valid float or int value. ';
    }
    if($weight === false){
        $error_message .= 'Weight has to be a valid float or int value. ';
    }
    if($zip === false){
        $error_message .= 'zip has to be a valid int value. ';
    }
    if((empty($firstlastname))){
        $error_message .= 'First and last name cannot be Null. ';
    }
    if((empty($streetaddress))){
        $error_message .= 'Street address cannot be Null. ';
    }
    if((empty($city))){
        $error_message .= 'City cannot be Null. ';
    }
    if((empty($shippingdate))){
        $error_message .= 'Shipping date cannot be Null. ';
    }

?>
<html>
    <head>
        <title>Shopping</title>
        <meta charset="utf-8"/>
        <!-- Linking CSS -->
        <link rel="stylesheet" href="nutStandStyle.css"/>
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
        <div class="left-section">
        <form method="post">
            <label>First & Last Name: </label>
            <input type="text" name="firstlastname" value = "<?php echo htmlspecialchars($firstlastname); ?>"/>
            <br>

            <label>Order Number: </label>
            <input type="number" name="ordernumber" value = "<?php echo htmlspecialchars($ordernumber); ?>"/>
            <br>

            <label>Street Address: </label>
            <input type="text" name="streetaddress" value = "<?php echo htmlspecialchars($streetaddress); ?>"/>
            <br>

            <label>City Name: </label>
            <input type="text" name="city" value = "<?php echo htmlspecialchars($city); ?>"/>
            <br>

            <label>State Name: </label>
            <input type="text" name="state" value = "<?php echo htmlspecialchars($state); ?>"/>
            <br>

            <label>Zip Code: </label>
            <input type="number" name="zip" value = "<?php echo htmlspecialchars($zip); ?>"/>
            <br>

            <label>Shipping Date: </label>
            <input type="date" name="shippingdate" value = "<?php echo htmlspecialchars($shippingdate); ?>"/>
            <br>

            <label>Dimentions: </label>
            <input type="number" name="dimentions" value = "<?php echo htmlspecialchars($dimentions); ?>"/>
            <br>

            <label>Weight: </label>
            <input type="number" name="weight" value = "<?php echo htmlspecialchars($weight); ?>"/>
            <br>
            <br>
            <label><input type="Submit" id = "submit_buttom"/></label>
        </form>

        <?php 
        if(!empty($error_message)){?>
        <p id = "errormessage"><?php echo htmlspecialchars($error_message);?></p>
        <?php }?>
        </div>

        <div class="right-section">

        <?php 
        if(empty($error_message)){?>
        <img src = "Images/Barcode.jpeg" alt = "Barcode" id = "barcodeimg"/><br><br><br>
        <span class = "labelcontent"><span>From:</span> 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102</span><br><br>
        <span class = "labelcontent"><span>To:</span><?php echo htmlspecialchars(" ".$streetaddress.", ".$city.", ".$state.", ".$zip);?></span><br><br>
        <span class = "labelcontent"><span>Tracking #:</span> RA188070426US | <span>By:</span> UPS | <span>Type:</span> Priority</span><br><br>
        <span class = "labelcontent"><span>Weight:</span> <?php echo htmlspecialchars($weight);?> | <span>Dimentions:</span> <?php echo htmlspecialchars($dimentions);?></span><br><br>
        <span class = "labelcontent"><span>Order #:</span> <?php echo htmlspecialchars($ordernumber);?> | <span>Shipping On:</span> <?php echo htmlspecialchars($shippingdate);?></span><br><br><br>
        <img src = "Images/UPS-logo.png" alt = "Barcode" id = "upslogoimg"/><img src = "Images/barcodesq.png" alt = "Barcode" id = "barcodesq"/>

        <?php }?>

        </div>

        </main>
        <footer>
            <span id = "footer" class = "footershopping">Email:<a href = "nutbazar@proton.me"> nutbazar@proton.me</a> &nbsp;| Phone: (908) 888-8888</span>
        </footer>
    </body>
</html>
