<?php
print_r($_POST);

// Get product data
$category_id = filter_input(INPUT_POST, 'category_id');
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// minimal input validation
if ($category_id == NULL || $category_id === FALSE || $code == NULL ||
    $code === FALSE || $price == NULL || $name == NULL || $price === FALSE) {
    $error = 'Invalid data';
    echo $error;
} else {
    require_once('batabase.php');

    $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice)
              VALUES (:category_id, :code, :name, :price)';

    // **Important:** use prepare() instead of query()
    $statement = $db->prepare($query);

    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);

    $statement->execute();
    $statement->closeCursor();
}

?>
