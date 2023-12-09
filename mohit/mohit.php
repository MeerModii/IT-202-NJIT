<?php
require(_DIR_ . "/partials/nav.php");

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://watchsignals.p.rapidapi.com/watch/referencenumber/11088",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: watchsignals.p.rapidapi.com",
		"X-RapidAPI-Key: d391acf191mshdc169f7157a5deap15bdc7jsn8a0b5b1d19bc"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

// Database related code should be enclosed within <?php and ?> tags
try {
    // Connect to the database and fetch products
    // Example:
    $db = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    $stmt = $db->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Output any connection errors
    echo "Connection failed: " . $e->getMessage();
    // Exit or handle the error appropriately
    exit;
}
?>

<h1>Shop</h1>

<!-- Category Filter Dropdown -->
<form method="GET">
    <label for="category">Filter by Category:</label>
    <select name="category" id="category">
        <option value="">All Categories</option>
        <!-- Option values based on your database -->
        <!-- Example: <option value="category_name">Category Name</option> -->
    </select>
    <button type="submit">Filter</button>
</form>

<!-- Display Products from the Database -->
<?php foreach ($products as $product): ?>
    <div>
        <h3><?php echo $product['name']; ?></h3>
        <p>Description: <?php echo $product['description']; ?></p>
        <p>Category: <?php echo $product['category']; ?></p>
        <p>Stock: <?php echo $product['stock']; ?></p>
        <p>Price: <?php echo $product['unit_price']; ?></p>
    </div>
<?php 
endforeach(); 

?>