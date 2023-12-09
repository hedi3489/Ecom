<!DOCTYPE html>
<html>
<head>
    <title>Product View</title>
    <link rel="stylesheet" href="Views/CSS/ProductView.css" type="text/css">
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">
</head>
<body>
    <h1>Product View</h1>    
    <?php
    include_once "Models/Product.php";
    $product = $data['0'];
    echo "<div class='product'>";
    echo "<div class='image-container'>";
        echo "<img src=" . $product->getImagePath() . " alt='Image'>";
    echo "</div>";
        echo "<div class='detail-container'>";
        echo "<p>" . $product->getName() . "</p>";
        echo "<p class='price'>" . $product->getPrice() . "</p>";
        echo "<p class='category'>" . $product->getCategories() . "</p>";
        echo "<p class='seller'>Seller: " . $product->getSeller()->getUsername() . "</p>";
        echo "</div>"; 
    echo "</div>";
    ?>
</body>
</html>
