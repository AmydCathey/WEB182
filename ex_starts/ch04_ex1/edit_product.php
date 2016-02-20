<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'productCode');
$name = filter_input(INPUT_POST, 'productName');
$price = filter_input(INPUT_POST, 'listPrice', FILTER_VALIDATE_FLOAT);

 
// Validate inputs
if ($product_id == null || $product_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = "UPDATE products
                 set listPrice = :price,
                     productCode = :code,
                     productName = :name
              WHERE productID = :product_id";

    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>