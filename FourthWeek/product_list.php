<?php
    require_once('batabase.php');

    // Get category ID
    $category_id = filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);
    if($category_id == NULL || $category_id == FALSE){
        $category_id = 1;
    }
    // Get Name for selected category
    $queryCategory = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement1 = $db->prepare($queryCategory);
    $statement1 -> bindValue(':category_id',$category_id);
    $statement1 -> execute();
    $category = $statement1->fetch();
    $category_name = $category['categoryName'];
    $statement1->closeCursor();

    echo $category_name;

    // Get all categories 
    $queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $category = $statement2->fetch();
    $statement2 -> closeCursor();


?>