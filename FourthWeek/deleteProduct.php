<?php 
    print_r($_POST);
    require_once('batabase.php');
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

    if($product_id != FALSE && $category_id != FALSE){
        $query = 'DELETE FROM products WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();

        echo "<p>Deleetion was successful</P>";
    }
?>