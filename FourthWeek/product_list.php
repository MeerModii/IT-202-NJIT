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

    // Get all categories
    $queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();
    echo "<pre>"; print_r($categories); echo "</pre>";

    $queryProduct = 'SELECT * FROM products WHERE categoryID = :category_id ORDER BY productID';
    $statement3 = $db->prepare($queryProduct);
    $statement3->bindValue(':category_id',$category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<html>
    <head>
        <title>My Guitar Shop</title>
    </head>
    <body>
        <main>
            <h1>Product List</h1>
            <h2>Categories</h2>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <section>
                <!-- HTML TABLE -->
                <h2><?php echo $category_name; ?></h2>
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
                                <td>
                                    <form action = "deleteProduct.php" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>" />
                                        <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>" />
                                        <input type = "submit" value="Delete" />

                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </section>

            
        </main>
    </body>
</html>