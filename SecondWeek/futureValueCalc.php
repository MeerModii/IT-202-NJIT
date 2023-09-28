<?php
    // Set default values for initial page load
    if(!isset($investment)){
        $investment = '';
    }
    if(!isset($intrestRate)){
        $intrestRate ='';
    }
    if(!isset($years)){
        $years ='';
    }
?>
<!DOCTYPE html>
<head>
<title>Future Value Calculator</title>
</head>
<body>
    <?php 
        if(!empty($error_message)){?>
        <p>
            <?php echo htmlspecialchars($error_message);?>
        </p>
    <?php }?>
    

    <form action="futureValueCalcLogic.php" method="post">
        <label>Investment:</label>
        <input type="text" name = "investment" value = "<?php echo htmlspecialchars($investment);?>" />
        <br>
        <label>Intrest Rate:</label>
        <input type="text" name = "intrestRate" value = "<?php echo htmlspecialchars($intrestRate); ?>">
        <br>
        <label>Years:</label>
        <input type="text" name = "years" value = "<?php echo htmlspecialchars($years); ?>">
        <br>
        <input type = "submit" value = "Calculate"/>
    </form>

</body>
</html>
