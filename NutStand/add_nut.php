<?php
    $nutCategoryName = htmlspecialchars($_POST('nutCategoryName'));
    $nutCode = filter_input(INPUT_POST, 'nutCode', FILTER_VALIDATE_INT);
    $nutName = htmlspecialchars(filter_input(INPUT_POST, 'nutName'));
    $nutDescription = htmlspecialchars(filter_input(INPUT_POST,'nutDescription'));
    $nutPrice = filter_input(INPUT_POST, 'nutPrice', FILTER_VALIDATE_FLOAT);
    if($nutPrice > 0 && $nutPrice < 120.99){
        $nutPrice = $nutPrice;
    }
    else{
        $nutPrice = '';
    }
    if($nutPrice == ''){
        $error_message = "Invalid Nut Price";
        include_once("create.php");
    }
?>