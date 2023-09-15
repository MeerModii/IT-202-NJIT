<?php 
    // get data from the form fields
    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $intrestRate = filter_input(INPUT_POST, 'intrestRate', FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

    // Validate the data 
    if($investment === FALSE){
        $error_message = "invest must be a valid number";
    }
    else if($investment <= 0){
        $error_message = "investment must be positive";
    }
    else if($intrestRate === FALSE){
        $error_message = "intrest rate must be a valid number";
    }   
    else if($years === FALSE){
        $error_message = "years must be a valid number";
    }
    else if($intrestRate <= 0){
        $error_message = "intrest rate must be a positive number";
    }
    else if($years <= 0){
        $error_message = "years must be a positive number";
    }
    else if($years >= 30){
        $error_message = "you cannot invest for more than 30 years";
    }
    else{
        $error_message = "";
    }

    if($error_message != ''){
        include("futureValueCalc.php");
        exit;
    }

    // Calculate the results
    $future_value = $investment;
    for($i = 1; $i <= $years; $i++){
        $future_value += $future_value*$intrestRate*0.01;
    }

    // Applying formatting
    $investment_f = '$' . number_format($investment,2);
    $intrestRate_f = number_format($intrestRate,2) . "%";
    $future_value_f = '$' . number_format($future_value,2);

?>

<html>
    <head>
        <title>Calculated Data</title>
    </head>
    <body>
        <label>Invested Amount:</label>
        <span><?php echo $investment_f?></span>
        <br>
        <label>Interest Rate</label>
        <span><?php echo $intrestRate_f?></span>
        <br>
        <label>Years Invested</label>
        <span><?php echo $years?></span>
        <br>
        <label>Final Amount</label>
        <span><?php echo $future_value_f?></span>
        <br>
    </body>
</html>