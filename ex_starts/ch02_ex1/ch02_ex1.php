
<?php
//Amy Cathey Ch 2 Homework WEB-182 Exercise 2-1

$product_description = filter_input(INPUT_POST, 'product_description');
$list_price = filter_input(INPUT_POST, 'list_price');
$discount_percent = filter_input(INPUT_POST, 'discount_percent');

$discount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount;

$list_price_format = "$".number_format($list_price, 2);
$discount_percent_format = $discount_percent."%";
$discount_format = "$".number_format($discount, 2);
$discount_price_format = "$".number_format($discount_price, 2);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>
        
        <label>Product Description:</label>
        <span><?php echo htmlspecialchars ($product_description); ?></span><br>
   
        
        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_format); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent_format); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_format; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_format; ?></span><br>
                   
        
    </main>
</body>
</html>