<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">    
    <link rel="stylesheet" href="Views/CSS/ProductListing.css" type="text/css">
</head>
<body>
    <h1>Welcome to the Main Page</h1>
    <?php
    include_once "Views/Product/navbar.php";
    include_once "Views/Product/sidebar.php";
    include_once "Models/Product.php";
    //var_dump($_SESSION);
    /*$user = $_SESSION['user'];
    echo $user->getId();*/
    $products = Product::listProducts();
    foreach($products as $product){
       
        echo "<div class='container'>";
        echo "<div class='image-container'>";
            echo "<img src=" . $product->getImagePath() . " alt='Image'>";
        echo "</div>";
        echo "<div class='detail-container'>";
            echo "<p>" . $product->getName() . "</p>";
            echo "<p>" . $product->getPrice() . "</p>";
        echo "</div>";
        echo "<a href='?controller=product&action=view&id=". $product->getProductId() ."'>View</a>";
        echo "</div>";
    }
    ?>
</body>
</html>
