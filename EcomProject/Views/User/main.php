<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
</head>
<body>
    <h1>Welcome to the Main Page</h1>
    <?php
    include_once "Models/Product.php";
    $products = Product::listProducts();
    foreach($products as $product){
        echo "<table class='product'>";
        echo "<tr><td>" . $product->getName() . "</td></tr>";
        echo "<tr><td>" . $product->getPrice() . "</td></tr>";
        echo "<tr><td>" . $product->getCategory() . "</tr></td>";
        echo "<tr><td><a href='/?controller=product&action=view&id=". $product->getProductId() ."'>View</a></td></tr></table>";
    }
    ?>
</body>
</html>
