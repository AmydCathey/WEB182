<?php
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];
$productName = $_POST['productName'];
$productCode = $_POST['productCode'];
$listPrice = $_POST['listPrice'];
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product.php" method="post">


         Category ID: <?php echo $category_id;?><br/>
         Product ID: <?php echo $product_id;?><br/>
         Name: <input type="text" name="productName" value="<?php echo $productName;?>"/><br/>
         Code: <input type="text" name="productCode" value="<?php echo $productCode;?>"/><br/>
         List Price: <input type="text" name="listPrice" value="<?php echo $listPrice;?>"/><br/>
         <input type="hidden" name="product_id" value="<?php echo $product_id;?>"/><br/>
 

         
         <input type="submit" value="Update"/>
	    
        </form>
        <p><a href="index.php">Index</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>